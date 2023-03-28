<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todos = Todo::where('title',$request->title)->get();

if(count($todos) <=0){

        $todo = new Todo;
        $todo->title= $request-> title;
        $todo->description = $request->description;
        $todo->save();

        $message =(object)[
            "status"=>"1",
            "message"=>"You successfully added new todo."
        ];
        return response()->json($message);
    }else{
        $message =(object)[
            "status"=>"0",
            "message"=>"Title already exist."
        ];
        return response()->json($message);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todos = Todo::where('title',$request->title)->get();
        $todo->delete();
        $message =(object)[
            "status"=>"1",
            "message"=>"You successfully deleted"
        ];
        return response()->json($message);
    
    }

}
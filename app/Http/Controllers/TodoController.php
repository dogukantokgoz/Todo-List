<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;

class TodoController extends Controller
{
    public function index()
    {
        $todos= Todos::get();
        return view('index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(TodoRequest $request)
    {
        Todos::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 0
            ]);
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $todo = Todos::find($id);
        return view('edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
       $todo = Todos::find($request->todo_id);
       $todo->update([
           'title' => $request->title,
           'description' => $request->description,
           'status' => $request->status,
       ]);
       return redirect()->route('index');
    }

    public function show($id)
    {
    $todo = Todos::find($id);

    return view('show', ['todo' => $todo]);
    }

    public function destroy(Request $request)
    {
        $todo = Todos::find($request->todo_id);
        $todo->delete();

        return redirect()->route('index');
    }

    public function trashed()
    {
        $todos = Todos::onlyTrashed()->get();
        return view('trashed',compact('todos'));
    }

    public function recover($id)
    {
        Todos::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $todos = Todos::onlyTrashed()->find($id);
        $todos->forceDelete();

        return redirect()->back();
    }
}

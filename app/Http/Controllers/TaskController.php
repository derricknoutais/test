<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('index')->with(['tasks' => $tasks]);
    }

    public function show($id){
        $task = Task::find($id);
        
        return view('show', compact('task'));
    }

    public function edit(Task $task){
        return view('edit', compact('task'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $valid = $request->validate([
            'title' => 'string|min:5|required',
            'body' => 'string|min:5|required'
        ]);
        if($valid){
            Task::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);
        } else {
            return back();
        }
        
    }

    public function store2(Request $request){
        Task::create([
            'title' =>  $request->input('title'),
            'body' => $request->input('body')
        ]);
    }


    public function update(Request $request, Task $task){
        $valid = $request->validate([
            'title' => 'string|min:5|required',
            'body' => 'string|min:5|required'
        ]);
        if($valid){
            $task->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);
        } else {
            return back();
        }
    }
    public function delete(Task $task){
        $task->delete();
        return redirect('/task');
    }
}


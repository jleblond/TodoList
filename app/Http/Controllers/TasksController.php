<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\TasksRequest;


use App\Task;

class TasksController extends Controller
{
    
    /**
     * Display All Tasks
     */
    public function create(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
    
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    
    /**
     * Add A New Task
     */
    public function store(TasksRequest $request) {

        $validator = Validator::make(Input::all(), $request->rules());


        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        else
        {
            $task = new Task;
            $task->name = $request->name;
            $task->save();
    
            return redirect('/');

        }

    
    }

        
    /**
     * Remove the specified Task
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }
}

<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;

use App\Task;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\TasksRequest;

use Illuminate\Support\Facades\Auth;


class TasksRepository extends Repository implements RepositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }


    public function all()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
    
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function create($data)
    {
        $validator = Validator::make(Input::all(), $data->rules());


        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        else
        {
            $task = new Task;
            $task->name = $data->name;
            if(Auth::check())
            {
                $task->user_id = Auth::user()->id;
            }
            $task->save();

    
            return redirect('/');

        }

    }


    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }



    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task_edit', [
            'task' => $task
        ]);
    }

    public function update($data, $id)
    {
        $task = Task::find($id);


        if($data['description']  != null) {
            $task->description = $data['description'];
        }
        else{
            $task->description = "";
        }

        $task->done = $data['done'];

        $task->save();



        return view('task_edit', [
            'task' => $task
        ]);
    }


}
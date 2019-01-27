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
            Task::create([
                'name' => $data->name,
                'user_id' => Auth::user()->id
            ]);
    
            return redirect('/');

        }

    }

    // public function update($id, array $data)
    // {
    // }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }

    public function show($id)
    {

    }
}
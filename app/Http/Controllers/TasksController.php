<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TasksRequest;
use App\Repositories\TasksRepository;


class TasksController extends Controller
{
    private $tasksRepository;

    public function __construct(TasksRepository $tasksRepo)
    {
        $this->tasksRepository = $tasksRepo;
    }
    
    /**
     * Display All Tasks
     */
    public function index(){
        return $this->tasksRepository->all();
    }
    
    /**
     * Add A New Task
     */
    public function store(TasksRequest $request) {

        return $this->tasksRepository->create($request);
    
    }

        
    /**
     * Remove the specified Task
     */
    public function destroy($id)
    {
        return $this->tasksRepository->delete($id);
    }
}

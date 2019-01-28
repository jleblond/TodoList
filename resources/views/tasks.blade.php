<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks Manager') }}</div>


                    <div class="card-body">
<!-- Create Task Form... -->
 <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-8">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                
                    <button type="submit" class="btn btn-default" id="btn-addtask">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                
            </div>
        </form>
        

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Tasks</th>
                        <th>Created by</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>
                                        @if($task->done)
                                        <strike>
                                        {{ $task->name }}
                                        </strike>
                                        @else
                                        {{ $task->name }}
                                        @endif
                                        
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        @if($task->user_id != null)
                                            {{ $task->user->name }}
                                        @endif
                                    </div>
                                </td>

                                <!-- Edit Button -->
                                <td>
                                    <form action="/edit/{{ $task->id }}" method="GET">
                                          {{ csrf_field() }}
                                         {{ method_field('GET') }}

                                        <button>Edit Task</button>
                                    </form>
                                </td>

                                 <!-- Delete Button -->
                                 <td>
                                 @guest
                                 @else
                                    <form action="/{{ $task->id }}" method="POST">
                                          {{ csrf_field() }}
                                         {{ method_field('DELETE') }}

                                        <button>Delete Task</button>
                                    </form>
                                 @endguest
                                     
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

                
            </div>
        </div>
    </div>
</div>







   
@endsection
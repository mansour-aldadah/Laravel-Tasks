@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                @if (isset($task))
                    <div class="card-header">
                        Update Task
                    </div>
                    <div class="card-body">
                        <!-- Update Task Form -->
                        <form action="{{ url('tasks/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <!-- Task Name -->
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control"
                                    value="{{ $task->name }}">
                            </div>
                            <!-- Update Task Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Update Task
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-header">
                        New Task
                    </div>
                    <div class="card-body">
                        <!-- New Task Form -->
                        <form action="tasks/create" method="POST">
                            @csrf
                            <!-- Task Name -->
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control" value="">
                            </div>

                            <!-- Add Task Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

            </div>

            <!-- Current Tasks -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        <form action="tasks/delete/{{ $task->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                        <form action="tasks/edit/{{ $task->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-info me-2"></i>Edit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

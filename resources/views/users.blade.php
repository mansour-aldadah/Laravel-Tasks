@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Users</h1>
        <div class="offset-md-2 col-md-8">
            <!-- New User Form -->
            <div class="card">
                <div class="card-header">
                    New User
                </div>
                <div class="card-body">
                    @if (isset($user))
                        <form action="{{ url('/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Name</label>
                                <input type="text" name="name" id="user-name" class="form-control"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="user-email" class="form-label">Email</label>
                                <input type="email" name="email" id="user-email" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="user-password" class="form-label">Password (Leave blank to keep current
                                    password)</label>
                                <input type="password" name="password" id="user-password" class="form-control">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Update User
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="create" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label">Name</label>
                                <input type="text" name="name" id="user-name" class="form-control"
                                    placeholder="Enter name...">
                            </div>
                            <div class="mb-3">
                                <label for="user-email" class="form-label">Email</label>
                                <input type="email" name="email" id="user-email" class="form-control"
                                    placeholder="Enter email...">
                            </div>
                            <div class="mb-3">
                                <label for="user-password" class="form-label">Password</label>
                                <input type="password" name="password" id="user-password" class="form-control"
                                    placeholder="Enter password...">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Add User
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Current Users -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ url('/edit/' . $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-edit me-2"></i>Edit
                                            </button>
                                        </form>
                                        <form action="/delete/{{ $user->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash me-2"></i>Delete
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

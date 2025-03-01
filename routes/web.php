<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Mansour';
    $departments = [
        '01' => 'Tichnical',
        '02' => 'Financial',
        '03' => 'Sales',
    ];
    // return view('about')->with('name', $name);
    // return view('about', ['name' => $name]);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '01' => 'Tichnical',
        '02' => 'Financial',
        '03' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::post('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update', [TaskController::class, 'update']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/delete/{id}', [UserController::class, 'destroy']);
Route::post('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update', [UserController::class, 'update']);

Route::get('app', function () {
    return view('layouts.app');
});

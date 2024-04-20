<?php

// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoTaskController;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Route::get('/', function () {
// //     return view('home');
// });
// $tasks = [
//     [
//         'task'    => 'Task1',
//         'tanggal' => '2022-03-21',
//     ],
//     [
//         'task'    => 'Task2',
//         'tanggal' => '2022-03-22',
//     ]
// ];
Route::get('/', [TodoTaskController::class, 'index']);
Route::post('/', [TodoTaskController::class, 'store'])->name('tasks.store');
Route::delete('/deleteTask/{id}', [TodoTaskController::class, 'deleteTask']);

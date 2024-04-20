<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function index()
{
    $tasks = Task::all();
    return view('home', ['tasks' => $tasks]);
}

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:5',
        ],
        [
            'task.required' => 'tugas harus diisi',
            'task.min'      => 'tugas minimal 5 karakter'
        ]);

        Task::create([
            'task' => $request->task,
            'tanggal' => now(),
        ]);

        return redirect('/');
    }

    public function deleteTask(Request $request)
    {
        Task::where('task_id', $request->id)->delete();
        return redirect('/');
    }


}

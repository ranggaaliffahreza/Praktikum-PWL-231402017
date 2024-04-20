<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To Do List</title>
  @vite('resources/css/app.css')
</head>

<body>
  @extends('layouts.layout')


@section('contect')

{{-- content --}}
<div class="flex justify-center mt-10 flex-col gap-10">
  {{-- search bar --}}
  <form name="tasks" action="/" method="post">
    @csrf
  <label class="form-control w-full max-w-lg mx-auto">
    <div class="label">
      <span class="label-text text-emerald-600">Task Baru</span>
    </div>
    <input name="task" type="text" placeholder="Type here" class="input input-bordered input-success w-full max-w-lg" />
    <div class="label">
      @error('task')
          <p class="text-red-500">{{$message}}</p>
      @enderror
    </div>
    {{-- button add --}}
    <button type="submit" class="btn btn-success w-36 self-center">Add</button>
    
    {{-- akhir button add --}}
  </label>
  {{-- akhir search bar --}}
</form>
  {{-- task --}}
  <div class="flex flex-col gap-3">
    @foreach ($tasks as $task)
    {{-- task 1 --}}
    <div role="alert" class="alert max-w-4xl mx-auto">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <div class="flex flex-col">
        <span class="text-sm text-slate-400">{{ $task->tanggal}}</span>
        <span class="text-xl font-bold">{{ $task['task'] }}</span>
      </div>
      <div>
        <div class="tooltip" data-tip="Detail">
          <button class="btn btn-sm shadow-lg bg-base-200 border">View</button>
        </div>
        <div class="tooltip" data-tip="Edit">
          <button class="btn btn-sm shadow-lg bg-yellow-500">Edit</button>
        </div>
        <form action="/deleteTask/{{ $task->task_id }}" method="POST" class="display-inline border-0">
          @method('DELETE')
          @csrf
          <button class="btn btn-sm btn-success" class="display-inline" onclick="my_modal_2.showModal()">Done</button>
        </form>
      
      </div>
    </div>
    {{-- akhir task 1 --}}
    @endforeach
  </div>
  {{-- akhir task --}}

</div>
{{-- akhir content --}}
@endsection

</div>
</html>

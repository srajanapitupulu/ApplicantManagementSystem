@extends('admin.layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Applicant</h2>

    <form action="{{ route('admin.applicants.store') }}" method="POST" class="space-y-3">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" class="border w-full p-1">
        <input type="text" name="last_name" placeholder="Last Name" class="border w-full p-1">
        <input type="email" name="email" placeholder="Email" class="border w-full p-1">

        <select name="task_id" class="border w-full p-1">
            <option value="">Select Task</option>
            @foreach($tasks as $task)
                <option value="{{ $task->id }}">{{ $task->title }}</option>
            @endforeach
        </select>

        <button class="bg-green-500 text-white px-3 py-1 rounded">Save</button>
    </form>
@endsection
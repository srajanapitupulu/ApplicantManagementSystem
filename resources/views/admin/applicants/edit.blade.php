@extends('admin.layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Applicant</h2>

    <form action="{{ route('admin.applicants.update', $applicant) }}" method="POST" class="space-y-3">
        @csrf @method('PUT')

        <input type="text" name="first_name" value="{{ $applicant->first_name }}" class="border w-full p-1">
        <input type="text" name="last_name" value="{{ $applicant->last_name }}" class="border w-full p-1">
        <input type="email" name="email" value="{{ $applicant->email }}" class="border w-full p-1">

        <select name="task_id" class="border w-full p-1">
            @foreach($tasks as $task)
                <option value="{{ $task->id }}" @selected($task->id == $applicant->task_id)>
                    {{ $task->title }}
                </option>
            @endforeach
        </select>

        <select name="status" class="border w-full p-1">
            @foreach(['email_sent', 'under_review', 'submitted'] as $status)
                <option value="{{ $status }}" @selected($status == $applicant->status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>

        <select name="stage" class="border w-full p-1">
            @foreach(['welcome', 'instructions', 'submission', 'confirmation'] as $stage)
                <option value="{{ $stage }}" @selected($stage == $applicant->stage)>{{ ucfirst($stage) }}</option>
            @endforeach
        </select>

        <button class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
    </form>
@endsection
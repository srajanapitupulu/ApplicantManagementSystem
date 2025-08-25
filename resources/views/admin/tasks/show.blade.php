@extends('admin.layout')

@section('content')
    <h2>Task Details</h2>

    <p><strong>Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong></p>
    <p>{{ $task->description }}</p>

    <a href="{{ route('admin.tasks.edit', $task) }}">✏️ Edit Task</a> |
    <a href="{{ route('admin.tasks.index') }}">⬅ Back to Task List</a>
@endsection
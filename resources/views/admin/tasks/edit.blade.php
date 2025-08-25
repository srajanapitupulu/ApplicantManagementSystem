@extends('admin.layout')

@section('content')
    <h2>Edit Task</h2>

    <form method="POST" action="{{ route('admin.tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label>Title</label><br>
            <input type="text" name="title" value="{{ $task->title }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Description</label><br>
            <textarea name="description" required
                style="width: 100%; height: 120px; padding: 5px;">{{ $task->description }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
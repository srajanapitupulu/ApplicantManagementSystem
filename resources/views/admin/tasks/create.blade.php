@extends('admin.layout')

@section('content')
    <h2>Create Task</h2>

    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Title</label><br>
            <input type="text" name="title" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Description</label><br>
            <textarea name="description" required style="width: 100%; height: 120px; padding: 5px;"></textarea>
        </div>

        <button type="submit">Save</button>
    </form>
@endsection
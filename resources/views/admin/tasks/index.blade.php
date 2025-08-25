@extends('admin.layout')

@section('content')
    <h2>Tasks</h2>
    <a href="{{ route('admin.tasks.create') }}">+ New Task</a>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($tasks as $task)
            <li>
                <a href="{{ route('admin.tasks.show', $task) }}">
                    <strong>{{ $task->title }}</strong>
                </a>
                | <a href="{{ route('admin.tasks.edit', $task) }}">Edit</a>
                <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
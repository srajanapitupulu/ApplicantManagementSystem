@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif; max-width: 600px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Edit Task</h2>
        <form method="POST" action="{{ route('admin.tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 6px;">Title</label>
                <input type="text" name="title" value="{{ $task->title }}" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: bold; margin-bottom: 6px;">Description</label>
                <textarea name="description" required
                    style="width: 100%; height: 500px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">{{ $task->description }}</textarea>
            </div>

            <button type="submit"
                style="background-color: #1d4ed8; color: #fff; padding: 12px 20px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer;">
                Save
            </button>
        </form>
    </div>
@endsection
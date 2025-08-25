@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Tasks</h2>

        <a href="{{ route('admin.tasks.create') }}"
            style="display: inline-block; background-color: #1d4ed8; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; margin-bottom: 20px;">
            + Add Task
        </a>

        <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background-color: #f3f4f6; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Title</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Description</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Applicants</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Created At</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="border-b">
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.tasks.show', $task) }}"
                                class="text-blue-600 hover:underline">{{ $task->title }}</a>
                        </td>
                        <td class="py-2 px-4">{{ Str::limit($task->description, 50) }}</td>
                        <td class="py-2 px-4">{{ $task->applicants_count }}</td>
                        <td class="py-2 px-4">{{ $task->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4 text-right">
                            <a href="{{ route('admin.tasks.edit', $task) }}" class="text-green-600 hover:underline">Edit</a> |
                            <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this task?')"
                                    class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">No tasks available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
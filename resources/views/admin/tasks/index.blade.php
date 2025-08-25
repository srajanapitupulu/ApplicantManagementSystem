@extends('admin.layout')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">Tasks</h1>

        <table class="w-full text-left border">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Applicants</th>
                    <th class="py-2 px-4">Created At</th>
                    <th class="py-2 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $task->title }}</td>
                        <td class="py-2 px-4">{{ Str::limit($task->description, 50) }}</td>
                        <td class="py-2 px-4">{{ $task->applicants_count }}</td>
                        <td class="py-2 px-4">{{ $task->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4 text-right">
                            <a href="{{ route('admin.tasks.show', $task) }}" class="text-blue-600 hover:underline">View</a> |
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
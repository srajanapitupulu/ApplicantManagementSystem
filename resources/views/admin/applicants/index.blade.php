@extends('admin.layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Applicants</h2>

    <a href="{{ route('admin.applicants.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded">+ Add Applicant</a>

    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-2 py-1">Name</th>
                <th class="px-2 py-1">Email</th>
                <th class="px-2 py-1">Task</th>
                <th class="px-2 py-1">Status</th>
                <th class="px-2 py-1">Portal Link</th>
                <th class="px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td>
                        <a href="{{ route('admin.applicants.show', $applicant) }}"
                            class="text-blue-600">{{ $applicant->full_name }}
                        </a>
                    </td>
                    <td>{{ $applicant->email }}</td>
                    <td>{{ $applicant->task->title }}</td>
                    <td>{{ $applicant->status }}</td>
                    <td>
                        <input type="text" value="{{ url('/portal/' . $applicant->portal_token) }}" readonly
                            class="w-full text-sm border px-1">
                    </td>
                    <td>
                        <a href="{{ route('admin.applicants.edit', $applicant) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('admin.applicants.destroy', $applicant) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('Delete applicant?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
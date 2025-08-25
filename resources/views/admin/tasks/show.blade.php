@extends('admin.layout')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">{{ $task->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $task->description }}</p>

        <div class="mb-6">
            <span class="text-sm text-gray-500">Created at:</span>
            <span>{{ $task->created_at->format('Y-m-d H:i') }}</span>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">Applicants</h2>

        <table class="w-full text-left border">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Submitted At</th>
                    <th class="py-2 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($task->applicants as $applicant)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
                        <td class="py-2 px-4">{{ $applicant->email }}</td>
                        <td class="py-2 px-4">{{ $applicant->status_label }}</td>
                        <td class="py-2 px-4">
                            {{ $applicant->submitted_at ? $applicant->submitted_at->format('Y-m-d H:i') : '-' }}
                        </td>
                        <td class="py-2 px-4 text-right">
                            <a href="{{ route('admin.applicants.show', $applicant) }}"
                                class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">No applicants yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
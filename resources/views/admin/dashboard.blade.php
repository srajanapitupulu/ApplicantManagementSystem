@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Tasks -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Tasks</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalTasks }}</p>
        </div>

        <!-- Total Applicants -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Applicants</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalApplicants }}</p>
        </div>

        <!-- Under Review -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Under Review</h2>
            <p class="text-3xl font-bold text-yellow-500">{{ $underReviewApplicants }}</p>
        </div>

        <!-- Submitted -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Submitted</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $submittedApplicants }}</p>
        </div>
    </div>


    <!-- Recent Tasks -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Tasks</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">ID</th>
                    <th class="p-2">Title</th>
                    <th class="p-2">Created At</th>
                    <th class="p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentTasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2">{{ $task->id }}</td>
                        <td class="p-2">
                            <a href="{{ route('admin.tasks.show', $task) }}"
                                class="text-blue-600 hover:underline">{{ $task->title }}</a>
                        </td>
                        <td class="p-2">{{ $task->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-2">{{ $task->is_active == 1 ? 'active' : 'not active' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-2 text-center text-gray-500">No tasks yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3 text-sm font-bold text-right">
            <a href="{{ route('admin.tasks.index') }}" class="text-blue-600 hover:underline">View All Tasks →</a>
        </div>
    </div>

    <!-- Recent Applicants -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Applicants</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">ID</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Task</th>
                    <th class="p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentApplicants as $applicant)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2">{{ $applicant->id }}</td>
                        <td class="p-2">
                            <a href="{{ route('admin.applicants.show', $applicant) }}"
                                style="color: #1d4ed8; text-decoration: none;">
                                {{ $applicant->full_name }}
                            </a>
                        </td>
                        <td class="p-2">{{ $applicant->email }}</td>
                        <td class="p-2">{{ $applicant->task->title ?? '-' }}</td>
                        <td class="py-2 px-4">
                            @php
                                $statusColors = [
                                    'email_sent' => '#facc15',
                                    'under_review' => '#3b82f6',
                                    'submitted' => '#10b981'
                                ];
                            @endphp
                            <span style="color: #fff; background-color: {{ $statusColors[$applicant->status] ?? '#6b7280' }}; padding: 4px 8px; border-radius: 4px; font-size: 12px;">
                                {{ $applicant->status_label }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-2 text-center text-gray-500">No applicants yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3 text-sm font-bold text-right">
            <a href="{{ route('admin.applicants.index') }}" class="text-blue-600 hover:underline">View All Applicants →</a>
        </div>
    </div>
@endsection
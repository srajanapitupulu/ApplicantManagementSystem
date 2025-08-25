@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Applicants</h2>

        <a href="{{ route('admin.applicants.create') }}"
            style="display: inline-block; background-color: #1d4ed8; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; margin-bottom: 20px;">
            + Add Applicant
        </a>

        <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background-color: #f3f4f6; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Name</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Task</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Status</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applicants as $applicant)
                    <tr class="border-b">
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.applicants.show', $applicant) }}"
                                style="color: #1d4ed8; text-decoration: none;">
                                {{ $applicant->full_name }}
                            </a>
                        </td>
                        <td class="py-2 px-4">{{ $applicant->email }}</td>
                        <td class="py-2 px-4">{{ $applicant->task->title }}</td>
                        <td class="py-2 px-4">
                            @php
                                $statusColors = [
                                    'email_sent' => '#facc15',
                                    'under_review' => '#3b82f6',
                                    'submitted' => '#10b981'
                                ];
                            @endphp
                            <span style="color: #fff; background-color: {{ $statusColors[$applicant->status] ?? '#6b7280' }};
                                                 padding: 4px 8px; border-radius: 4px; font-size: 12px;">
                                {{ ucfirst(str_replace('_', ' ', $applicant->status)) }}
                            </span>
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.applicants.edit', $applicant) }}"
                                style="color: #1d4ed8; margin-right: 10px; text-decoration: none;">Edit</a>
                            <form action="{{ route('admin.applicants.destroy', $applicant) }}" method="POST" class="inline"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button style="color: #ef4444; background: none; border: none; cursor: pointer;"
                                    onclick="return confirm('Delete applicant?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
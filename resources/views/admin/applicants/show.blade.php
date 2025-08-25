@extends('admin.layout')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">
            {{ $applicant->first_name }} {{ $applicant->last_name }}
        </h1>

        <div class="mb-6">
            <p><span class="font-semibold">Email:</span> {{ $applicant->email }}</p>
            <p><span class="font-semibold">Status:</span> {{ $applicant->status_label }}</p>
            <p>
                <span class="font-semibold">Task:</span>
                {{ $applicant->task->title ?? '-' }}
                @if($applicant->task)
                    <button id="copyPortalBtn" class="ml-2 bg-gray-200 px-2 py-1 rounded hover:bg-gray-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16h8M8 12h8m-8-4h8m-6 8h.01M6 8h.01M6 12h.01M6 16h.01M6 20h.01M18 8h.01M18 12h.01M18 16h.01M18 20h.01" />
                        </svg>
                        Copy Link
                    </button>
                @endif
            </p>
            <p><span class="font-semibold">Submitted At:</span>
                {{ $applicant->submitted_at ? $applicant->submitted_at->format('Y-m-d H:i') : '-' }}
            </p>
        </div>

        @if($applicant->submission_link || $applicant->submission_notes)
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Submission</h2>
            <div class="bg-gray-50 p-4 rounded-lg border">
                @if($applicant->submission_link)
                    <p><span class="font-semibold">Repository / File Link:</span>
                        <a href="{{ $applicant->submission_link }}" class="text-blue-600 underline" target="_blank">
                            {{ $applicant->submission_link }}
                        </a>
                    </p>
                @endif
                @if($applicant->submission_notes)
                    <p class="mt-2"><span class="font-semibold">Notes:</span></p>
                    <p class="text-gray-700 whitespace-pre-line">{{ $applicant->submission_notes }}</p>
                @endif
            </div>
        @endif

        <div class="mb-6">
            <p><span class="font-semibold">Status:</span> {{ $applicant->status_label }}</p>

            <form action="{{ route('admin.applicants.updateStatus', $applicant) }}" method="POST"
                class="mt-2 flex items-center space-x-2">
                @csrf
                @method('PATCH')
                <select name="status" class="border px-2 py-1 rounded">
                    @foreach(['email_sent', 'under_review', 'submitted'] as $status)
                        <option value="{{ $status }}" @selected($status == $applicant->status)>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('copyPortalBtn')?.addEventListener('click', function () {
            const portalUrl = "{{ $applicant->portal_url }}";
            navigator.clipboard.writeText(portalUrl).then(() => {
                alert('Portal link copied to clipboard!');
            }).catch(() => {
                alert('Failed to copy link.');
            });
        });
    </script>
@endsection
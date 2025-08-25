@extends('layout.portal')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Applicant Portal</h1>
    <div class="mb-6">
        <p>Welcome to the evaluation process of Handys company.</p>
        <p>Hello, <strong>{{ $applicant->full_name }}</strong></p>
        <p><strong>{{ $screen }}</strong></p>
    </div>

    {{-- Welcome --}}
    @if($screen === 'welcome')
        <div class="mb-6">
            <p>You have 8 hours for this test, with a possible +1 hour extension if needed.</p>
        </div>
    @endif

    {{-- Instructions --}}
    @if($screen === 'instructions')
        <h2 class="text-xl font-semibold mb-4">Task Instructions</h2>
        <div class="mb-6 p-4 bg-gray-100 rounded">
            {!! nl2br(e($applicant->task->description)) !!}
        </div>
    @endif

    {{-- Submission --}}
    @if($screen === 'submission')
        <h2 class="text-xl font-semibold mb-4">Submit Your Work</h2>
        <form action="{{ route('applicant.portal.submit', $applicant->portal_token) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label>Repository / File Link</label>
                <input type="url" name="submission_link" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Upload File</label>
                <input type="file" name="submission_file" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Notes / Comments</label>
                <textarea name="submission_notes" class="w-full border p-2 rounded" rows="4"></textarea>
            </div>

            <div class="flex space-x-2 mt-4">
                <form action="{{ route('applicant.portal.prev', $applicant->portal_token) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-400 text-white px-4 py-2 rounded">Prev</button>
                </form>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
    @endif


    {{-- Confirmation --}}
    @if($screen === 'confirmation')
        <div class="p-6 bg-green-100 rounded">
            <p>You've successfully submitted your evaluation. We will notify you of the results via email.</p>
        </div>
    @endif

    {{-- Next button for welcome & instructions --}}
    @if(in_array($screen, ['welcome', 'instructions']))
        <form action="{{ route('applicant.portal.next', $applicant->portal_token) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Next</button>
        </form>
    @endif
@endsection
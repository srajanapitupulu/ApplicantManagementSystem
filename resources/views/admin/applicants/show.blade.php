@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif; max-width: 800px;">

        <div style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

            <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">
                {{ $applicant->first_name }} {{ $applicant->last_name }}
            </h1>

            <div style="margin-bottom: 20px; line-height: 1.6;">
                <p><strong>Email:</strong> {{ $applicant->email }}</p>
                <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $applicant->status)) }}</p>
                <p>
                    <strong>Task:</strong>
                    {{ $applicant->task->title ?? '-' }}
                    @if($applicant->task)
                        <button id="copyPortalBtn"
                            style="margin-left: 8px; padding: 4px 8px; background:#eee; border:none; border-radius:4px; cursor:pointer;">
                            Copy Link
                        </button>
                    @endif
                </p>
                <p><strong>Submitted At:</strong>
                    {{ $applicant->submitted_at ? $applicant->submitted_at->format('Y-m-d H:i') : '-' }}
                </p>
            </div>

            @if($applicant->submission_link || $applicant->submission_file || $applicant->submission_notes)
                <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 12px; color: #333;">Submission</h2>
                <div
                    style="background: #f9fafb; padding: 15px; border-radius: 8px; border: 1px solid #ddd; margin-bottom: 20px;">
                    @if($applicant->submission_link)
                        <p><strong>Repository / Link:</strong>
                            <a href="{{ $applicant->submission_link }}" target="_blank"
                                style="color:#1d4ed8; text-decoration:underline;">
                                {{ $applicant->submission_link }}
                            </a>
                        </p>
                    @endif

                    @if($applicant->submission_file)
                        <p><strong>Uploaded File:</strong>
                            <a href="{{ asset('storage/' . $applicant->submission_file) }}" target="_blank"
                                style="color:#1d4ed8; text-decoration:underline;">
                                {{ basename($applicant->submission_file) }}
                            </a>
                        </p>
                    @endif

                    @if($applicant->submission_notes)
                        <p><strong>Notes:</strong></p>
                        <p style="white-space: pre-line; color:#333;">{{ $applicant->submission_notes }}</p>
                    @endif
                </div>
            @endif

            <div style="margin-bottom: 20px;">
                <form action="{{ route('admin.applicants.updateStatus', $applicant) }}" method="POST"
                    style="display:flex; align-items:center; gap:10px;">
                    @csrf
                    @method('PATCH')
                    <label style="font-weight:bold;">Update Status:</label>
                    <select name="status" style="padding:6px; border-radius:4px; border:1px solid #ccc;">
                        @foreach(['email_sent', 'under_review', 'submitted'] as $status)
                            <option value="{{ $status }}" @selected($status == $applicant->status)>
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        style="background:#1d4ed8; color:#fff; padding:6px 12px; border:none; border-radius:4px; cursor:pointer;">Update</button>
                </form>
            </div>

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
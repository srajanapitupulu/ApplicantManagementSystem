<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantPortalController extends Controller
{
    public function show($token)
    {
        $applicant = Applicant::where('portal_token', $token)->firstOrFail();
        $screen = $applicant->stage; // directly use enum
        return view('portal.show', compact('applicant', 'screen'));
    }

    public function nextStep(Request $request, $token)
    {
        $applicant = Applicant::where('portal_token', $token)->firstOrFail();

        if ($applicant->stage === 'welcome') {
            $applicant->update([
                'stage' => 'instructions',
                'timer_started_at' => now(),
                'due_at' => now()->addHours(8),
                'status' => 'under_review',
            ]);
        } else if ($applicant->stage === 'instructions') {
            $applicant->update(['stage' => 'submission']);
        }

        $applicant->save();

        return redirect()->route('applicant.portal', $token);
    }

    public function prevStep(Request $request, $token)
    {
        $applicant = Applicant::where('portal_token', $token)->firstOrFail();

        if ($applicant->stage === 'instructions') {
            $applicant->update(['stage' => 'welcome']);
        } elseif ($applicant->stage === 'submission') {
            $applicant->update(['stage' => 'instructions']);
        }

        $applicant->save();

        return redirect()->route('applicant.portal', $token);
    }

    public function submit(Request $request, $token)
    {
        $applicant = Applicant::where('portal_token', $token)->firstOrFail();

        $data = $request->validate([
            'submission_link' => 'nullable|url',
            'submission_notes' => 'nullable|string',
            'submission_file' => 'nullable|file|max:10240', // max 10MB
        ]);

        if (empty($data['submission_file']) && empty($data['submission_link'])) {
            return back()->withErrors(['submission' => 'Please provide a submission file or link.'])->withInput();
        }

        // Handle file upload
        if ($request->hasFile('submission_file')) {
            $filePath = $request->file('submission_file')->store('submissions', 'public');
            $data['submission_file'] = $filePath;
        }

        $applicant->update(array_merge($data, [
            'status' => 'submitted',
            'stage' => 'confirmation',
            'submitted_at' => now(),
        ]));

        return redirect()->route('applicant.portal', $token);
    }

}

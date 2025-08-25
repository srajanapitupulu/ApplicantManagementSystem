<?php

namespace App\Http\Controllers;

use App\Models\Applicant;

class ApplicantPortalController extends Controller
{
    public function show($token)
    {
        $applicant = Applicant::where('portal_token', $token)->firstOrFail();

        // Decide which screen to show based on status / timestamps
        // Example:
        if (!$applicant->timer_started_at) {
            $screen = 'welcome';
        } elseif ($applicant->status === 'under_review') {
            $screen = 'instructions';
        } elseif ($applicant->status === 'submitted') {
            $screen = 'confirmation';
        } else {
            $screen = 'submission';
        }

        return view('portal.show', compact('applicant', 'screen'));
    }
}


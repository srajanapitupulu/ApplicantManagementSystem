<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Applicant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        $totalApplicants = Applicant::count();
        $submittedApplicants = Applicant::where('status', 'submitted')->count();
        $underReviewApplicants = Applicant::where('status', 'under_review')->count();

        $recentTasks = Task::latest()->take(5)->get();
        $recentApplicants = Applicant::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalTasks',
            'totalApplicants',
            'submittedApplicants',
            'underReviewApplicants',
            'recentTasks',
            'recentApplicants'
        ));
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with('task')->latest()->get();
        return view('admin.applicants.index', compact('applicants'));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('admin.applicants.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:applicants,email',
            'task_id' => 'required|exists:tasks,id',
        ]);

        $data['portal_token'] = Str::uuid();

        Applicant::create($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Applicant added successfully!');
    }

    public function show(Applicant $applicant)
    {
        $applicant->load('task'); // eager load related task

        return view('admin.applicants.show', compact('applicant'));
    }


    public function edit(Applicant $applicant)
    {
        $tasks = Task::all();
        return view('admin.applicants.edit', compact('applicant', 'tasks'));
    }

    public function update(Request $request, Applicant $applicant)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:applicants,email,' . $applicant->id,
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|in:email_sent,under_review,submitted',
            'stage' => 'required|in:welcome,instructions,submission,confirmation',
        ]);

        $applicant->update($data);

        return redirect()->route('admin.applicants.index')->with('success', 'Applicant updated successfully!');
    }

    public function updateStatus(Request $request, Applicant $applicant)
    {
        $data = $request->validate([
            'status' => 'required|in:email_sent,under_review,submitted',
        ]);

        // If status changes to submitted and submitted_at is null, set timestamp
        if ($data['status'] === 'submitted' && !$applicant->submitted_at) {
            $data['submitted_at'] = now();
        } else if ($data['status'] !== 'submitted') {
            $data['submitted_at'] = null;
        }

        $applicant->update($data);

        return redirect()->back()->with('success', 'Applicant status updated!');
    }



    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect()->route('admin.applicants.index')->with('success', 'Applicant deleted successfully!');
    }
}

@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif; max-width: 800px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Edit Applicant</h2>

        <form action="{{ route('admin.applicants.update', $applicant) }}" method="POST"
            style="display: flex; flex-direction: column; gap: 15px;">
            @csrf @method('PUT')

            <label for="first_name" style="font-weight: 700; color: #333;">First Name</label>
            <input type="text" name="first_name" value="{{ $applicant->first_name }}"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Last Name</label>
            <input type="text" name="last_name" value="{{ $applicant->last_name }}"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Email</label>
            <input type="email" name="email" value="{{ $applicant->email }}"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Assigned Task</label>
            <select name="task_id"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}" @selected($task->id == $applicant->task_id)>
                        {{ $task->title }}
                    </option>
                @endforeach
            </select>

            <label for="first_name" style="font-weight: 700; color: #333;">Task Status</label>
            <select name="status"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">
                @foreach(['email_sent', 'under_review', 'submitted'] as $status)
                    <option value="{{ $status }}" @selected($status == $applicant->status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>

            <label for="first_name" style="font-weight: 700; color: #333;">Assignment Stage</label>
            <select name="stage"
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">
                @foreach(['welcome', 'instructions', 'submission', 'confirmation'] as $stage)
                    <option value="{{ $stage }}" @selected($stage == $applicant->stage)>{{ ucfirst($stage) }}</option>
                @endforeach
            </select>

            <button
                style="background-color: #10b981; color: #fff; padding: 12px; border: none; border-radius: 6px; font-size: 16px; font-weight: 700; cursor: pointer;">
                Update
            </button>
        </form>
    </div>
@endsection
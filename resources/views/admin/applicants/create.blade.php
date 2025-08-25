@extends('admin.layout')

@section('content')
    <div style="padding: 40px; font-family: Arial, sans-serif; max-width: 800px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Add Applicant</h2>

        <form action="{{ route('admin.applicants.store') }}" method="POST"
            style="display: flex; flex-direction: column; gap: 15px;">
            @csrf

            <label for="first_name" style="font-weight: 700; color: #333;">First Name</label>
            <input type="text" name="first_name" placeholder="First Name" required
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" required
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Email</label>
            <input type="email" name="email" placeholder="Email" required
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">

            <label for="first_name" style="font-weight: 700; color: #333;">Assign Task</label>
            <select name="task_id" required
                style="padding: 10px; border-radius: 6px; border: 1px solid #ccc; width: 100%; box-sizing: border-box;">
                <option value="">Select Task</option>
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>

            <button type="submit"
                style="background-color: #10b981; color: #fff; padding: 12px; border: none; border-radius: 6px; font-size: 16px; font-weight: 700; cursor: pointer;">
                + Add Applicant
            </button>
        </form>
    </div>
@endsection
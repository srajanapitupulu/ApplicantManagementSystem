@extends('layout.portal')

@section('content')
    <h1>Applicant Portal</h1>
    <p>Hello, {{ $applicant->first_name }} {{ $applicant->last_name }}!</p>
    <p>Current screen: {{ ucfirst($screen) }}</p>

    {{-- You can later build the real multi-step screens here --}}
@endsection
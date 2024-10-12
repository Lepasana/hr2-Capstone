@extends('layouts.layoutMaster')

@section('title', 'Course Details')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $courseName }}</h3>
            <p class="card-text">
                This is the course content for {{ $courseName }}.
            </p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back to Courses</a>
        </div>
    </div>
</div>
@endsection

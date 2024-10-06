@extends('layouts/layoutMaster')

@section('title', 'Learning Management')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">

            <!-- Available Courses Section -->
            <h4>Available Courses</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Course 1: Introduction to Company Policies</strong>
                    <p class="mb-1">Learn about the company policies, code of conduct, and ethical guidelines.</p>
                    <a href="{{ route('course.view', ['id' => 1]) }}" class="btn btn-sm btn-primary">View Course</a>
                </li>
                <li class="list-group-item">
                    <strong>Course 2: Workplace Safety Training</strong>
                    <p class="mb-1">Understand safety protocols and emergency procedures in the workplace.</p>
                    <a href="{{ route('course.view', ['id' => 2]) }}" class="btn btn-sm btn-primary">View Course</a>
                </li>
                <li class="list-group-item">
                    <strong>Course 3: Customer Service Excellence</strong>
                    <p class="mb-1">Develop customer service skills and strategies for delivering great service.</p>
                    <a href="{{ route('course.view', ['id' => 3]) }}" class="btn btn-sm btn-primary">View Course</a>
                </li>
            </ul>

            <!-- Course Progress Section -->
            <h4>Your Progress</h4>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Course 1: Introduction to Company Policies</strong>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75% Complete</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <strong>Course 2: Workplace Safety Training</strong>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% Complete</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <strong>Course 3: Customer Service Excellence</strong>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20% Complete</div>
                    </div>
                </li>
            </ul>

            <!-- Certificates Section -->
            <h4>Your Certificates</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Introduction to Company Policies</strong>
                    <p class="mb-1">Completed on: 2024-09-15</p>
                    <a href="#" class="btn btn-sm btn-success">Download Certificate</a>
                </li>
                <li class="list-group-item">
                    <strong>Workplace Safety Training</strong>
                    <p class="mb-1">Completed on: 2024-08-30</p>
                    <a href="#" class="btn btn-sm btn-success">Download Certificate</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

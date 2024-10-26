@extends('layouts.layoutMaster')

@section('title', 'Employee Self Service')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body p-2">
                <h3 class="text-center">Employee Self Service</h3>
                <p class="text-center">Manage your Personal Information, Payroll, Benefits, and more!</p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row align-items-start">
            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center">
                    <div class="card-body">
                        <h4>Personal Information</h4>
                        <p>View and update your Personal Details.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">Update Info</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center">
                    <div class="card-body">
                        <h4>Payroll</h4>
                        <p>Access your Payroll Information, Pay Slips, and Tax Documents.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">View Payroll</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center mt-3">
                    <div class="card-body">
                        <h4>Benefits</h4>
                        <p>Manage your health, retirement, and other benefit options.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">View Benefits</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center mt-3">
                    <div class="card-body">
                        <h4>Time Off</h4>
                        <p>Request Time-off and track your Vacation and Sick Days.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">Request Time Off</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center mt-3">
                    <div class="card-body">
                        <h4>Performance Reviews</h4>
                        <p>Access and review your Performance Appraisals.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">View Reviews</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card align-center justify-content-center text-center mt-3">
                    <div class="card-body">
                        <h4>Training & Development</h4>
                        <p>Enroll in Training Programs and track your progress.</p>
                        <div class="w-full">
                            <button type="button" class="btn btn-primary btn-sm">View Training</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

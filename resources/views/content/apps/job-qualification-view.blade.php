@extends('layouts/layoutMaster')

@section('title', 'Competency Management - Apps')

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Competency Management List</span>
    </h4>

    <div class="container mt-5">
        <div class="card p-5">
            <div>
                <a href="{{ url('/job-qualification') }}" class="btn btn-dark btn-sm px-4 m-4 text-white">Back</a>
            </div>
            <div class="card-datatable table-responsive p-2">
                <h2>{{ $qualification->jobRequest->job_title }}</h2>
                <div>
                    <h6>Qualifications:</h6>
                    <p>{!! $qualification->content !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

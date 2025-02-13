@extends('layouts.layoutMaster')

@section('title', 'Employee Self Service')

@section('content')
    @if (session()->has('success'))
        <x-alert successMessage="{{ session('success') }}" />
    @endif

    <div class="container mt-3">
        <div class="row align-items-start">
            <div class="col-md-3">
                <x-card-component title="Number of Job Request" :description="$jobRequestCount" />
            </div>

            <div class="col-md-3">
                <x-card-component title="Number of Training" :description="$trainingCount" />
            </div>

            <div class="col-md-3">
                <x-card-component title="Number of Successor" :description="$successorCount" />
            </div>

            <div class="col-md-3">
                <x-card-component title="Number of Competency" :description="$competencyCount" />
            </div>

        </div>
    </div>
@endsection

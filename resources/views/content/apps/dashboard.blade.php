@extends('layouts.layoutMaster')

@section('title', 'Dashboard')

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

            <div class="col-md-6 my-5">
                <div class="card align-center justify-content-center text-center">
                    <div class="card-body">
                        {!! $jobRequestChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6 my-5">
                <div class="card align-center justify-content-center text-center">
                    <div class="card-body">
                        {!! $trainingChart->container() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $jobRequestChart->script() !!}
    {!! $trainingChart->script() !!}
@endsection

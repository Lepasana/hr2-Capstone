@extends('layouts/layoutMaster')

@section('title', 'Edit - Invoice')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('page-style')
    @vite('resources/assets/vendor/scss/pages/app-invoice.scss')
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/offcanvas-add-payment.js', 'resources/assets/js/offcanvas-send-invoice.js', 'resources/assets/js/app-invoice-edit.js'])
@endsection

@section('content')
    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <form action="{{ route('succession-planning.update', ['id' => $successor->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="employee" class="form-select" required>
                                    <option value="{{ $successor->employee->id }}">{{ $successor->employee->name }}</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach

                                @if ($errors->has('employee'))
                                    <div class="text-danger">
                                        {{ $errors->first('employee') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Current Position</label>
                            <input type="text" name="current_position" id="current_position" class="form-control"
                                value="{{ $successor->current_position ?? old('current_position') }}" required>

                            @if ($errors->has('current_position'))
                                <div class="text-danger">
                                    {{ $errors->first('current_position') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Potential Successor</label>
                            <input type="text" name="potential_successor" class="form-control"
                                value="{{ $successor->potential_successor ?? old('potential_successor') }}" required>
                            @if ($errors->has('potential_successor'))
                                <div class="text-danger">
                                    {{ $errors->first('potential_successor') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Development Needs</label>
                            <input type="text" name="development_needs" class="form-control"
                                value="{{ $successor->development_needs ?? old('development_needs') }}" required>

                            @if ($errors->has('development_needs'))
                                <div class="text-danger">
                                    {{ $errors->first('development_needs') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Readiness Level</label>
                            <input type="text" name="readiness_level" class="form-control"
                                value="{{ $successor->readiness_level ?? old('readiness_level') }}" required>

                            @if ($errors->has('readiness_level'))
                                <div class="text-danger">
                                    {{ $errors->first('readiness_level') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/succession-planning') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas -->
    @include('_partials/_offcanvas/offcanvas-send-invoice')
    @include('_partials/_offcanvas/offcanvas-add-payment')
    <!-- /Offcanvas -->
@endsection

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
                    @if (session()->has('success'))
                        <x-alert successMessage="{{ session('success') }}" />
                    @elseif(session()->has('error'))
                        <x-alert errorMessage="{{ session('error') }}" />
                    @endif

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
                            <select name="current_position" id="current_position" class="form-select"
                                value="{{ old('current_position') }}" required>
                                <option value="{{ $successor->current_position }}" selected>
                                    {{ $successor->current_position }}</option>
                                @foreach ($currentPositions as $currentPosition)
                                    <option value="{{ $currentPosition }}">{{ $currentPosition }}</option>
                                @endforeach

                                @if ($errors->has('current_position'))
                                    <div class="text-danger">
                                        {{ $errors->first('current_position') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" value="{{ old('department') }}"
                                required>
                                <option value="{{ $successor->department }}" selected>
                                    {{ $successor->department ?? 'Select an option' }}</option>
                                @foreach ($departmentEnums as $departmentEnum)
                                    <option value="{{ $departmentEnum }}">{{ $departmentEnum }}</option>
                                @endforeach

                                @if ($errors->has('department'))
                                    <div class="text-danger">
                                        {{ $errors->first('department') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" value="{{ old('status') }}" required>
                                <option value="{{ $successor->status }}" selected>
                                    {{ $successor->status ?? 'Select an option' }}</option>
                                @foreach ($statusEnums as $statusEnum)
                                    <option value="{{ $statusEnum }}">{{ $statusEnum }}</option>
                                @endforeach

                                @if ($errors->has('status'))
                                    <div class="text-danger">
                                        {{ $errors->first('status') }}
                                    </div>
                                @endif
                            </select>
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

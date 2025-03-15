@extends('layouts/layoutMaster')

@section('title', 'Succession Planning')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'])
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

                    <form action="{{ url('/succession-planning/store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="col-md-12">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="employee" class="form-select" value="{{ old('employee') }}"
                                required>
                                <option value="" selected>Select Employee</option>
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
                                <option value="" selected>Select Position</option>
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
                            <label for="" class="form-label">Potential Successor</label>
                            <select name="potential_successor" id="potential_successor" class="form-select"
                                value="{{ old('potential_successor') }}" required>
                                <option value="" selected>Select Successor</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach

                                @if ($errors->has('potential_successor'))
                                    <div class="text-danger">
                                        {{ $errors->first('potential_successor') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Department</label>
                            <select name="department" id="department" class="form-select" value="{{ old('department') }}"
                                required>
                                <option value="" selected>
                                    {{ '' ?? 'Select an option' }}</option>
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
                                <option value="" selected>
                                    {{ '' ?? 'Select an option' }}</option>
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
                            <button type="button" onclick="location.href = '{{ url('/succession-planning/status') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

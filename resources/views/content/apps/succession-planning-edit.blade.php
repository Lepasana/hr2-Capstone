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
                        <div class="col-md-6">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="select-employee" class="form-select" required>
                                <option value="{{ $successor->employee->id }}">{{ $successor->employee->name }}</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" data-position="{{ $employee->jobPosition->title }}"
                                        data-department="{{ $employee->department }}">{{ $employee->name }}</option>
                                @endforeach

                                @if ($errors->has('employee'))
                                    <div class="text-danger">
                                        {{ $errors->first('employee') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6 mt-3" id="current-position-container">
                            <label for="" class="form-label">Current Position</label>
                            <input type="text" name="current_position" id="current_position" class="form-control"
                                value="{{ $successor->current_position }}" readonly />
                        </div>


                        <div class="col-md-6 mt-3" id="current-department-container">
                            <label for="" class="form-label">Department</label>
                            <input type="text" name="department" id="department" class="form-control"
                                value="{{ $successor->department }}" readonly />
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="" class="form-label">Promote To:</label>
                            <select name="promoted_to" id="promoted_to" class="form-select" value="{{ old('promoted_to') }}"
                                required>
                                <option value="{{ $successor->promoted_to }}" selected>{{ $successor->promoted_to }}
                                </option>
                                @foreach ($jobPositions as $jobPosition)
                                    <option value="{{ $jobPosition->title }}">{{ $jobPosition->title }}</option>
                                @endforeach

                                @if ($errors->has('promoted_to'))
                                    <div class="text-danger">
                                        {{ $errors->first('promoted_to') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" value="{{ old('status') }}" required>
                                <option value="{{ $successor->status }}" selected>
                                    {{ $successor->status ?? 'Select an option' }}
                                </option>
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

    <script>
        document.getElementById('select-employee').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            let position = selectedOption.getAttribute('data-position') || '';
            let department = selectedOption.getAttribute('data-department') || '';
            let positionField = document.getElementById('current_position');
            let departmentField = document.getElementById('department');

            positionField.value = position;
            departmentField.value = department;
        });
    </script>
@endsection
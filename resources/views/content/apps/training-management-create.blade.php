@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Training Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <form action="{{ url('/training-management/store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-md-12">
                            <label for="" class="form-label">Training Name</label>
                            <input type="text" name="training_name" id="training_name" class="form-control"
                                value="{{ old('training_name') }}" required>

                            @if ($errors->has('training_name'))
                                <div class="text-danger">
                                    {{ $errors->first('training_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="employee" class="form-select" required>
                                <option value="{{ old('employee') }}" selected>Select Employee</option>
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
                            <label for="" class="form-label">Training Date</label>
                            <input type="datetime-local" name="training_date" class="form-control"
                                value="{{ old('training_date') }}" required>
                            @if ($errors->has('training_date'))
                                <div class="text-danger">
                                    {{ $errors->first('training_date') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Duration</label>
                            <select name="duration" id="duration" class="form-select" required>
                                <option value="{{ old('duration') }}" selected>Select Duration</option>
                                @foreach ($durations as $duration)
                                    <option value="{{ $duration->id }}">{{ $duration->title }}</option>
                                @endforeach

                                @if ($errors->has('duration'))
                                    <div class="text-danger">
                                        {{ $errors->first('duration') }}
                                    </div>
                                @endif
                            </select>

                            @if ($errors->has('duration'))
                                <div class="text-danger">
                                    {{ $errors->first('duration') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="" selected>Select Status</option>

                                @foreach ($status as $stat)
                                    <option value="{{ $stat }}">{{ $stat }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/training-management') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

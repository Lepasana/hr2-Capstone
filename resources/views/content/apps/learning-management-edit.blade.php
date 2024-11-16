@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Learning Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <form action="{{ route('learning-management.update', ['id' => $exam->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ $exam->title ?? old('title') }}" required>

                            @if ($errors->has('title'))
                                <div class="text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        {{-- <div class="col-md-12">
                            <label for="" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control"
                                value="{{ old('type') }}" required>

                            @if ($errors->has('type'))
                                <div class="text-danger">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div> --}}


                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/learning-management') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

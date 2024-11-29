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
                    <form action="{{ url('/job-qualification/store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-md-12">
                            <label for="" class="form-label">Content</label>
                            <textarea class="form-control" id="content" rows="5" name="content"></textarea>


                            @if ($errors->has('content'))
                                <div class="text-danger">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/job-qualification') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor.create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

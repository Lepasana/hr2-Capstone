@extends('layouts/layoutMaster')

@section('title', 'Succession Planning')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'])
@endsection

@section('page-script')
    {{-- @vite('resources/assets/js/app-invoice-list.js') --}}
@endsection
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <div class="container">
        <h2>Two-Factor Authentication</h2>
        <p>Enter the 6-digit code from your authentication app.</p>

        {{ session('2fa_authenticated') }}
        <form method="POST" action="{{ route('2fa.verify') }}">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Authentication Code</label>
                <input type="text" id="code" name="code" class="form-control" required autofocus>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
@endsection

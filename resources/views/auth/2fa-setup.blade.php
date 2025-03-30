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
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">2-Factor Authentication</span>
    </h4>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="container p-5 d-flex flex-column gap-2">
            <h2>Setup Two-Factor Authentication</h2>

            <p>Scan the QR code below using Google Authenticator:</p>

            <div>
                {!! $qrCodeUrl !!}
                {{-- <img src="{{ $qrCodeUrl }}" alt="Image"> --}}
            </div>

            @if (auth()->user()->google2fa_enabled)
                <form action="{{ route('2fa.disable') }}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-success">Disable 2FA</button>
                </form>
            @else
                <form action="{{ route('2fa.enable') }}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-success">Enable 2FA</button>
                </form>
            @endif

        </div>
    </div>

@endsection

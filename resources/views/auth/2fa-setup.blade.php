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
                {{-- {!! $qrCodeUrl !!} --}}
                <img src="{{ $qrCodeUrl }}" alt="Image">
            </div>

            @if (auth()->user()->google2fa_enabled)
                <form action="{{ route('2fa.disable') }}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-success">Disable 2FA</button>
                </form>
            @else
                <!-- Trigger Button -->
                <button type="button" class="btn btn-success w-25" data-bs-toggle="modal"
                    data-bs-target="#confirmEnable2faModal">
                    Enable 2FA
                </button>
            @endif

        </div>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmEnable2faModal" tabindex="-1" aria-labelledby="confirmEnable2faModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmEnable2faModalLabel">Confirm 2FA Activation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('2fa.enable') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="modal-body">
                            Are you sure you want to enable Two-Factor Authentication?
                            <br>
                            <strong>Please make sure to scan and save the QR code using Google Authenticator before
                                proceeding.</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <!-- This button submits the form -->
                            <button type="submit" class="btn btn-success" id="confirmEnableBtn">Yes, Enable</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

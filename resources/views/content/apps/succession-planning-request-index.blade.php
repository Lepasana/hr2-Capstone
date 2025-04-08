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
        <span class="text-muted fw-light">Succession Planning List of Requests</span>
    </h4>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="card-datatable table-responsive p-5">
            @if (session()->has('success'))
                <x-alert successMessage="{{ session('success') }}" />
            @elseif(session()->has('error'))
                <x-alert errorMessage="{{ session('error') }}" />
            @endif

            <table id="dataTable" class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th class="text-center cell-fit">Employee Name</th>
                        <th class="text-center cell-fit">Status</th>
                        <th class="cell-fit">Actions</th>
                    </tr>
                </thead>
                <tbody id="succession-planning-table-body">
                    @include('content.apps.partials.succession-planning-request-table')
                </tbody>
            </table>
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.approve-button').forEach(button => {
            button.addEventListener('click', function() {
                let actionUrl = this.getAttribute('data-action');

                Swal.fire({
                    title: "Are you sure you want to accept this?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes!",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;
                        form.innerHTML = `
                            @csrf
                            @method('PUT')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });


        // FOR REJECTING REQUEST
        document.querySelectorAll('.reject-button').forEach(button => {
            button.addEventListener('click', function() {
                let actionUrl = this.getAttribute('data-action');

                Swal.fire({
                    title: "Are you sure you want to reject this?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes!",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;
                        form.innerHTML = `
                            @csrf
                            @method('PUT')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

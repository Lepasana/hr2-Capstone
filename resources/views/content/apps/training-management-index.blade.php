@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Training Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive p-2">
                @if (session()->has('success'))
                    <x-alert successMessage="{{ session('success') }}" />
                @elseif(session()->has('error'))
                    <x-alert errorMessage="{{ session('error') }}" />
                @endif

                {{-- Filter --}}
                <div class="d-flex justify-content-end w-100">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-icon tf-icons ti ti-filter" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Filter Training reports" />
                        </button>
                        <ul class="dropdown-menu p-3">
                            <li>
                                <!-- From Filter -->
                                <div class="mb-2">
                                    <label for="from" class="form-label">From</label>
                                    <input type="date" name="from" id="from" class="form-control">
                                </div>
                            </li>
                            <li>
                              <!-- To Filter -->
                              <div class="mb-2">
                                  <label for="to" class="form-label">To</label>
                                  <input type="date" name="to" id="to" class="form-control">
                              </div>
                          </li>
                        </ul>
                    </div>
                </div>

                <table id="dataTable" class="datatables-trainings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Training ID</th>
                            <th class="text-center cell-fit">Training Name</th>
                            <th class="text-center cell-fit">Employee Name</th>
                            <th class="text-center cell-fit">Training Date</th>
                            <th class="text-center cell-fit">Duration</th>
                            <th class="text-center cell-fit">Status</th>
                            <th class="text-center cell-fit">Date Finished</th>
                        </tr>
                    </thead>
                    <tbody id="training-table-body">
                        @include('content.apps.partials.training-table')
                    </tbody>
                </table>


                </>
            </div>
        </div>
@endsection
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            new DataTable('#dataTable'); // Use the correct ID
        });

        $(document).ready(function () {
            let dataTable = new DataTable('#dataTable'); // Initialize DataTable

            function filterReports() {
                let from = $('#from').val();
                let to = $('#to').val();

                $.ajax({
                    url: "{{ route('training-management') }}",
                    method: "GET",
                    data: { from: from, to: to },
                    success: function (response) {
                        $('#training-table-body').html(response.html);
                    }
                });
            }

            // Trigger AJAX on filter change
            $('#from, #to').on('change', function () {
                filterReports();
            });
        });
    </script>

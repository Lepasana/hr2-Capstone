@extends('layouts/layoutMaster')

@section('title', 'Security Service Learning Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Applicant Score List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive p-3">
                @if (session()->has('success'))
                    <x-alert successMessage="{{ session('success') }}" />
                @elseif(session()->has('error'))
                    <x-alert errorMessage="{{ session('error') }}" />
                @endif

                <button type="button" id="deleteSelected" class="btn btn-danger btn-sm d-none mx-3 my-4">
                    Delete Selected
                    (<span id="selectedCount">0</span>)
                </button>

                {{-- Filter --}}
                <div class="d-flex justify-content-end w-100">
                    <div class="dropdown">
                        <span>Filter</span>
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
                            <li>
                                <!-- Status Filter -->
                                <div class="mb-2">
                                    <label for="to" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="" selected>Select an option</option>
                                        @foreach ($scoreStatusEnums as $scoreStatusEnum)
                                            <option value="{{ $scoreStatusEnum }}">{{ $scoreStatusEnum }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <table id="dataTable" class="datatables-learnings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">
                                <input type="checkbox" id="selectAll" class="form-check-input" />
                            </th>
                            <th class="text-center cell-fit">ID</th>
                            <th class="text-center cell-fit">Applicant / Employee</th>
                            <th class="text-center cell-fit">Exam Title</th>
                            <th class="text-center cell-fit">Score</th>
                            <th class="text-center cell-fit">Status</th>
                            <th class="text-center cell-fit">Duration</th>
                            <th class="text-center cell-fit">Date Finished</th>
                        </tr>
                    </thead>
                    <tbody id="training-table-body">
                        @include('content.apps.partials.applicant-score-table')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#dataTable'); // Use the correct ID
    });

    // FOR FILTER
    $(document).ready(function() {
        let dataTable = new DataTable('#dataTable'); // Initialize DataTable

        function filterReports() {
            let from = $('#from').val();
            let to = $('#to').val();
            let status = $('#status').val();

            $.ajax({
                url: "{{ route('applicant-score') }}",
                method: "GET",
                data: {
                    from: from,
                    to: to,
                    status: status,
                },
                success: function(response) {
                    $('#training-table-body').html(response.html);
                }
            });
        }

        // Trigger AJAX on filter change
        $('#from, #to, #status').on('change', function() {
            filterReports();
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const selectAllCheckbox = document.getElementById("selectAll");
        const checkboxes = document.querySelectorAll('.applicant-checkbox');
        const deleteButton = document.getElementById("deleteSelected");
        const selectedCount = document.getElementById("selectedCount");

        // Select All Checkbox Toggle
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateDeleteButton(); // ✅ Manually call updateDeleteButton()
        });

        function updateDeleteButton() {
            const checkedBoxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
            const count = checkedBoxes.length;

            if (count > 0) {
                deleteButton.classList.remove("d-none");
                selectedCount.textContent = count; // Update count
            } else {
                deleteButton.classList.add("d-none");
                selectedCount.textContent = 0;
            }
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", updateDeleteButton);
        });

        // Initialize state on page load
        updateDeleteButton();

        // Delete Selected Applicants
        deleteButton.addEventListener("click", function() {
            let selectedIds = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedIds.push(checkbox.value);
                }
            });

            if (selectedIds.length === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "No Applicants Selected",
                    text: "Please select at least one applicant to delete.",
                });
                return;
            }

            // SweetAlert Confirmation
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete them!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('applicant-score.bulk-delete') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                applicant_ids: selectedIds
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: "The selected applicants have been removed.",
                                    timer: 2000,
                                    showConfirmButton: true
                                }).then(() => {
                                    location.reload(); // Refresh the page
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: "Failed to delete applicants. Please try again.",
                                });
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong. Please try again.",
                            });
                        });
                }
            });
        });
    });
</script>

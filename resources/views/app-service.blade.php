@extends('layouts.layoutMaster')

@section('title', 'Employee Self Service')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <!-- Update Personal Information Section -->
            <h4>Update Personal Information</h4>
            <form method="POST" action="{{ route('employee.updateInfo') }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', 'John Doe') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', 'johndoe@example.com') }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', '555-1234') }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', '1234 Main St.') }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Info</button>
            </form>
        </div>

        <div class="card-body">
            <!-- Change Password Section -->
            <h4>Change Password</h4>
            <form method="POST" action="{{ route('employee.changePassword') }}">
                @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app-employee-self-service.js') }}"></script>
@endsection

@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

@section('content')
<div class="">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-trainings table border-top">
          <thead>
            <tr>
              <th>Training ID</th>
              <th>Training Name</th>
              <th>Employee Name</th>
              <th>Training Date</th>
              <th>Duration</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Existing rows -->
            <tr>
              <td>001</td>
              <td>Basic Security Guard Training</td>
              <td>John Doe</td>
              <td>2024-10-10</td>
              <td>3 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>002</td>
              <td>Firearm Safety and Handling</td>
              <td>Jane Smith</td>
              <td>2024-10-12</td>
              <td>2 Days</td>
              <td>Completed</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>003</td>
              <td>Patrolling Techniques</td>
              <td>Michael Brown</td>
              <td>2024-10-15</td>
              <td>1 Day</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>004</td>
              <td>Emergency Response Training</td>
              <td>Susan Lee</td>
              <td>2024-10-18</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>005</td>
              <td>Surveillance and CCTV Operation</td>
              <td>Emily Davis</td>
              <td>2024-10-20</td>
              <td>1 Day</td>
              <td>Completed</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>006</td>
              <td>Access Control Systems</td>
              <td>David Wilson</td>
              <td>2024-10-25</td>
              <td>1 Day</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>007</td>
              <td>First Aid and CPR</td>
              <td>Emma Johnson</td>
              <td>2024-10-27</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>008</td>
              <td>Conflict Resolution and Negotiation</td>
              <td>Chris Martinez</td>
              <td>2024-10-30</td>
              <td>3 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>009</td>
              <td>Active Shooter Response Training</td>
              <td>Alice Taylor</td>
              <td>2024-11-02</td>
              <td>2 Days</td>
              <td>Completed</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>010</td>
              <td>Weapons Training and Certification</td>
              <td>Robert Garcia</td>
              <td>2024-11-05</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>

            <!-- New rows -->
            <tr>
              <td>011</td>
              <td>Advanced Threat Assessment</td>
              <td>Andrew King</td>
              <td>2024-11-10</td>
              <td>3 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>012</td>
              <td>Guard Leadership Training</td>
              <td>Karen Hall</td>
              <td>2024-11-12</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>013</td>
              <td>Cybersecurity for Physical Security</td>
              <td>James Scott</td>
              <td>2024-11-15</td>
              <td>1 Day</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>014</td>
              <td>Perimeter Security Tactics</td>
              <td>Jessica Adams</td>
              <td>2024-11-18</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>015</td>
              <td>Anti-Terrorism Awareness</td>
              <td>Mike Johnson</td>
              <td>2024-11-20</td>
              <td>3 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>016</td>
              <td>Explosives Detection Techniques</td>
              <td>Linda Parker</td>
              <td>2024-11-25</td>
              <td>1 Day</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>017</td>
              <td>Physical Intervention Techniques</td>
              <td>Paul Thompson</td>
              <td>2024-11-27</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>018</td>
              <td>Hostage Situation Response</td>
              <td>Anne Baker</td>
              <td>2024-12-02</td>
              <td>3 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>019</td>
              <td>Building Security Systems</td>
              <td>Sarah Turner</td>
              <td>2024-12-05</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>020</td>
              <td>Security Operations Management</td>
              <td>Tom Williams</td>
              <td>2024-12-08</td>
              <td>2 Days</td>
              <td>Upcoming</td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm me-2">View</button>
                  <button class="btn btn-danger btn-sm">Cancel</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

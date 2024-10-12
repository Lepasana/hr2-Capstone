@extends('layouts/layoutMaster')

@section('title', 'Competency Management - Apps')

@section('content')
  <div class="container mt-5">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-competencies table border-top">
          <thead>
            <tr>
              <th>Employee ID</th>
              <th>Employee Name</th>
              <th>Competency</th>
              <th>Skill Level</th>
              <th>Proficiency</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <!-- Expanded Rows -->
            <tr>
              <td>101</td>
              <td>John Doe</td>
              <td>Surveillance</td>
              <td>Advanced</td>
              <td>90%</td>
              <td>Consistently identifies suspicious behavior during patrols.</td>
            </tr>
            <tr>
              <td>102</td>
              <td>Jane Smith</td>
              <td>Access Control</td>
              <td>Intermediate</td>
              <td>75%</td>
              <td>Effective at managing entry points but needs quicker response time.</td>
            </tr>
            <tr>
              <td>103</td>
              <td>Michael Brown</td>
              <td>Emergency Response</td>
              <td>Expert</td>
              <td>95%</td>
              <td>Highly efficient in responding to emergency alarms and threats.</td>
            </tr>
            <tr>
              <td>104</td>
              <td>Susan Lee</td>
              <td>Report Writing</td>
              <td>Advanced</td>
              <td>85%</td>
              <td>Detailed and accurate reports of incidents and patrols.</td>
            </tr>
            <tr>
              <td>105</td>
              <td>Emily Davis</td>
              <td>Conflict Resolution</td>
              <td>Intermediate</td>
              <td>78%</td>
              <td>Needs improvement in de-escalating confrontational situations.</td>
            </tr>
            <tr>
              <td>106</td>
              <td>David Wilson</td>
              <td>Patrolling</td>
              <td>Advanced</td>
              <td>88%</td>
              <td>Thorough and consistent during daily patrols.</td>
            </tr>
            <tr>
              <td>107</td>
              <td>Emma Johnson</td>
              <td>Incident Reporting</td>
              <td>Expert</td>
              <td>92%</td>
              <td>Clear and concise incident reports, praised by supervisors.</td>
            </tr>
            <tr>
              <td>108</td>
              <td>Chris Martinez</td>
              <td>Teamwork</td>
              <td>Advanced</td>
              <td>85%</td>
              <td>Collaborates effectively with other security staff.</td>
            </tr>
            <tr>
              <td>109</td>
              <td>Alice Taylor</td>
              <td>Physical Fitness</td>
              <td>Intermediate</td>
              <td>73%</td>
              <td>Needs improvement in stamina during physical tasks.</td>
            </tr>
            <tr>
              <td>110</td>
              <td>Robert Garcia</td>
              <td>Fire Safety</td>
              <td>Advanced</td>
              <td>89%</td>
              <td>Quick to follow evacuation protocols and handle fire-related incidents.</td>
            </tr>
            <tr>
              <td>111</td>
              <td>Laura Adams</td>
              <td>First Aid</td>
              <td>Expert</td>
              <td>95%</td>
              <td>Excellent first responder skills during medical emergencies.</td>
            </tr>
            <tr>
              <td>112</td>
              <td>Paul Walker</td>
              <td>Surveillance Technology</td>
              <td>Intermediate</td>
              <td>70%</td>
              <td>Requires more training on using modern CCTV systems.</td>
            </tr>
            <tr>
              <td>113</td>
              <td>Angela Reed</td>
              <td>Customer Service</td>
              <td>Advanced</td>
              <td>88%</td>
              <td>Maintains professionalism while dealing with the public.</td>
            </tr>
            <tr>
              <td>114</td>
              <td>Victor Lee</td>
              <td>Risk Assessment</td>
              <td>Expert</td>
              <td>94%</td>
              <td>Thorough in identifying potential security threats.</td>
            </tr>
            <tr>
              <td>115</td>
              <td>Nancy Moore</td>
              <td>Weapons Handling</td>
              <td>Advanced</td>
              <td>87%</td>
              <td>Capable of handling firearms with proper safety measures.</td>
            </tr>
            <tr>
              <td>116</td>
              <td>Tom Harris</td>
              <td>Radio Communication</td>
              <td>Intermediate</td>
              <td>77%</td>
              <td>Needs better clarity in emergency communication.</td>
            </tr>
            <tr>
              <td>117</td>
              <td>Jessica Hall</td>
              <td>Vehicle Patrol</td>
              <td>Advanced</td>
              <td>84%</td>
              <td>Thorough and punctual during vehicle patrols.</td>
            </tr>
            <tr>
              <td>118</td>
              <td>Lucas Perez</td>
              <td>Access Control Systems</td>
              <td>Expert</td>
              <td>93%</td>
              <td>Efficient in managing electronic access control systems.</td>
            </tr>
            <tr>
              <td>119</td>
              <td>Olivia King</td>
              <td>Security Drills</td>
              <td>Advanced</td>
              <td>86%</td>
              <td>Quick to respond and lead security drills.</td>
            </tr>
            <tr>
              <td>120</td>
              <td>Henry White</td>
              <td>Site Safety Inspections</td>
              <td>Expert</td>
              <td>96%</td>
              <td>Regularly conducts thorough site safety checks.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

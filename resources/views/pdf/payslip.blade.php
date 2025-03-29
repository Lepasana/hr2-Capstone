<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .payslips-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 columns */
            gap: 15px;
            max-width: 900px;
            margin: auto;
        }

        .payslip-container {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .company-logo {
            text-align: center;
            margin-bottom: 8px;
        }

        .company-logo img {
            max-width: 80px;
        }

        .details strong {
            display: inline-block;
            width: 120px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        .net-salary {
            font-weight: bold;
            background: #ecf0f1;
        }

        @media print {
            .payslips-container {
                page-break-before: always;
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <div class="payslips-container">
        <div class="payslip-container">
            <div class="company-logo">
                <img src="{{ public_path('images/logo/brand_logo.png') }}" alt="Company Logo">
            </div>
            <div class="header">Payroll Payslip</div>
            <div class="details">
                <strong>Employee:</strong> {{ $payroll->employee->name }}<br>
                <strong>Job Position:</strong> {{ $payroll->employee->jobPosition->title }}<br>
                <strong>Period:</strong> {{ $payroll->from }} - {{ $payroll->to }}
            </div>

            <div class="summary">
                <table>
                    <tr>
                        <th>Description</th>
                        <th>Amount (₱)</th>
                    </tr>
                    <tr>
                        <td>Basic Salary</td>
                        <td>₱{{ number_format($payroll->basic_salary_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Overtime Pay</td>
                        <td>₱{{ number_format($payroll->reg_ot_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>SSS</td>
                        <td>-₱{{ number_format($payroll->sss, 2) }}</td>
                    </tr>
                    <tr>
                        <td>PhilHealth</td>
                        <td>-₱{{ number_format($payroll->philhealth, 2) }}</td>
                    </tr>
                    <tr>
                        <td>PAG-IBIG</td>
                        <td>-₱{{ number_format($payroll->pag_ibig, 2) }}</td>
                    </tr>
                    <tr class="net-salary">
                        <td><strong>Net Salary</strong></td>
                        <td><strong>₱{{ number_format($payroll->total_earnings, 2) }}</strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

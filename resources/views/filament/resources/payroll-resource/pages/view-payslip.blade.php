<x-filament-panels::page>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        {{-- Header --}}
        <div class="border-b pb-4 mb-4">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Payroll Payslip</h2>
            <p class="text-sm text-gray-500 text-center">Issued on: {{ now()->format('F d, Y') }}</p>
        </div>

        {{-- Employee Information --}}
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Employee Details</h3>
            <div class="grid grid-cols-2 gap-4 mt-2 text-gray-600">
                <p><strong>Name:</strong> {{ $payroll->employee->name }}</p>
                <p><strong>Job Position:</strong> {{ $payroll->employee->jobPosition->title }}</p>
                <p><strong>Payroll Period:</strong> {{ $payroll->from }} - {{ $payroll->to }}</p>
            </div>
        </div>

        {{-- Salary Summary --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Salary Breakdown</h3>
            <table class="w-full mt-3 border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left p-2 text-gray-600">Description</th>
                        <th class="text-right p-2 text-gray-600">Amount (₱)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2">Basic Salary</td>
                        <td class="p-2 text-right">₱{{ number_format($payroll->basic_salary_amount, 2) }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">Overtime Pay</td>
                        <td class="p-2 text-right">₱{{ number_format($payroll->reg_ot_amount, 2) }}</td>
                    </tr>
                    <tr class="border-b bg-gray-50">
                        <td class="p-2 font-semibold text-gray-700">Deductions</td>
                        <td class="p-2"></td>
                    </tr>
                    <tr>
                        <td class="p-2">SSS</td>
                        <td class="p-2 text-right">-₱{{ number_format($payroll->sss, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="p-2">PhilHealth</td>
                        <td class="p-2 text-right">-₱{{ number_format($payroll->philhealth, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="p-2">PAG-IBIG</td>
                        <td class="p-2 text-right">-₱{{ number_format($payroll->pag_ibig, 2) }}</td>
                    </tr>
                    <tr class="border-t bg-gray-100 font-bold">
                        <td class="p-2">Net Salary</td>
                        <td class="p-2 text-right text-green-600">₱{{ number_format($payroll->total_earnings, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="mt-6 text-center text-sm text-gray-500 border-t pt-4">
            <p>For any payroll inquiries, contact HR at hr@example.com</p>
        </div>
    </div>
</x-filament-panels::page>

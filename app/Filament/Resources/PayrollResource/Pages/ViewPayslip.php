<?php

namespace App\Filament\Resources\PayrollResource\Pages;

use App\Models\Payroll;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\PayrollResource;

class ViewPayslip extends Page
{
    protected static string $resource = PayrollResource::class;

    protected static string $view = 'filament.resources.payroll-resource.pages.view-payslip';

    public Payroll $payroll;

    public function mount($record)
    {
        $this->payroll = Payroll::findOrFail($record);
    }

    protected function getViewData(): array
    {
        return [
            'payroll' => $this->payroll,
        ];
    }
}

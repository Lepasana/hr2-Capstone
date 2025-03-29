<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'code',
        'from',
        'to',
        'basic_salary_hours',
        'basic_salary_amount',
        'reg_ot_hours',
        'reg_ot_amount',
        'rd_ot_hours',
        'rd_ot_amount',
        'pag_ibig',
        'sss',
        'philhealth',
        'total_deductions',
        'total_earnings',
        'status',
        'response',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}

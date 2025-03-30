<?php
namespace App\Http\Controllers;

use App\Enums\TrainingStatusEnum;
use App\Http\Requests\TrainingManagementRequest;
use App\Models\Duration;
use App\Models\Employee;
use App\Models\TrainingManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingManagementController extends Controller
{

    protected TrainingManagement $trainingManagement;

    public function __construct(TrainingManagement $trainingManagement)
    {
        $this->trainingManagement = $trainingManagement;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trainingStatusEnums = TrainingStatusEnum::toOptions();
        $trainings           = TrainingManagement::query()
            ->where(function ($query) {
                $query->where('status', TrainingStatusEnum::UPCOMING->value)
                    ->orWhere('status', TrainingStatusEnum::ONGOING->value)
                    ->orWhere(function ($query) {
                        $query->where('status', TrainingStatusEnum::COMPLETED->value)
                            ->whereMonth('date_completed', Carbon::now()->month)
                            ->whereYear('date_completed', Carbon::now()->year);
                    });
            })
            ->when($request->date_report, function ($query) use ($request) {
                $date_report = $request->input('date_report');

                if ($date_report == 'last_month') {
                    $from = now()->subMonth()->startOfMonth();
                } elseif ($date_report == 'last_two_months') {
                    $from = now()->subMonths(2)->startOfMonth();
                } elseif ($date_report == 'last_three_months') {
                    $from = now()->subMonths(3)->startOfMonth();
                } else {
                    $from = null;
                }

                if ($from) {
                    $query->whereDate('date_completed', '>=', $from);
                }
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('content.apps.partials.training-table', compact('trainings', 'trainingStatusEnums'))->render(),
            ]);
        } else {
            return view('content.apps.training-management-index', compact('trainings', 'trainingStatusEnums'));
        }

    }

    public function trainingHistory(Request $request)
    {
        $trainingStatusEnums = TrainingStatusEnum::toOptions();
        $trainings           = TrainingManagement::query()
            ->where('status', TrainingStatusEnum::COMPLETED->value)
            ->when($request->from, function ($query) use ($request) {
                $from = $request->input('from');
                $to   = $request->input('to');

                if ($from && $to) {
                    $query->whereDate('date_completed', '>=', $from)
                        ->whereDate('date_completed', '<=', $to);
                } elseif ($from && ! $to) {
                    $query->whereDate('date_completed', '>=', $from);
                } elseif ($to && ! $from) {
                    $query->whereDate('date_completed', '<=', $to);
                }
            })
            ->get();

        // Handle AJAX Request: Return only table rows
        if ($request->ajax()) {
            return response()->json([
                'html' => view('content.apps.partials.training-history-table', compact('trainings', 'trainingStatusEnums'))->render(),
            ]);
        } else {
            return view('content.apps.training-management-training-history', compact('trainings', 'trainingStatusEnums'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::query()->select(['id', 'name'])->get();
        $durations = Duration::query()->select(['id', 'title'])->get();
        $status    = TrainingStatusEnum::UPCOMING->value;

        return view('content.apps.training-management-create', [
            'employees' => $employees,
            'durations' => $durations,
            'status'    => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingManagementRequest $request)
    {
        $trainingManagement                = $this->trainingManagement;
        $trainingManagement->training_name = $request->training_name;
        $trainingManagement->employee_id   = $request->employee;
        $trainingManagement->training_date = $request->training_date;
        $trainingManagement->duration_id   = $request->duration;
        $trainingManagement->status        = TrainingStatusEnum::UPCOMING->value;
        $trainingManagement->save();

        if (! $trainingManagement) {
            return redirect()
                ->route('training-management')
                ->with('error', 'There was an error adding training.');
        }

        return redirect()
            ->route('training-management')
            ->with('success', 'Training added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employee::query()->select(['id', 'name'])->get();
        $durations = Duration::query()->select(['id', 'title'])->get();
        $status    = TrainingStatusEnum::toOptions();
        $training  = TrainingManagement::findOrFail($id);

        return view('content.apps.training-management-edit', [
            'employees' => $employees,
            'durations' => $durations,
            'status'    => $status,
            'training'  => $training,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingManagementRequest $request, string $id)
    {
        $trainingManagement                = $this->trainingManagement->findOrFail($id);
        $trainingManagement->training_name = $request->training_name;
        $trainingManagement->employee_id   = $request->employee;
        $trainingManagement->training_date = $request->training_date;
        $trainingManagement->duration_id   = $request->duration;
        $trainingManagement->status        = $request->status;
        $trainingManagement->save();

        if (! $trainingManagement) {
            return redirect()
                ->route('training-management')
                ->with('error', 'There was an error updating training.');
        }

        return redirect()
            ->route('training-management')
            ->with('success', 'Training updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $training = $this->trainingManagement->find($id);
        $training->delete();

        return redirect()->back()->with('success', 'Training deleted successfully.');
    }
}

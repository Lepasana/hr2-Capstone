<?php
namespace App\Http\Controllers;

use App\Enums\CompensationManagement\DepartmentEnum;
use App\Enums\SuccessionPlanning\CurrentPositionEnum;
use App\Enums\SuccessionPlanning\StatusEnum;
use App\Http\Requests\SuccessionPlanningRequest;
use App\Models\Employee;
use App\Models\SuccessionPlanning;

class SuccessionPlanningController extends Controller
{

    protected SuccessionPlanning $successionPlanning;

    public function __construct(SuccessionPlanning $successionPlanning)
    {
        $this->successionPlanning = $successionPlanning;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $successors = SuccessionPlanning::get();

        return view('content.apps.succession-planning-index', [
            'successors' => $successors,
        ]);
    }

    public function status()
    {
        $successors = SuccessionPlanning::query()->whereNotNull('status')->get();

        return view('content.apps.succession-planning-status', [
            'successors' => $successors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees        = Employee::query()->select(['id', 'name'])->get();
        $currentPositions = CurrentPositionEnum::toOptions();
        $departmentEnums  = DepartmentEnum::toOptions();
        $statusEnums      = StatusEnum::toOptions();

        return view('content.apps.succession-planning-create', [
            'employees'        => $employees,
            'currentPositions' => $currentPositions,
            'departmentEnums'  => $departmentEnums,
            'statusEnums'      => $statusEnums,
        ]);
    }

    public function createWithStatus()
    {
        $employees        = Employee::query()->select(['id', 'name'])->get();
        $currentPositions = CurrentPositionEnum::toOptions();
        $departmentEnums  = DepartmentEnum::toOptions();
        $statusEnums      = StatusEnum::toOptions();

        return view('content.apps.succession-planning-status-create', [
            'employees'        => $employees,
            'currentPositions' => $currentPositions,
            'departmentEnums'  => $departmentEnums,
            'statusEnums'      => $statusEnums,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuccessionPlanningRequest $request)
    {
        $successor                      = $this->successionPlanning;
        $successor->employee_id         = $request->employee;
        $successor->current_position    = $request->current_position;
        $successor->potential_successor = $request->potential_successor;
        $successor->development_needs   = 'n/a';
        $successor->readiness_level     = 'n/a';
        $successor->department          = $request->department;
        $successor->status              = $request->status;
        $successor->save();

        if (! $successor) {
            return redirect()
                ->back()
                ->with('error', 'There was an error adding successor.');
        }

        return redirect()
            ->back()
            ->with('success', 'Successor added successfully.');
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
        $employees        = Employee::query()->select(['id', 'name'])->get();
        $successor        = SuccessionPlanning::findOrFail($id);
        $currentPositions = CurrentPositionEnum::toOptions();
        $departmentEnums  = DepartmentEnum::toOptions();
        $statusEnums      = StatusEnum::toOptions();

        return view('content.apps.succession-planning-edit', [
            'employees'        => $employees,
            'successor'        => $successor,
            'currentPositions' => $currentPositions,
            'departmentEnums'  => $departmentEnums,
            'statusEnums'      => $statusEnums,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuccessionPlanningRequest $request, string $id)
    {
        $successor                   = $this->successionPlanning->find($id);
        $successor->employee_id      = $request->employee;
        $successor->current_position = $request->current_position;
        $successor->department       = $request->department;
        $successor->status           = $request->status;
        $successor->save();

        if (! $successor) {
            return redirect()
                ->back()
                ->with('error', 'There was an error updating successor.');
        }

        return redirect()
            ->back()
            ->with('success', 'Successor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $successor = $this->successionPlanning->find($id);
        $successor->delete();

        return redirect()->back()->with('success', 'Successor deleted successfully.');
    }
}

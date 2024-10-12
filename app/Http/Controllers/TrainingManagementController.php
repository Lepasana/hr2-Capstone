<?php

namespace App\Http\Controllers;

use App\Enums\TrainingStatusEnum;
use App\Http\Requests\TrainingManagementRequest;
use App\Models\Duration;
use App\Models\Employee;
use App\Models\TrainingManagement;
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
  public function index()
  {
    $trainings = TrainingManagement::get();

    return view('content.apps.training-management-index', [
      'trainings' => $trainings
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $employees = Employee::query()->select(['id', 'name'])->get();
    $durations = Duration::query()->select(['id', 'title'])->get();
    $status = TrainingStatusEnum::toOptions();

    return view('content.apps.training-management-create', [
      'employees' => $employees,
      'durations' => $durations,
      'status' => $status,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TrainingManagementRequest $request)
  {
    $trainingManagement = $this->trainingManagement;
    $trainingManagement->training_name = $request->training_name;
    $trainingManagement->employee_id = $request->employee;
    $trainingManagement->training_date = $request->training_date;
    $trainingManagement->duration_id = $request->duration;
    $trainingManagement->status = $request->status;
    $trainingManagement->save();

    if (!$trainingManagement) {
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
    $status = TrainingStatusEnum::toOptions();
    $training = TrainingManagement::findOrFail($id);

    return view('content.apps.training-management-edit', [
      'employees' => $employees,
      'durations' => $durations,
      'status' => $status,
      'training' => $training
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $trainingManagement = $this->trainingManagement->findOrFail($id);
    $trainingManagement->training_name = $request->training_name;
    $trainingManagement->employee_id = $request->employee;
    $trainingManagement->training_date = $request->training_date;
    $trainingManagement->duration_id = $request->duration;
    $trainingManagement->status = $request->status;
    $trainingManagement->save();

    if (!$trainingManagement) {
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

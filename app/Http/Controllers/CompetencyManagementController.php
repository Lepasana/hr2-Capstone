<?php

namespace App\Http\Controllers;

use App\Enums\SkillLevelEnum;
use App\Http\Requests\CompetencyManagementRequest;
use App\Models\CompetencyManagement;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompetencyManagementController extends Controller
{

  protected CompetencyManagement $competencyManagement;

  public function __construct(CompetencyManagement $competencyManagement)
  {
    $this->competencyManagement = $competencyManagement;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $competencies = CompetencyManagement::get();
    $employees = Employee::query()->select(['id', 'name'])->get();
    $skill_levels = SkillLevelEnum::toOptions();

    return view('content.apps.competency-management-index', [
      'competencies' => $competencies,
      'employees' => $employees,
      'skill_levels' => $skill_levels,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $skill_levels = SkillLevelEnum::toOptions();
    $employees = Employee::query()->select(['id', 'name'])->get();

    return view('content.apps.competency-management-create', [
      'skill_levels' => $skill_levels,
      'employees' => $employees,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CompetencyManagementRequest $request)
  {
    $competencyManagement = $this->competencyManagement;
    $competencyManagement->employee_id = $request->employee;
    $competencyManagement->competency = $request->competency;
    $competencyManagement->skill_level = $request->skill_level;
    $competencyManagement->proficiency = $request->proficiency;
    $competencyManagement->notes = $request->notes;
    $competencyManagement->save();

    if (!$competencyManagement) {
      return redirect()
        ->route('competency-management')
        ->with('error', 'There was an error adding competency.');
    }

    return redirect()
      ->route('competency-management')
      ->with('success', 'Competency added successfully.');
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
    $competency = $this->competencyManagement->find($id);
    $skill_levels = SkillLevelEnum::toOptions();
    $employees = Employee::query()->select(['id', 'name'])->get();

    return view('content.apps.competency-management-edit', [
      'competency' => $competency,
      'skill_levels' => $skill_levels,
      'employees' => $employees,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CompetencyManagementRequest $request, string $id)
  {
    $competencyManagement = $this->competencyManagement->find($id);
    $competencyManagement->employee_id = $request->employee;
    $competencyManagement->competency = $request->competency;
    $competencyManagement->skill_level = $request->skill_level;
    $competencyManagement->proficiency = $request->proficiency;
    $competencyManagement->notes = $request->notes;
    $competencyManagement->save();

    if (!$competencyManagement) {
      return redirect()
        ->route('competency-management')
        ->with('error', 'There was an error updating competency.');
    }

    return redirect()
      ->route('competency-management')
      ->with('success', 'Competency updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $competencyManagement = $this->competencyManagement->find($id);
    $competencyManagement->delete();

    return redirect()->back()->with('success', 'Competency deleted successfully.');
  }
}

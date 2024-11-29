<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JobQualificationService;
use App\Http\Requests\JobQualificationRequest;

class JobQualificationController extends Controller
{

  protected JobQualificationService $jobQualificationService;

  public function __construct(JobQualificationService $jobQualificationService)
  {
    $this->jobQualificationService = $jobQualificationService;
  }

  public function index()
  {
    $qualifications = $this->jobQualificationService->jobQualification->get();

    return view('content.apps.job-qualification-index', [
      'qualifications' => $qualifications
    ]);
  }

  public function create()
  {
    return view('content.apps.job-qualification-create', []);
  }

  public function store(JobQualificationRequest $request)
  {
    $response = $this->jobQualificationService->store($request);
    if ($response['success'] === false) {
      return redirect()
        ->route('job-qualification')
        ->with('error', 'There was an error adding job qualification.');
    }

    return redirect()
      ->route('job-qualification')
      ->with('success', 'Job Qualification added successfully.');
  }

  public function edit($id)
  {
    $qualification = $this->jobQualificationService->jobQualification->find($id);

    return view('content.apps.job-qualification-edit', [
      'qualification' => $qualification
    ]);
  }

  public function update(JobQualificationRequest $request, $id)
  {
    $response = $this->jobQualificationService->update($request, $id);
    if ($response['success'] === false) {
      return redirect()
        ->route('job-qualification')
        ->with('error', 'There was an error updating job qualification.');
    }

    return redirect()
      ->route('job-qualification')
      ->with('success', 'Job Qualification updated successfully.');
  }

  public function delete($id)
  {
    $qualification = $this->jobQualificationService->jobQualification->findOrFail($id);
    $qualification->delete();

    return redirect()->back()->with('success', 'Job Qualification Successfully Deleted');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExaminationService;

class LearningManagementController extends Controller
{
  public ExaminationService $examinationService;
  public function __construct(ExaminationService $examinationService)
  {
    $this->examinationService = $examinationService;
  }

  public function index()
  {
    $exams = $this->examinationService->examination->get();

    return view('content.apps.learning-management-index', [
      'exams' => $exams
    ]);
  }

  public function create()
  {
    return view('content.apps.learning-management-create');
  }

  public function store(Request $request)
  {
    $response = $this->examinationService->storeExamination($request);

    if ($response['success'] === false) {
      return redirect()
        ->route('learning-management')
        ->with('error', 'There was an error adding examination.');
    }

    return redirect()
      ->route('learning-management')
      ->with('success', 'Examination added successfully.');
  }

  public function show(string $id)
  {
    $exam = $this->examinationService->examination->find($id);
    $questions = $exam->questions;

    return view('content.apps.learning-management-show', [
      'exam' => $exam,
      'questions' => $questions
    ]);
  }

  public function edit(string $id)
  {
    $exam = $this->examinationService->examination->find($id);

    return view('content.apps.learning-management-edit', [
      'exam' => $exam
    ]);
  }

  public function update(Request $request, string $id)
  {
    $response = $this->examinationService->updateExamination($request, $id);

    if ($response['success'] === false) {
      return redirect()
        ->route('learning-management')
        ->with('error', $response['message']);
    }

    return redirect()
      ->route('learning-management')
      ->with('success', $response['message']);
  }

  public function destroy(string $id)
  {
    $exam = $this->examinationService->examination->find($id);
    $exam->delete();

    return redirect()->back()->with('success', 'Exam Successfully Deleted');
  }
}

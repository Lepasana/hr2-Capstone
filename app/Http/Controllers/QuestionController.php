<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExaminationService;

class QuestionController extends Controller
{
  protected ExaminationService $examService;

  public function __construct(ExaminationService $examService)
  {
    $this->examService = $examService;
  }

  public function create(string $examId)
  {
    return view('content.apps.question-create', [
      'examId' => $examId
    ]);
  }

  public function store(Request $request, string $examId)
  {
    $response = $this->examService->storeQuestion($request, $examId);

    if ($response['success'] === false) {
      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    return redirect()
      ->back()
      ->with('success', $response['message']);
  }

  public function show(string $examId, string $questionId)
  {
    $question = $this->examService->question->find($questionId);

    return view('content.apps.question-show', [
      'question' => $question,
      'examId' => $examId
    ]);
  }

  public function edit(string $examId, string $questionId)
  {
    $question = $this->examService->question->find($questionId);

    return view('content.apps.question-edit', [
      'question' => $question,
      'examId' => $examId
    ]);
  }

  public function update(Request $request, string $examId, string $questionId)
  {
    $response = $this->examService->updateQuestion($request, $questionId);

    if ($response['success'] === false) {
      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    return redirect()
      ->back()
      ->with('success', $response['message']);
  }

  public function destroy(string $id)
  {
    $question = $this->examService->question->find($id);
    $question->delete();

    return redirect()->back()->with('success', 'Question Deleted Successfully.');
  }
}

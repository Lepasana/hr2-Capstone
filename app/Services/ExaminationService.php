<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\Question;

class ExaminationService
{
  public Examination $examination;
  public Question $question;


  public function __construct(
    Examination $examination,
    Question $question
  ) {
    $this->examination = $examination;
    $this->question = $question;
  }

  public function storeExamination(Request $request)
  {
    $examination = $this->examination;
    $examination->user_id = auth()->user()->id;
    $examination->title = $request->title;
    $examination->save();

    if (!$examination) {
      return [
        "success" => false,
        "message" => 'Error saving examination'
      ];
    }

    return [
      "success" => true,
      "errors" => []
    ];
  }

  public function updateExamination(Request $request, string $id)
  {
    $examination = $this->examination->find($id);
    $examination->user_id = auth()->user()->id;
    $examination->title = $request->title;
    $examination->save();

    if (!$examination) {
      return [
        "success" => false,
        "message" => 'Error updating examination'
      ];
    }

    return [
      "success" => true,
      "message" => 'Examination updated successfully.',
    ];
  }

  public function storeQuestion(Request $request, string $examId)
  {
    $question = $this->question;
    $question->examination_id = $examId;
    $question->user_id = auth()->user()->id;
    $question->questions = $request->questions;
    $question->options = array_combine($request->key, $request->value);
    $question->correct_answer = $request->correct_answer;
    $question->save();

    if (!$question) {
      return [
        "success" => false,
        "message" => 'Error Adding Question'
      ];
    }

    return [
      "success" => true,
      "message" => 'Question Added successfully.',
    ];
  }

  public function updateQuestion(Request $request, string $questionId)
  {
    $question = $this->question->find($questionId);
    $question->questions = $request->questions;
    $question->options = array_combine($request->key, $request->value);
    $question->correct_answer = $request->correct_answer;
    $question->save();

    if (!$question) {
      return [
        "success" => false,
        "message" => 'Error Updating Question'
      ];
    }

    return [
      "success" => true,
      "message" => 'Question Updated successfully.',
    ];
  }

}


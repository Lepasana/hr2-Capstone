<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Models\JobQualification;

class JobQualificationService
{
  public JobQualification $jobQualification;


  public function __construct(
    JobQualification $jobQualification,
  ) {
    $this->jobQualification = $jobQualification;
  }

  public function store(Request $request)
  {
    $jobQualification = $this->jobQualification;
    $jobQualification->content = $request->content;
    $jobQualification->save();

    if (!$jobQualification) {
      return [
        "success" => false,
        "message" => 'Error in adding Job Qualification'
      ];
    }

    return [
      "success" => true,
      "message" => 'Job Qualification added successfully.',
    ];
  }

  public function update(Request $request, $id)
  {
    $jobQualification = $this->jobQualification->find($id);
    $jobQualification->content = $request->content;
    $jobQualification->save();

    if (!$jobQualification) {
      return [
        "success" => false,
        "message" => 'Error in updating Job Qualification'
      ];
    }

    return [
      "success" => true,
      "message" => 'Job Qualification updated successfully.',
    ];
  }
}


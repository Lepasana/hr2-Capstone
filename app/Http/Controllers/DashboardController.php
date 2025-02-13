<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use Illuminate\Http\Request;
use App\Models\SuccessionPlanning;
use App\Models\TrainingManagement;
use App\Models\CompetencyManagement;

class DashboardController extends Controller
{
  public function index()
  {
    $competencyCount = CompetencyManagement::get()->count();
    $trainingCount = TrainingManagement::get()->count();
    $jobRequestCount = JobRequest::get()->count();
    $successorCount = SuccessionPlanning::get()->count();

    return view("content.apps.dashboard", compact("competencyCount", "trainingCount", "jobRequestCount", "successorCount"));
  }
}

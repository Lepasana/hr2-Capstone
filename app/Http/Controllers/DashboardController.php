<?php
namespace App\Http\Controllers;

use App\Models\CompetencyManagement;
use App\Models\JobRequest;
use App\Models\SuccessionPlanning;
use App\Models\TrainingManagement;
use App\Services\DashboardService;

class DashboardController extends Controller
{

    public DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {

        $competencyCount = CompetencyManagement::get()->count();
        $trainingCount   = TrainingManagement::get()->count();
        $jobRequestCount = JobRequest::get()->count();
        $successorCount  = SuccessionPlanning::get()->count();
        $jobRequestChart = $this->dashboardService->getJobRequestDataChart();
        $trainingChart   = $this->dashboardService->getTrainingDataChart();

        return view("content.apps.dashboard", [
            "competencyCount" => $competencyCount,
            "trainingCount"   => $trainingCount,
            "jobRequestCount" => $jobRequestCount,
            "successorCount"  => $successorCount,
            "jobRequestChart" => $jobRequestChart,
            "trainingChart"   => $trainingChart,
        ]);
    }
}

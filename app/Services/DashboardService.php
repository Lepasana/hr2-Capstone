<?php
namespace App\Services;

use App\Charts\DashboardChart;
use App\Models\Dashboard;
use App\Models\JobRequest;
use App\Models\TrainingManagement;

class DashboardService
{

    public Dashboard $model;

    public function __construct(Dashboard $model)
    {
        $this->model = $model;
    }

    public function getJobRequestDataChart()
    {
        $jobRequests = JobRequest::get();

        // Prepare dataset and labels
        $labels = [];
        $data   = [];

        $monthlyData = $jobRequests->groupBy(function ($jobRequest) {
            // Format the created_at date to get the year and month (e.g., "2025-02")
            return $jobRequest->created_at->format('Y-m');
        });
        $monthlyData = $monthlyData->sortKeys();  // Sort the keys (months) in ascending order

        // Loop through jobRequests and extract the necessary data
        foreach ($monthlyData as $month => $items) {
            $labels[] = \Carbon\Carbon::parse($month)->format('F Y'); // Convert month to readable format (e.g., "February 2025")
            $data[]   = $items->count();                              // Count the number of jobRequests for that month
        }

        $jobRequestChart = $this->generateChart($labels, $data, 'Job Requests');

        return $jobRequestChart;
    }

    public function getTrainingDataChart()
    {
        $trainings = TrainingManagement::get();

        // Prepare dataset and labels
        $labels = [];
        $data   = [];

        $monthlyData = $trainings->groupBy(function ($training) {
            // Format the created_at date to get the year and month (e.g., "2025-02")
            return $training->created_at->format('Y-m');
        });
        $monthlyData = $monthlyData->sortKeys();  // Sort the keys (months) in ascending order

        // Loop through trainings and extract the necessary data
        foreach ($monthlyData as $month => $items) {
            $labels[] = \Carbon\Carbon::parse($month)->format('F Y'); // Convert month to readable format (e.g., "February 2025")
            $data[]   = $items->count();                              // Count the number of trainings for that month
        }

        $trainingChart = $this->generateChart($labels, $data, 'Trainings');

        return $trainingChart;
    }

    public function generateChart($label, array $dataset, $title)
    {
        $chart = new DashboardChart;
        $chart->labels($label);
        $chart->dataset($title, 'line', $dataset)
            ->color('rgb(61, 105, 166)')
            ->backgroundColor('rgb(43, 117, 192)');
        $chart->displayLegend(false);
        $chart->title($title);
        $chart->options([
            'title'               => [
                'fontColor' => 'black',
            ],
            'responsive'          => true,
            'maintainAspectRatio' => false,
            'devicePixelRatio'    => 5,
            'scales'              => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'beginAtZero' => true,
                            'max'         => 100,
                            'stepSize'    => 10, // Set the interval between ticks to 50
                            'fontColor'   => 'black',
                        ],
                    ],
                ],
                'xAxes' => [
                    [
                        'barThickness' => 60,
                        'gridLines'    => [
                            'display' => false, // Hide vertical grid lines
                        ],
                        'ticks'        => [
                            'fontColor' => 'black', // Set x-axis ticks font color to black
                        ],
                    ],
                ],
            ],
        ]);

        return $chart;
    }
}

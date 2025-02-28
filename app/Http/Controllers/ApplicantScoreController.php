<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantScore;

class ApplicantScoreController extends Controller
{
    protected ApplicantScore $applicantScore;

    public function __construct(ApplicantScore $applicantScore)
    {
        $this->applicantScore = $applicantScore;
    }

    public function index()
    {
        $applicantScores = $this->applicantScore->query()->get();

        return view('content.apps.applicant-score-index', [
            'applicantScores' => $applicantScores
        ]);
    }

    public function destroy($id)
    {
        $applicantScore = $this->applicantScore->findOrFail($id);

        $applicantScore->delete();

        return redirect()->back()->with('success', 'Applicant score deleted successfully.');

    }
}

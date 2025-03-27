<?php
namespace App\Http\Controllers;

use App\Enums\LearningManagement\ScoreStatus;
use App\Models\ApplicantScore;
use Illuminate\Http\Request;

class ApplicantScoreController extends Controller
{
    protected ApplicantScore $applicantScore;

    public function __construct(ApplicantScore $applicantScore)
    {
        $this->applicantScore = $applicantScore;
    }

    public function index(Request $request)
    {
        $scoreStatusEnums = ScoreStatus::toOptions();
        $applicantScores  = $this->applicantScore->query()
            ->when($request->from, function ($query) use ($request) {
                $from = $request->input('from');
                $to   = $request->input('to');

                if ($from && $to) {
                    $query->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to);
                } elseif ($from && ! $to) {
                    $query->whereDate('created_at', '>=', $from);
                } elseif ($to && ! $from) {
                    $query->whereDate('created_at', '<=', $to);
                }
            })
            ->when($request->status, function ($query) use ($request) {
                $status = $request->input('status');

                if ($status) {
                    $query->where('status', $status);
                }
            })
            ->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('content.apps.partials.applicant-score-table', compact('applicantScores', 'scoreStatusEnums'))->render(),
            ]);
        } else {
            return view('content.apps.applicant-score-index', compact('applicantScores', 'scoreStatusEnums'));
        }
    }

    public function destroy($id)
    {
        $applicantScore = $this->applicantScore->findOrFail($id);

        $applicantScore->delete();

        return redirect()->back()->with('success', 'Applicant score deleted successfully.');

    }

    public function bulkDelete(Request $request)
    {
        $this->applicantScore
            ->whereIn('id', $request->applicant_ids)
            ->delete();

        return response()->json(['success' => true]);
    }
}

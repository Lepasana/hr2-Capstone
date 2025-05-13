<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\RequestStatusEnum;
use App\Models\SuccessionPlanning;
use Illuminate\Http\RedirectResponse;
use App\Models\SuccessionPlanningRequest;
use App\Enums\SuccessionPlanning\StatusEnum;
use App\Notifications\SuccessionPlanningRequestNotification;

class SuccessionPlanningRequestController extends Controller
{
    public function __construct(protected SuccessionPlanningRequest $successionPlanningRequest, protected SuccessionPlanning $successionPlanning)
    {
        $this->successionPlanningRequest = $successionPlanningRequest;
        $this->successionPlanning        = $successionPlanning;
    }

    public function index()
    {
        $successionRequests = $this->successionPlanningRequest->query()
            ->with(['user', 'jobPosition'])
            ->get();

        return view('content.apps.succession-planning-request-index', [
            'requests' => $successionRequests,
        ]);
    }

    public function approveRequest(string $id): RedirectResponse
    {
        $successionRequest = $this->successionPlanningRequest->find($id);

        if (!$successionRequest) {
            return redirect()->back()->with('error', 'Succession Planning Request not found.');
        }

        $successionRequest->status = RequestStatusEnum::APPROVED->value;
        $successionRequest->save();

        $successions = $this->successionPlanning->query()
            ->where('status', StatusEnum::READY_NOW->value)
            ->where('request_status', RequestStatusEnum::REQUESTED->value)
            ->where('promoted_to', $successionRequest->jobPosition->title)
            ->get();

        foreach ($successions as $succession) {
            $succession->update([
                'request_status' => RequestStatusEnum::APPROVED->value,
            ]);
        }

        // Notify the user
        $title = 'Succession Planning Request Approved';
        $message = 'Your Succession Planning Request has been approved.';
        $submittedBy = auth()->user()->name ?? 'Unknown';
        $successionRequest->user->notify(new SuccessionPlanningRequestNotification($successionRequest, $title, $message, $submittedBy));

        return redirect()->back()->with('success', 'Succession Planning Request approved successfully.');
    }

    public function rejectRequest(string $id)
    {
        $successionRequest = $this->successionPlanningRequest->find($id);

        if (!$successionRequest) {
            return redirect()->back()->with('error', 'Succession Planning Request not found.');
        }

        $successionRequest->status = RequestStatusEnum::REJECTED->value;
        $successionRequest->save();

        $successions = $this->successionPlanning->query()
            ->where('status', StatusEnum::READY_NOW->value)
            ->where('request_status', RequestStatusEnum::REQUESTED->value)
            ->get();

        foreach ($successions as $succession) {
            $succession->update([
                'request_status' => RequestStatusEnum::REJECTED->value,
            ]);
        }

        // Notify the user
        $title = 'Succession Planning Request Rejected';
        $message = 'Your Succession Planning Request has been rejected. Please contact HR2 Admin for more details.';
        $submittedBy = auth()->user()->name ?? 'Unknown';
        $successionRequest->user->notify(new SuccessionPlanningRequestNotification($successionRequest, $title, $message, $submittedBy));

        return redirect()->back()->with('success', 'Succession Planning Request rejected successfully.');
    }

}

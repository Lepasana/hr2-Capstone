<?php

namespace App\Observers;

use App\Models\TrainingManagement;

class TrainingObserver
{
    /**
     * Handle the TrainingManagement "created" event.
     */
    public function created(TrainingManagement $trainingManagement): void
    {
        //
    }

    /**
     * Handle the TrainingManagement "updated" event.
     */
    public function updated(TrainingManagement $trainingManagement): void
    {
        //
    }

    /**
     * Handle the TrainingManagement "deleted" event.
     */
    public function deleted(TrainingManagement $trainingManagement): void
    {
        //
    }

    /**
     * Handle the TrainingManagement "restored" event.
     */
    public function restored(TrainingManagement $trainingManagement): void
    {
        //
    }

    /**
     * Handle the TrainingManagement "force deleted" event.
     */
    public function forceDeleted(TrainingManagement $trainingManagement): void
    {
        //
    }
}

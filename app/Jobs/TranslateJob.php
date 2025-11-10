<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Job $jobDesc)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('hello from class worker. Job: ' . $this->jobDesc->title);
    }
}

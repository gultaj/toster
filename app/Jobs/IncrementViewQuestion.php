<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Question;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementViewQuestion extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $questionRepo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        $this->questionRepo = new \App\Repositories\QuestionRepository($question);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->questionRepo->incrementView();
    }
}

<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\Answer;
use App\Models\User;

class RemoveLikeFromAnswer extends Job implements SelfHandling
{

    protected $answer;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Answer $answer, User $user)
    {
        $this->answer = $answer;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->answer->likes()->detach($this->user->id);
    }
}

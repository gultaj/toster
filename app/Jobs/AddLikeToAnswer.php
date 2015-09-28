<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\AnswerRepository;
use App\Models\Answer;
use App\Models\User;

class AddLikeToAnswer extends Job implements SelfHandling
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
        $this->answer->likes()->attach($this->user->id);
    }
}

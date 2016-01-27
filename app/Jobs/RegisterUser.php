<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\User;

class RegisterUser extends Job implements SelfHandling
{
    private $user_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $user_data)
    {
        $this->user_data = $user_data;
        $this->user_data['avatar'] = '';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::create($this->user_data);
    }
}

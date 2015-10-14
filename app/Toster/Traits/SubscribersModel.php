<?php namespace App\Toster\Traits;

use App\Models\User;

trait SubscribersModel
{
	public function subscribers()
    {
        return $this->morphToMany(User::class, 'subscribe');
    }

    public function hasSubscriber(User $user)
    {
        if (! $this->relationLoaded('subscribers'))
            $this->load('subscribers');

        $relation = $this->getRelation('subscribers');

        return $relation->contains($user);
    }

    public function subscribersCount()
    {
        return $this->subscribers()
            ->selectRaw('subscribe_id, count(*) as count')
            ->groupBy('subscribe_id');
    }

    public function getSubscribersCountAttribute()
    {
        if (! $this->relationLoaded('subscribersCount'))
            $this->load('subscribersCount');

        $relation = $this->getRelation('subscribersCount')->first();
        
        return $relation ? (int) $relation->count : 0;
    }

    public function getSubscribersCountHumansAttribute()
    {
        $count = (int) ($this->relationLoaded('subscribersCount') ? $this->subscribersCount : $this->subscribers->count());

        return $count .' '. \Lang::choice('count.subscribers', ru_count($count));
    }
}
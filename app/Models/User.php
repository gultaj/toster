<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword, Notifiable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $casts = [
        'is_admin' => 'boolean',
    ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nickname',' first_name', 'last_name', 'about', 'about_long', 'avatar', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', '_token'];

	public function questions()
	{
		return $this->hasMany('App\Models\Question');
	}

	public function answers()
	{
		return $this->hasMany('App\Models\Answer');
	}

	public function liked()
	{
		return $this->belongsToMany('App\Models\Answer', 'answer_likes');   
	}

	public function comments()
	{
		return $this->hasMany('App\Models\Comment');
	}

	public function subscribedTags()
	{
		return $this->morphedByMany('App\Models\Tag', 'subscribe');
	}

	public function subscribedQuestions()
	{
		return $this->morphedByMany('App\Models\Question', 'subscribe');
	}

	public function setAvatarAttribute()
	{
		$this->attributes['avatar'] = 'img/user1.png';
	}

	public function getFullNameAttribute()
	{
		if (empty($this->first_name) and empty($this->last_name)) {
			return $this->nickname;
		}
		return $this->first_name . ' ' . $this->last_name;
	}

	public function questionsCount()
	{
		return $this->subscribers()
            ->selectRaw('subscribe_id, count(*) as count')
            ->groupBy('subscribe_id');
	}

	public function solutions()
	{
		return $this->answers()->selectRaw('count(*) as count')->where('is_solution', 1);
	}

	public function getSolutionsPercentAttribute()
	{
		if ($this->solutions->count() and $this->answers->count())
			return round($this->solutions->count() / $this->answers->count() * 100);

		return 0;
	}

	public function getRouteKeyName()
    {
        return 'nickname';
    }
}

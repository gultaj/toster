<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

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
		return $this->hasMany('App\Question');
	}

	public function answers()
	{
		return $this->hasMany('App\Answer');
	}

	public function liked()
	{
		return $this->belongsToMany('App\Answer', 'answer_likes');   
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = \Hash::make($password);
	}

	public function getFullNameAttribute()
	{
		if (empty($this->first_name) and empty($this->last_name)) {
			return $this->nickname;
		}
		return $this->first_name . ' ' . $this->last_name;
	}

	public function solutions()
	{
		return $this->answers()->selectRaw('count(*) as count')->where('is_solution', 1);
	}

	public function getSolutionsPercentAttribute()
	{
		return round($this->solutions->count() / $this->answers->count() * 100);
	}
}

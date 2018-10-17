<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Authenticatable
{
    use Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }
 
    public function hasRole($role)
    {
		if ($this->isSuper()) {
			return true;
		}

		if (is_string($role)) {
			return $this->roles->contains('name', $role);
		}

		return !! $this->roles->intersect($role)->count();
    }

    public function isSuper()
    {
        if ($this->roles->contains('name', 'super')) {
            return true;
        }

        return false;
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        return $this->roles()->attach($role);
    }

    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        return $this->roles()->detach($role);
    } 

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

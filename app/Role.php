<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','display_name'];
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }

    public function addPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        return $this->permissions()->attach($permission);
    }

    public function hasPermission($permission) : bool
    {
		if (is_string($permission)) {
			$permission = Permission::where('name', $permission)->first();
		}

		return !! $this->permissions->contains('id', $permission->id);
    }

    public function removePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        return $this->permissions()->detach($permission);
    }
}

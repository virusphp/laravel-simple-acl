<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (Schema::hasTable('permissions')) {
			// register permision secara dinamix

			foreach ($this->getPermissions() as $permission)
			{
				Gate::define($permission->name, function($user) use ($permission) {
					return $user->hasRole($permission->roles);
				});
			}
		}
    }

    private function getPermissions()
    {
        return Permission::all();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\Permission;

class DevelopAssignPermissionGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'developer:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengaitkan Permission ke Role Developer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $roleDeveloper = Role::firstOrNew([
            'name' => 'developer'
        ]);

        $roleDeveloper->save();

        if ($roleDeveloper) {
            $user = User::first();
            $user->revokeRole($roleDeveloper->name);
            $user->assignRole($roleDeveloper->name);

            $permissions = [];
            foreach (config('developer') as $module) {
                foreach ($module['permissions'] as $permission) {
                    $permissions[] = $permission. "-". $module['route'];
                }
            }
        
            $assigned = 0;
            foreach ($permissions as $permission) {
                $cekPermission = Permission::where('name', $permission)->first();

                if (empty($cekPermission)) {
                    $cekPermission = Permission::create(['name' => $permission]);
                    $this->info($permission. ' Dibuat');
                }

                if (!$roleDeveloper->hasPermission($permission)) {
                    $roleDeveloper->addPermission($permission);
                    $this->info($permission. ' Dikatikan ke role developer');
                    $assigned += 1;
                }
            }

            if ($assigned == 0) {
                $this->comment('Tidak ada permission baru');
            } else {
                $this->comment($assigned. ' Permission di kaitkan ke role developer');
            }
        } else {
            $this->info('Role yang di masksud tidak ada');
        }
    }
}

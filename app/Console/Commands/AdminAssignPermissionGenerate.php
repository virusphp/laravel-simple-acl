<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\Permission;

class AdminAssignPermissionGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengaitkan Permission ke Role Admin';

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
        $roleAdmin = Role::firstOrNew([
            'name' => 'admin'
        ]);

        $roleAdmin->save();

        if ($roleAdmin) {
            $user = User::find(2);
            $user->revokeRole($roleAdmin->name);
            $user->assignRole($roleAdmin->name);

            $permissions = [];
            foreach (config("admin") as $module) {
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

                if (!$roleAdmin->hasPermission($permission)) {
                    $roleAdmin->addPermission($permission);
                    $this->info($permission. ' Dikatikan ke role admin');
                    $assigned += 1;
                }
            }

            if ($assigned == 0) {
                $this->comment('Tidak ada permission baru');
            } else {
                $this->comment($assigned. ' Permission di kaitkan ke role admin');
            }
        } else {
            $this->info('Role yang di masksud tidak ada');
        }
    }
}

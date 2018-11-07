<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\Permission;

class AuthorAssignPermissionGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:permission';

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
        $roleAuthor = Role::firstOrNew([
            'name' => 'author'
        ]);

        $roleAuthor->save();

        if ($roleAuthor) {
            $user = User::where('id', 4)->first();
            $user->revokeRole($roleAuthor->name);
            $user->assignRole($roleAuthor->name);

            $permissions = [];
            foreach (config('author') as $module) {
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

                if (!$roleAuthor->hasPermission($permission)) {
                    $roleAuthor->addPermission($permission);
                    $this->info($permission. ' Dikatikan ke role author');
                    $assigned += 1;
                }
            }

            if ($assigned == 0) {
                $this->comment('Tidak ada permission baru');
            } else {
                $this->comment($assigned. ' Permission di kaitkan ke role author');
            }
        } else {
            $this->info('Role yang di masksud tidak ada');
        }
    }
}

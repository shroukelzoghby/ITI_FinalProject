<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Command;

class CacheRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache roles to be used in authorization';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cached = [];
        $roles  = DB::table('roles')->get();

        foreach($roles as $role)
            $cached[$role->title] = $role->id;

        Cache::forever('roles', $cached);

        $this->info('Roles has been cached');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очистка кэша';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $users =  User::get();
        Cache::forget('users');
       Cache::forever('users', $users);
        $this->info('Кэш удалился');
    }
}

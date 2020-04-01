<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class MigrateWithoutOverlapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:migrate-without-overlapping {executingHost}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '複数ホストがあっても単一のホストのみでマイグレーションコマンド実行する。'
        .'キャッシュ領域に `executingHost` というkeyでホスト名を予め登録する必要がある。';

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
        $host = Cache::get('executingHost', null);

        if ($host === null) {
            $this->info('実行するホストが選択されていません');
            return;
        }

        if (Schema::hasTable('companies') && Company::count() !== 0) {
            $this->info('マイグレーションが既に1回以上実行されています');
            return;
        }

        $should_execute = $host === $this->argument('executingHost');

        if ($should_execute) {
            Artisan::call('migrate:fresh', ['--seed' => true]);

            Cache::forget('executingHost');
        } else {
            $this->info('別ホストにてマイグレーションが行われます');
        }
    }
}

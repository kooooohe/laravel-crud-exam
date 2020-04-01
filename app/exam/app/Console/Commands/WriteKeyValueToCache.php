<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class WriteKeyValueToCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:write-key-value-to-cache {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'キャッシュ領域にKey-Value形式で書き込みを行う';

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
        $is_added = Cache::add($this->argument('key'), $this->argument('value'), 5);

        if ($is_added) {
            $this->info('書き込みが成功しました');
        } else {
            $this->info('既に書き込みが行われています');
        }
    }
}

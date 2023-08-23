<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class redirections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'second:redirect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Redirect Five Seconds';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}

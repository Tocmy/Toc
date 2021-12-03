<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TaskReminder extends Command
{
    /**
     * The name and signature of the console command.
     * panercrm broker
     * @var string
     */
    protected $signature = 'task:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email To Reminder Staff of The Deadline';

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

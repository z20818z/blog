<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flight;
use Mail;
use App\Mail\SendEmail;
use App;
class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to remind you';

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
        //Main
        $data = App::make('App\Http\Controllers\PostController')->select(date('Y-m-d'));
        Mail::to($data[0]['user'])->send(new SendEmail("排程通知","這是排程通知"));

        //Test
    }
}

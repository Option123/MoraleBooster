<?php

namespace App\Console\Commands;

use App\Mail\SendMorale;
use App\Staff;
use App\User;
use App\Morale;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Now extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:now';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends morale booster to emails';

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
    public function handle(Staff $staff, Morale $morale)
    {
        $getStaff = $staff->get();

        foreach ($getStaff as $row)
        {
            $booster = $morale->inRandomOrder()->first();

            Mail::to($row)->send(new SendMorale($booster, $row));
        }
    }
}

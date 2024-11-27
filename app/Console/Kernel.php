<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call('App\Http\Controllers\Migrations\MigracoesController@limpatabelas')
        ->everyMinute()
        ->appendOutputTo(base_path() . '/storage/logs/scheduler' . Carbon::now()->format('Y-m-d') . '.txt');

        $schedule->call('App\Http\Controllers\Migrations\MigracoesController@migrasacados')
        ->everyMinute()
        ->appendOutputTo(base_path() . '/storage/logs/scheduler' . Carbon::now()->format('Y-m-d') . '.txt');

        $schedule->call('App\Http\Controllers\Migrations\MigracoesController@migracedentes')
        ->everyMinute()
        ->appendOutputTo(base_path() . '/storage/logs/scheduler' . Carbon::now()->format('Y-m-d') . '.txt');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

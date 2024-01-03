<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Console;

use App\Blueprint\Services\CronServices;
use App\Eloquents\CronJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Schema;

/**
 * Class Kernel
 * @package App\Console
 */
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
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (!Schema::hasTable((new CronJob)->getTable())) return;

        $outputEmail = getConfig('cron', 'email');
        $outputFile = storage_path('logs/output.log');
        $cronServices = app(CronServices::class);
        /** @var CronServices $cronServices */
        $cronJobs = $cronServices->getCronJobs(collect(['status' => true]));

        foreach ($cronJobs as $cronJob) {
            $dateTime = $cronJob->minute . ' ' . $cronJob->hour . ' ' . $cronJob->day . ' ' . $cronJob->month . ' ' . $cronJob->weekday;
            $schedule->call(function () use ($cronJob, $cronServices) {
                return $cronJob->task ? CronServices::runJob($cronJob->task) : sendRequest($cronJob->url);
            })->cron($dateTime)->before(function () {
                // Task is about to start...
            })->after(function () use ($cronJob, $cronServices) {
                /** @var CronServices $cronServices */
                $cronServices->addCronHistory($cronJob);
            })->sendOutputTo($outputFile)->emailOutputTo($outputEmail);
        }
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}

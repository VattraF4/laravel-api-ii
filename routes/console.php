<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Schedule;
// Runs at second 0
Schedule::command('queue:work --stop-when-empty --max-time=25')
    ->everyMinute();

// Runs at second 30 (waits 30s first)
Schedule::command('queue:work --max-time=55 --sleep=3 --tries=3')
    ->everyMinute()
    ->withoutOverlapping();
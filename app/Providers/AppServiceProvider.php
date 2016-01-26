<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        use Monolog\Logger;
//        use Monolog\Handler\StreamHandler;
        if (config('app.debug') === true) {
            \DB::listen(function($query) {
                $logFile = storage_path('logs/query.log');
                $monolog = new Logger('log');
                $monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);
                $monolog->info('Query', ['sql' => $query->sql, 'bindings' => $query->bindings, 'time' => $query->time]);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}

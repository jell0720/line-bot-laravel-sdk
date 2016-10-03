<?php

namespace Jordanator\LineBot;

use Illuminate\Support\ServiceProvider;

class LineBotServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerLine();
    }

    public function boot()
    {
        $this->bootLine();
    }

    private function bootLine()
    {
        $configFile = __DIR__ . '/../config/line.php';

        $this->publishes([
            $configFile => config_path('line.php'),
        ]);
    }

    private function registerLine()
    {
        $this->app->singleton('LineBot', function($app) {
            $args = [
                'channelSecret' => $app['config']['line.channel.secret'],
                'endpointBase'  => $app['config']['line.channel.end_point']
            ];

            return new LineBotManager($app['config']['line.channel.token'], $args);
        });
    }
}

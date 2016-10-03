<?php
/**
 * Created by PhpStorm.
 * User: lalith
 * Date: 3/10/16
 * Time: 12:59 PM
 */

namespace Jordanator\LineBot\Providers;

use Illuminate\Support\ServiceProvider;
use Jordanator\LineBot\Line;
use Jordanator\LineBot\LineManager;

class LineServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Line::class, function($app) {
            $args = [
                $app['line.channel.secret'],
                $app['line.channel.end_point']
            ];

            return new LineManager($app['line.channel.token'], $args);
        });
    }

    public function boot()
    {
        $configFile = __DIR__ . '/../config/line.php';

        $this->publishes([
            $configFile => config_path('line.php'),
        ]);
    }
}
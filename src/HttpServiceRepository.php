<?php

namespace Crush\Http;

use Crush\Http\Http;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * UrlBuilder Service Provider Class.
 */
class HttpServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind('Crush\Http\Contracts\Http', function($app) {
            return new Http(new Client, []);
        });

    }

}

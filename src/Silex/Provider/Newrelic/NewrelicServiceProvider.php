<?php
namespace Dazz\Silex\Provider\Newrelic;

use Silex\ServiceProviderInterface;
use Silex\Application;

class NewrelicServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['newrelic.config'] = array(
            'appname' => 'newrelic-app',
            'license' => '',
            'xmit'    => false,
        );

        $app['newrelic'] = $app->share(
            function ($app){
                if (extension_loaded('newrelic')) {
                    return new Reporter($app['newrelic.config']);
                }
                return new NullReporter();
            }
        );
    }

    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

}
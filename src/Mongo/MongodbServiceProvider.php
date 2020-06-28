<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/28
 * Time: 上午9:52
 */

namespace YouGeCore\Mongo;


use Jenssegers\Mongodb\Queue\MongoConnector;
use YouGeCore\Mongo\Eloquent\Model;

class MongodbServiceProvider extends \Jenssegers\Mongodb\MongodbServiceProvider
{
    public function boot()
    {
        Model::setConnectionResolver($this->app['db']);
        Model::setEventDispatcher($this->app['events']);
    }


    public function register()
    {
        // Add database driver.
        $this->app->resolving('db', function ($db) {
            $db->extend('mongodb', function ($config, $name) {
                $config['name'] = $name;
                return new Connection($config);
            });
        });

        // Add connector for queue support.
        $this->app->resolving('queue', function ($queue) {
            $queue->addConnector('mongodb', function () {
                return new MongoConnector($this->app['db']);
            });
        });
    }



}
<?php
namespace Crystalshardz\LaravelAlerts\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelAlertsFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'Alert';
    }
}
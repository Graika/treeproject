<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class dbCon
{
    public static function connect() {
        $db_params = dbCon::getDbParams();
        $capsule = new Capsule;
        $capsule->addConnection($db_params);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    }

    private static function getDbParams() {
        return require(ROOT."/config/db_params.php");
    }
}
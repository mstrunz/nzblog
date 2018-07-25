<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.07.18
 * Time: 19:43
 */

namespace App\Mongo;


class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mongo';
    }
}
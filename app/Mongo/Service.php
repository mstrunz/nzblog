<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.07.18
 * Time: 19:41
 */

namespace App\Mongo;


use MongoDB\Client;

class Service
{
    private $mongo;

    public function __construct($uri, $uriOptions, $driverOptions)
    {
        $this->mongo = new Client($uri = null, $uriOptions = [],
            $driverOptions = []);
    }

    public function get()
    {
        return $this->mongo;
    }
}
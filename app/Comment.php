<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 28.07.18
 * Time: 15:34
 */

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    protected $connection = 'mongodb';
}
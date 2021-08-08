<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 7/28/2021
 * Time: 12:08 PM
 */

namespace App\Core;


abstract class Event
{
    private $eventName;

    public function __construct($eventName)
    {
        $this->eventName=$eventName;
    }

    abstract public function gettag();
}

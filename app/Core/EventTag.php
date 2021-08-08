<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 7/28/2021
 * Time: 12:16 PM
 */

namespace App\Core;



class EventTag extends Event
{
    protected $tag;

    public function __construct($eventName,SignEvent $tag)
    {
        parent::__construct($eventName);
        $this->tag = $tag;
    }

    public function gettag()
    {
        return $this->tag;
    }
}

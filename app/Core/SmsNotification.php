<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 7/28/2021
 * Time: 1:45 PM
 */

namespace App\Core;


class SmsNotification
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
    public function send()
    {
        dd($this->message);
    }
}

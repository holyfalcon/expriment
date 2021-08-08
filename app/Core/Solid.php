<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 8/2/2021
 * Time: 1:05 PM
 */

namespace App\Core;
use App\Core\LangInterface;

class Persian implements LangInterface {
    public function sayhello(){
        dd('salam');
    }
}

class Ferench implements LangInterface {
    public function sayhello(){
        dd('Bonjor');
    }
}

class Solid
{
    public function say(LangInterface $lang){
        $lang->sayhello();
    }
}

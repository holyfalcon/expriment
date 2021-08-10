<?php

namespace App\Http\Controllers;

use App\Core\Ferench;
use App\Core\Persian;
use App\Core\SignEvent;
use App\Core\Solid;

use App\Mail\EmailSayHello;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Core\EventTag;
use App\Models\User;


class TestController extends Controller
{


    public function bilogin()
    {
        dd('ba middleware ferestadamet inja ___ aval bayad login shi __ authenticatin shenakhte nashod');
    }

    public function user()
    {
        dd('helloooo');
    }


    public function test(Request $request)
    {
        $name = array(['ali','shahin','shahab']);
        $state = array(['sa','cd','ld']);
        foreach ($name as $n){
            print_r('x');
        }
//        return response()->json(
//
//            ['name' => 'Abigail',
//            'state' => 'CA',]
//        );
        $message = 'helllllllo woooorld';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
    }

    public function test2(User $user)
    {
//        $name = "abbas";
//
//        $not = resolve('SmsNotification', ['Have fun']);
//        var_dump($not);
//        var_dump($not);
//        $not->send();

//        $n = app('SmsNotification'  ,['goto']);
//        $n->send();

//        $obj = new Solid;
//        $obj->say(new Ferench());

//        $user = User::where('id',1)->get();
//        dd($user[0]);
//        return User::factory()->count(5)->make();
//        $user = $user->find(3);
//
//        Mail::to('shahin.bozorgi96@yahoo.com')->send(new EmailSayHello($user));

    }
}

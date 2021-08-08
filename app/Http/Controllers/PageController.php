<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PageController extends Controller
{

    public function index()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard()
    {
        $post = app('Post');
        $group = app('Group');
        $post = $post->orderBy('id', 'desc')->get();
        $group = $group->all();

        return view('Dashboard',['posts'=>$post,'groups'=>$group]);
    }

    public function loginPage()
    {
        return redirect(route('login'));
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $getGroup = app('Group');

        if ($request->method() == 'GET'){

            $id = $request->group->user_id;
            if (Auth::id() == $id) {
                return $next($request);
            } else {
                return abort(403);
            }
        }elseif ($request->method() == 'POST') {

            $groupId = $request->group;
            $id = $getGroup->find($groupId)->user_id;
            if (Auth::id() == $id) {
                return $next($request);
            } else {
                return abort(403);
            }
        }elseif($request->method() == 'DELETE') {

            $groupId = $request->post->group_id;
            $id = $getGroup->find($groupId)->user_id;
            if (Auth::id() == $id){
                return $next($request);
            }else{
                return abort(403);
            }
        }

    }
}

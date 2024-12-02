<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class IncrementUserResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user_id <= 0){
            return redirect('/home');
        }
        $user = User::findOrFail($request->user_id);
        $requests_num = $user->requests_num;
        $user::update([
            'requests_num' => $requests_num+1,
        ]);
        
        return $next($request);
    }
}

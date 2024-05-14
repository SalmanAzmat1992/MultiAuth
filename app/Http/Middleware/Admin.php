<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        $userStatus = Auth::user()->is_active;
        if($userStatus == 1)
        {
            $userRole = Auth::user()->role;
            if($userRole == 1)
            {
                return redirect()->route('superAdmin.dashboard');
            }
            if($userRole == 2)
            {
                return $next($request);
            }
            if($userRole == 3)
            {
                return redirect()->route('manager.dashboard');
            }
            if($userRole == 4)
            {
                return redirect()->route('staff.dashboard');
            }
        }
        else
        {
            $result = Auth::user()->is_active;
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $notification = [
                'msg' => 'Sorry your account has been blocked by',
                'msg_type' => 'warning',
                'success' => false,
                'result'  => $result
            ];
            return  redirect()->route('block.user')->with($notification);
        }




    }
}

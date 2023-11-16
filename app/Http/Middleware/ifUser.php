<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User_role;
use Auth;

class ifUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = User_role::where('userid', Auth::user()->id)->first();
         if ($role && $role->roleid == 2) {
            return $next($request);
        
        $user->employees()->create([
            'employee_fullname' => $data['employee_fullname'],
            'employee_password' => $data['employee_password'],
            'employee_position' => $data['employee_position'],
            'employee_department' => $data['employee_department'],
          
             
             
        ]);
    }
}

 
}
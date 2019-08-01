<?php

namespace App\Http\Middleware\Role;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $userRoles = $user->roles;
        $admin = 0;

        foreach ($userRoles as $userRole) {
          $role = $user->role($userRole->role_id);
          if ($role->isAdmin == 1) {
            $admin = 1;
            }
        }
        if($admin == 0){
         return redirect('403');
        }
        return $next($request);
    }
}

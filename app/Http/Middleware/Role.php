<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
    * User hierarchy
    *
    * @var array
    */
    protected $hierarchy = [
        'admin' => 3, 
        'editor' => 2, 
        'user' => 1
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($this->hierarchy[$role] > $this->hierarchy[$user->role]) {
            abort(404);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
class authenticate
{
    public function handle($request, Closure $next)
    {


        
      return $next($request);

    }

}

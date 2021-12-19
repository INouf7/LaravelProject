<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureHasTeam
{
    public function handle(Request $request, Closure $next)
    {
        $currentUser = auth()->user();

      /*  if (! $currentUser->isMemberOfATeam()) {
            return redirect()->route('create-first-team');
        }
      */
        //return redirect()->route('create-first-team');

        return $next($request);
    }


}

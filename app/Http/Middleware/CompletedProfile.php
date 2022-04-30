<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class CompletedProfile{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $row = auth()->user();
        if (!$row) {
            return redirect('auth/login');
        }
        if(auth()->user()->type=='admin'){
            return $next($request);
        }
        if(auth()->user()->completed_profile==1){
            return $next($request);
        }
        if(auth()->user()->type=='employee'){
            flash()->error(trans('app.You did not complete your profile'));
            return redirect('profile/edit');
        }
        if(auth()->user()->type=='recruiter'){
            flash()->error(trans('app.You did not complete your profile'));
            return redirect('company/edit');
        }
    }

}

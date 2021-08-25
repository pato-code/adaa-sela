<?php

namespace App\Http\Middleware;

use App\Branch;
use App\Organization;
use Closure;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class TenentMiddleware
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
        Session::remove('organization');
//        Session::put('organization' , $request->has('organization'));
        if($request->organization){
////            return Session::push('organization' , $request->has('organization'));
            if(!Session::has('organization')){
                try {
                    $organization = Organization::where('domain', $request->organization)->firstOrFail();
                    Session::put('organization', $organization);
                    Session::put('organization_id', $organization->id);
                } catch (Exception $e) {
                    abort(404);
                }
            }
            else if (Session::get('organization')->domain != $request->organization){
                try {
                    $organization = Organization::where('domain', $request->organization)->firstOrFail();
                    Session::put('organization', $organization);
                    Session::put('organization_id', $organization->id);
                } catch (Exception $e) {
                    abort(404);
                }
            }
//            if($request->has('branch')){
//                if(!Session::has('branch')){
//                    $branch = Branch::where('domain' , $request->has('branch'))->firstOrFail();
//                    Session::push('branch' , $branch);
//                } else if (Session::has('branch')->domain != $request->has('branch')){
//                    $branch = Branch::where('domain' , $request->has('branch'))->firstOrFail();
//                    Session::push('branch' , $branch);
//                }
//            }
        }
        URL::defaults([
           'organization' => request('organization'),
           'branch' => request('branch')
        ]);
        return $next($request);
    }
}

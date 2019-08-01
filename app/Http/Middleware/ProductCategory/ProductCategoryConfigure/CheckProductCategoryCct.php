<?php

namespace App\Http\Middleware\ProductCategory\ProductCategoryConfigure;

use App\ProductCategory\CCT;
use Closure;

class CheckProductCategoryCct
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
        $cctId = $request->route('cct');
        $cct = CCT::find($cctId);
       
         if ($cct->checkProductCategory($cct->id)) {
            return redirect ('checkProductCategory');
         }
        return $next($request);
    }
}

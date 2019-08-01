<?php

namespace App\Http\Middleware\ProductCategory\ProductCategoryConfigure;

use App\ProductCategory\CCT;
use App\ProductCategory\Diffuser;
use Closure;

class CheckProductCategoryDiffuser
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
        $diffuserId = $request->route('diffuser');
        $diffuser = Diffuser::find($diffuserId);
       
         if ($diffuser->checkProductCategory($diffuser->id)) {
            return redirect ('checkProductCategory');
         }
        return $next($request);
    }
}

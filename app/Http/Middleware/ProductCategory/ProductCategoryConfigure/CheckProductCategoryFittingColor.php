<?php

namespace App\Http\Middleware\ProductCategory\ProductCategoryConfigure;

use App\ProductCategory\CCT;
use App\ProductCategory\Diffuser;
use App\ProductCategory\FittingColor;
use Closure;

class CheckProductCategoryFittingColor
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
        $fittingColorId = $request->route('fittingColor');
        $fittingColor = FittingColor::find($fittingColorId);
       
         if ($fittingColor->checkProductCategory($fittingColor->id)) {
            return redirect ('checkProductCategory');
         }
        return $next($request);
    }
}

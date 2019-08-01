<?php

namespace App\Http\Middleware\ProductCategory\ProductCategoryConfigure;

use App\ProductCategory\Watt;
use Closure;

class CheckProductCategoryWatt
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
        $wattId = $request->route('watt');
        $watt = Watt::find($wattId);
         if ($watt->checkProductCategory($watt->id)) {
            return redirect ('checkProductCategory');
         }
        return $next($request);
    }
}

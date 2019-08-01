<?php

namespace App\Http\Middleware\ProductCategory\ProductCategoryConfigure;

use App\ProductCategory\Voltage;
use Closure;

class CheckProductCategoryVoltage
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
        $voltageId = $request->route('voltage');
        $voltage = Voltage::find($voltageId);
       
         if ($voltage->checkProductCategory($voltage->id)) {
            return redirect ('checkProductCategory');
         }
        return $next($request);
    }
}

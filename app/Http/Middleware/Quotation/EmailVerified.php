<?php

namespace App\Http\Middleware\Quotation;

use App\Quotation\Quotation;
use Closure;

class EmailVerified
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
        $quotation = Quotation::where('id',$request->id)->first();


        if ($quotation) {
             if ($quotation->state == 1) {
                 return $next($request);
             }else {
                 return redirect('403');
             }
        }else {
            return redirect('403');
        }
    }
}

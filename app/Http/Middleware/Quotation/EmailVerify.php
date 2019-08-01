<?php

namespace App\Http\Middleware\Quotation;

use App\Quotation\Quotation;
use Closure;

class EmailVerify
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
        $quotation = Quotation::where('token',$request->token)->first();

        if ($quotation) {
            if ($quotation->state == 1) {
                return redirect('/quotation/emailVerification/verified/'.$request->id.'');
            }else {
                 return $next($request);
            }
        }else {
            return redirect('403');
        }
    }
}

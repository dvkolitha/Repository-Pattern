<?php

namespace App\Http\Middleware;

use Closure;

class CORS

{

    public function handle($request, Closure $next)

    {

        header('Access-Control-Allow-Origin: *');

        

        $headers = [

            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',

            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'

        ];

        if($request->getMethod() == "OPTIONS") {

            return Response::make('OK', 200, $headers);

        }

        

        $response = $next($request);

        foreach($headers as $key => $value)

            $response->header($key, $value);

        return $response;

    }

}
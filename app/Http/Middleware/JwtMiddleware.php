<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;



class JwtMiddleware
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

//       try {

           if (! $user = JWTAuth::parseToken()->authenticate()) {

           return  response()->json(['status'=>1,'error'=>true,'message' => 'user_not_found'],401);

           }
           return $next($request);
//       } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

//        return  response()->json(['status'=>1,'error'=>true,'message' => 'token_expired'],401);

//       } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

//        return  response()->json(['status'=>1,'error'=>true,'message' => 'token_invalid'],401);
           return $this->responseErrorMsg("token_invalid");
//       } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

//           return  response()->json(['status'=>1,'error'=>true,'message' => 'absent'],401);
//       }

       return $next($request);


   }

}

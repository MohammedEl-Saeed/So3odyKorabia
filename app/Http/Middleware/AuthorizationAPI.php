<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationAPI
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

         
        $key='dd322ca0a2102254ac7ccc5a2e7c04f4';
        
          $data=$request->all();
       
          $string='';
          if($data != null){
            foreach($data as $index=>$item){
 
                 if(!is_array($item) ){
                    if( !is_file($item) &&  $index !='secure'){
                        $string.=$item.'.';
                      }
                }   
            }
        }
         
        
        $string.=$key;
      
 
       $result=strcasecmp($request->secure ,hash('sha256', $string));
        
          if($result == 0){
            return $next($request);
          }else{
              return response()->json(['message'=>'It is un authorized request']);
          }
     
    }
}

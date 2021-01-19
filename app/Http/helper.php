<?php
if(!function_exists('active_link')){
    function active_link($param1 , $param2 = null){
        if($param2 == null){
            if(preg_match('/'.$param1.'/i' , Illuminate\Support\Facades\Request::segment(1))){
                return 'active';
            }else{
                return '';
            }
        }else{
            if(
                preg_match('/'.$param1.'/i' , Illuminate\Support\Facades\Request::segment(1))
                &&
                preg_match('/'.$param2.'/i' , Illuminate\Support\Facades\Request::segment(2))
            ){
                return 'active';
            }else{
                return '';
            }
        }
    }
}

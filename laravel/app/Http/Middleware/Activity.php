<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/14
 * Time: 18:03
 */
namespace App\Http\Middleware;
use Closure;

class Activity{

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * 前置
     */
//    public function handle($request, Closure $next){
//        if (time()<strtotime('2016-11-2')) {
//           return redirect('activity0');
//        }
//        return $next($request);
//    }


    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * 前置
     */
    public function handle($request, Closure $next){
//        if (time()<strtotime('2016-11-2')) {
//            return redirect('activity0');
//        }
//        return $next($request);
        $response=$next($request);
        echo $response;
        
        echo '我是后置草错';
    }
}
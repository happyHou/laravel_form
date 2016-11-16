<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/11
 * Time: 16:04
 */
namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller {
    public function info($id) {
        //      return 'member_info';
        //      return route('memberinfo');
//        return "user-id-{$id}";
//        return view('member_info');
        
        return Member::getMember();
//        return view('member/info',[
//            'name'=>'xixihou',
//            'age'=>'18'
//        ]);
   }
}
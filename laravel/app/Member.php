<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/11
 * Time: 16:35
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    
    public static function getMember() {
        return 'member name is sean';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/15
 * Time: 16:51
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;

    protected $table = 'student';
    protected $fillable = ['name', 'age', 'sex'];
    public $timestamps = TRUE;

    protected function getDateFormat() {
        return time();
    }

    protected function asDateTime($value) {
        return $value;
    }

    public function sex($ind=NULL) {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
        ];
        if ($ind!==NULL) {
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::SEX_UN];
        }
        return $arr;
    }

}
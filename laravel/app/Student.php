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
    protected $table = 'student';
    protected $fillable = ['name', 'age', 'sex'];
    public $timestamps = TRUE;

    protected function getDateFormat() {
        return time();
    }

    protected function asDateTime($value) {
        return $value;
    }

}
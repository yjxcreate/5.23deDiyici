<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basketball extends Model
{
    protected $table="basketball";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function single($name){
        try {
            $res = self::select('name','allnum','num1','num2')->where('name','=',$name)->get();
            return $res;
        }catch (\Exception $e){
            logError('查看失败',[$e->getMessage()]);
            return false;
        }
    }
    public static function allball(){
        try {
            $res = self::select('name','allnum','num1','num2')->get();
            return $res;
        }catch (\Exception $e){
            logError('查看失败',[$e->getMessage()]);
            return false;
        }
    }

}

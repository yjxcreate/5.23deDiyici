<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Borrow extends Model
{
    protected $table = "borrow";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];
    public static function lend($userid,$ballid,$number,$id){
        try {
            $db = DB::table('borrow');
            $res = $db -> insert([
                'userid' => $userid,
                'ballid' => $ballid,
                'number' => $number,
                'id' => $id
            ]);
            return $res;
        }catch (\Exception $e){
            logError('借出失败',[$e->getMessage()]);
            return false;
        }
    }
    public static function returnball($userid,$ballid,$number){
        try {
            $db = DB::table('borrow');
            $num = self::select('number')->where('userid',$userid)->where('ballid',$ballid);
                $res = $db-> where('userid',$userid)->where('ballid',$ballid)
                    -> delete();
            return $res;
        }catch (\Exception $e){
            logError('归还失败',[$e->getMessage()]);
            return false;
        }
    }
}

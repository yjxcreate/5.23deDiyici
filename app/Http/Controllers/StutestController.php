<?php

namespace App\Http\Controllers;

use App\Models\Basketball;
use App\Models\Borrow;
use Illuminate\Http\Request;

class StutestController extends Controller
{


    public function single(Request $request) {
        $name = $request['name'];
        $res = Basketball::single($name);
        return $res ?
            json_success('查询成功！', $res, 200) :
            json_fail('查询失败', null, 100);
    }
    public function all() {
        $res = Basketball::allball();
        return $res ?
            json_success('查询成功！', $res, 200) :
            json_fail('查询失败', null, 100);
    }
    public function lend(Request $request) {
        $userid = $request['userid'];
        $ballid = $request['ballid'];
        $number = $request['number'];
        $id = $request['id'];
        $res = Borrow::lend($userid,$ballid,$number,$id);
        return $res ?
            json_success('借出成功！', $res, 200) :
            json_fail('借出失败', null, 100);
    }
    public function returnball(Request $request) {
        $userid = $request['userid'];
        $ballid = $request['ballid'];
        $number = $request['number'];
        $res = Borrow::returnball($userid,$ballid,$number);
        return $res ?
            json_success('归还成功！', $res, 200) :
            json_fail('归还失败', null, 100);
    }
}

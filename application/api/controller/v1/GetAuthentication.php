<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;

class GetAuthentication extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $appid = "jun";
        $uid = "11";
        $accesstoken = "shC2c1iJ37986VN0z1RE5k7LA85dlfZv";
        $base = $appid.':'.$accesstoken.':'.$uid;
        $opt['authentication'] = $uid." ".base64_encode($base);
        var_dump($opt);
    }

}

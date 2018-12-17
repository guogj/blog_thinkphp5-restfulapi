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
        $accesstoken = "A1o0IOqFD7rhuMW8ntva35LCSkXBdzQG";
        $base = $appid.':'.$accesstoken.':'.$uid;
        $opt['authentication'] = $uid." ".base64_encode($base);
        var_dump($opt);
    }

}

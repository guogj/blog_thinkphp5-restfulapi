<?php

namespace app\api\controller\v1;
use think\Request;
use think\Controller;
use app\api\controller\Send;
use app\api\model\ApiuserModel;
use think\db;

class Apiuser extends Controller
{
    use Send;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        $userInfo = ApiuserModel::select();
//
//        return $this->fetch();
    }

    /**
     * 保存
     *
     * @return \think\Response
     */
    public function save(Request $request)
    {
//        传入手机号：
//        mobile appid
        //参数验证
        $validate = new \app\api\validate\Apiuser;
        if(!$validate->check(input(''))){

            return self::returnMsg(401,$validate->getError());
        }
        self::checkParams(input(''));  //参数校验
        $data['mobile'] =input('mobile');
        $data['timestamp'] = time();
        $data['appid'] = input('appid');
        $data['appsercet'] = md5(input('appsercet'));
        $data['create_at'] = time();
        $data['update_at'] = time();
        $id = Db::table('api_user')->insertGetId($data);
        $userinfo = [
            'appid'  => $data['appid'],//访问令牌
            'mobile'  =>$data['mobile'],
            'appsercet'  =>input('appsercet')
        ];
        return self::returnMsg(200,'success',$userinfo);
    }
    /**
     * 参数检测
     */
    public static function checkParams($params = [])
    {
        $user = Db::table('api_user')->where('mobile',$params['mobile'])->find();
        if($user)
        {
            return self::returnMsg(401,'手机号已经存在');
        }
    }


}

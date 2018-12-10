<?php
namespace app\api\validate;

use think\Validate;
/**
 * 生成token参数验证器
 */
class Apiuser extends Validate
{

    protected $rule = [
        'appid'       =>  'require',
        'mobile'      =>  'mobile|require',
        'appsercet'      =>  'require',
    ];
    protected $message  =   [
        'appid.require'    => 'appid不能为空',
        'mobile.mobile'    => '手机格式错误',
        'appsercet.require'    => 'appsercet不能为空',

    ];
}
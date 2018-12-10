<?php
namespace app\api\validate;

use think\Validate;
/**
 * 生成token参数验证器
 */
class News extends Validate
{

    protected $rule = [
        'cid'       =>  'number|require',
        'img_url'      =>  'require',
        'news_neme'      =>  'require',
        'content'      =>  'require'

    ];
    protected $message  =   [
        'cid.require'    => '分类必须选择',
        'img_url.mobile'    => '图片必须上传',
        'news_neme.require'    => '新闻标题必填',
        'content.require'    => '新闻内容必填',

    ];
}
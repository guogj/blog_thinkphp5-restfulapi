<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Db;
use think\Request;
use app\api\controller\Send;
use app\api\controller\Base;
use app\api\model\NewsModel;

class News extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        parent::index();
        $result = $this->result_get;
        $tmp = NewsModel::where($this->query_get);
        $tmp_count = clone $tmp;
        $result['total'] = $tmp_count->count();
        $result['list'] = $tmp->limit($result['pageSize'])->page($result['page'])->select();
        self::returnMsg(200, 'Get Data Successfully.', $result);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if ($request->contentType()!=='application/json') {
            self::returnMsg(406, ' The Content-Type is not application/json');
        }
        $input = json_decode($request->getContent(), true);

        foreach($input['list'] as $sid => $val) {
            NewsModel::create([
                'cid' => $val['cid'],
                'img_url' => $val['img_url'],
                'news_neme' => $val['news_neme'],
                'content' => $val['content'],
                'create_at' => time(),
                'update_at' => time()
            ]);
        }
        exec('getconf ARG_MAX', $shell_max_chars);
        $python_param = json_encode($input['list']);
        if ($python_param>$shell_max_chars) {
            self::returnMsg(500, 'The param length is too long.');
        } else {
            self::returnMsg(201, 'Successfully Saved.');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $newInfo = Db::table('news')->where('id',$id)->find();
        if($newInfo){
            self::returnMsg(200, '成功！', $newInfo);
        }else{
            self::returnMsg(401, '此条记录不存在！');
        }

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $newInfo = Db::table('news')->where('id',$id)->find();
        if($newInfo){
            self::returnMsg(200, '成功！', $newInfo);
        }else{
            self::returnMsg(401, '此条记录不存在！');
        }
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $validate = new \app\api\validate\News;
        if(!$validate->check(input('')))
        {
            return self::returnMsg(401,$validate->getError());
        }
        $res = Db::table('news')->where('id',$id)->find();
       if($res){
           $data                 = input('');
           $data['update_at']    = time();
           $new = new NewsModel;
           $new->allowField(['id','cid','img_url','news_neme','content','update_at'])->save($data,['id' => $id]);
           self::returnMsg(200, '成功！');
       }else{
           self::returnMsg(401, 'id为'.$id.'数据不存在！');
       }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
       if(!empty($id)){
           $res = Db::table('news')->where('id',$id)->find();
           if($res){
               Db::table('news')->where('id',$id)->delete();
               self::returnMsg(201, '删除成功！');
           }else{
               self::returnMsg(401, 'id为'.$id.'数据不存在！');
           }
       }else{
           self::returnMsg(401, '非法请求！');
       }
    }


    public function address($id)
    {
        echo "address-";
        echo $id;
    }
}

<?php

namespace app\api\controller;

use app\api\controller\Api;
use think\Controller;
use think\Request;

class Base extends Api
{
    /**
     * @var mixed $query_get
     */
    protected $query_get;

    protected $result_get;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $input = $_GET;
        $result = [
            'total' => 0,
            'page' => 1,
            'pageSize' => 10,
            'list' => []
        ];
        $query = [];
        if (isset($input['id'])) {
            $query += ['id' => $input['id']];
        }

        if (isset($input['page'])) {
            $result['page'] = $input['page'];
        }
        if (isset($input['limit'])) {
            $result['pageSize'] = $input['limit'];
        }
        $this->query_get = $query;
        $this->result_get = $result;
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

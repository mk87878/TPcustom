<?php
namespace Admin\Controller;

class NewsController extends CommonController {

    //首页
    public function index(){
        $map = array();
        $pageSize = C('PAGE_SIZE');//每页数据数量
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;//获取页码

        $map['search_input'] = I('search_input');

        $tds = D('news')->getPageAll($map,$page,$pageSize);
        $count = D('news')->getPageAll_count($map);


        $Pages  =  new \Think\Page($count,$pageSize);
        $Pages->lastSuffix = false;//最后一页不显示为总页数
        $Pages->setConfig('prev','上一页');
        $Pages->setConfig('next','下一页');
        $Pages->setConfig('last','尾页');
        $Pages->setConfig('first','首页');

        $pageAll = $Pages->show();
        $this->assign('_pages',$pageAll);
        $this->assign('_page',($page-1)*$pageSize);

        $this->assign('_search',$map);

        $this->assign('_tds',$tds);

        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'内容管理');
        $this->display('Article/index');
    }
    //文章删除
    public function del(){
        $id = I('id');
        $re = D('news')->delById($id);
        if($re){
            return json_result(1, '操作成功');
        }else{
            return json_result(0, '操作失败');
        }
    }

    //表单验证
    public function check($data = array())
    {
        if (!$data['title']) {
            exit(json_result(0, '标题不能为空'));
        }
        if (!$data['summary']) {
            exit(json_result(0, '摘要不能为空'));
        }
        if (!$data['content']) {
        exit(json_result(0, '内容不能为空'));
        }
    }
    //文章添加
    public function add(){
        $user= $this-> getLoginUser();

        $sortMap['controller'] =  CONTROLLER_NAME;
        $sort = D('sort')->getAll($sortMap);
        $this->assign('_sort',$sort);

        if(IS_POST){
            $data  = $_POST;
            $data['user_id'] = $user['id'];

            $this->check($data);

            $re = D('news')->insert($data);
            if($re){
                json_result(1, '保存成功',U('index'));
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'内容添加');
        $this->display('Article/add');
    }
    //文章编辑
    public function edit(){
        $user= $this-> getLoginUser();
        $sortMap['controller'] =  CONTROLLER_NAME;
        $sort = D('sort')->getAll($sortMap);
        $this->assign('_sort',$sort);

        $id = I('id');

        $re = D('news')->getById($id);
        if(IS_POST){
            $data = $_POST;
            $data['user_id'] = $user['id'];

            $this->check($data);

            $re = D('news')->updateById($id,$data);
            if($re){
                json_result(1, '保存成功');
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('_tds',$re);
        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'内容编辑');
        $this->display('Article/edit');
    }
    //分类
    public function sort_index(){
        $map = array();
        $pageSize = C('PAGE_SIZE');//每页数据数量
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;//获取页码
        $map['controller'] =  CONTROLLER_NAME;

        $map['search_input'] = I('search_input');

        $sort = D('sort')->getPageAll($map,$page,$pageSize);
        $count = D('sort')->getPageAll_count($map);


        $Pages  =  new \Think\Page($count,$pageSize);
        $Pages->lastSuffix = false;//最后一页不显示为总页数
        $Pages->setConfig('prev','上一页');
        $Pages->setConfig('next','下一页');
        $Pages->setConfig('last','尾页');
        $Pages->setConfig('first','首页');

        $pageAll = $Pages->show();
        $this->assign('_pages',$pageAll);
        $this->assign('_page',($page-1)*$pageSize);

        $this->assign('_search',$map);

        $this->assign('_sort',$sort);

        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'分类管理');
        $this->display('Sort/index');
    }
    //分类删除
    public function sort_del(){
        $id = I('id');

        $re = D('sort')->delById($id);
        if($re){
            return json_result(1, '操作成功');
        }else{
            return json_result(0, '操作失败');
        }
    }
    //分类表单验证
    public function sort_check($data = array())
    {
        if (!$data['sort_name']) {
            exit(json_result(0, '名称不能为空'));
        }if (!$data['sort_en']) {
        exit(json_result(0, '英文名称不能为空'));
    }
        if (!$data['controller']) {
            exit(json_result(0, '总分类获取错误,请联系管理员'));
        }

    }
    //分类添加
    public function sort_add(){
        $user= $this-> getLoginUser();

        if(IS_POST){
            $data  = $_POST;
            $data['controller'] = CONTROLLER_NAME;
            $data['user_id'] = $user['id'];

            $this->sort_check($data);

            $re = D('sort')->insert($data);
            if($re){
                json_result(1, '保存成功',U('sort_index'));
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'分类添加');
        $this->display('Sort/add');
    }
    //分类编辑
    public function sort_edit(){
        $user= $this-> getLoginUser();

        $id = I('id');

        $re = D('sort')->getById($id);
        if(IS_POST){
            $data = $_POST;
            $data['controller'] = CONTROLLER_NAME;
            $data['user_id'] = $user['id'];

            $this->sort_check($data);

            $re = D('sort')->updateById($id,$data);
            if($re){
                json_result(1, '保存成功',U('sort_index'));
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('_sort',$re);
        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'分类编辑');
        $this->display('Sort/edit');
    }

    //介绍
    public function intro(){
        $name = 'intro_'.strtolower(CONTROLLER_NAME);

        if(IS_POST){
            $data = $_POST;
            $data['name'] = $name;

            $re = D("basic")->insert($data);

            if($re == null){
                json_result(1, '保存成功');
            }else{
                json_result(0,'保存失败');
            }
        }else{
            $res = F($name);

            $this->assign('_intro',$res);
            $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'介绍设置');
            $this->display('Sort/sort_intro');
        }
    }



}
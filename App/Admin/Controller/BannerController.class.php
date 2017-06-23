<?php
namespace Admin\Controller;

class BannerController extends CommonController {

    public function index(){

        $banner = D('banner')->getAll();

        $this->assign('_banner',$banner);
        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'管理');
        $this->display();
    }


    public function check($data = array())
    {
        if (!$data['name']) {
            exit(json_result(0, '网站名称不能为空'));
        }
        if (!$data['url']) {
            exit(json_result(0, '连接不能为空'));
        }
        if (!$data['img']) {
            exit(json_result(0, '缩略图不能为空'));
        }
//        if (!$data['hover']) {
//            exit(json_result(0, '缩略图hover不能为空'));
//        }
    }

    public function add(){
        $user= $this-> getLoginUser();

        if(IS_POST){
            $data= $_POST;
            if (!preg_match("/^(http|https):/", $data['url'])){
                $data['url'] = 'http://'.$data['url'];
            }

            $this->check($data);

            $re = D('banner')->insert($data);
            if($re){
                json_result(1, '保存成功',U('index'));
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'添加');
        $this->display();
    }


    public function edit(){
        $user= $this-> getLoginUser();

        $id = I('id');

        $re = D('banner')->getById($id);
        if(IS_POST){
            $id = $_GET('id');
            $data= $_POST;
            if (!preg_match("/^(http|https):/", $data['url'])){
                $data['url'] = 'http://'.$data['url'];
            }


            $this->check($data);

            $re = D('banner')->updateById($id,$data);
            if($re){
                json_result(1, '保存成功');
            }else{
                json_result(0,'保存失败');
            }
        }

        $this->assign('_banner',$re);
        $this->assign('meta_title',getMenu_name(CONTROLLER_NAME).'管理');
        $this->display();
    }

    public function del(){
        $id = I('id');
        $re = D('banner')->delById($id);
        if($re){
            return json_result(1, '操作成功');
        }else{
            return json_result(0, '操作失败');
        }
    }



}
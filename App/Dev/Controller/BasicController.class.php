<?php
namespace Dev\Controller;
use Think\Controller;
use Think\Exception;


class BasicController extends CommonController {
    public function index(){
        if(IS_POST){
            $data = $_POST;
            $data['name'] = 'web_config';
//            if($data['thumb'] == null){
//                $data['thumb'] = 'xxx';
//            }

            $re = D("basic")->insert($data);

            if($re == null){
                json_result(1, '保存成功');
            }else{
                json_result(0,'保存失败');
            }
        }else{
            $res = F('web_config');

            $this->assign('_web_config',$res);
            $this->assign('meta_title',getMenu_name(CONTROLLER_NAME));
            $this->display();
        }

    }
}
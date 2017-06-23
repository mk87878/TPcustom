<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        // 如果已经登录
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            // 跳转到登录页面
            $this->redirect('/admin/User/login');
        }
    }


    /**
     * 获取登录用户信息
     * @return array
     */
    public function getLoginUser() {
        return session("adminUser");
    }


    /**
     * 判定是否登录
     * @return boolean
     */
    public function isLogin() {
        $user = $this->getLoginUser();
        if($user && is_array($user)) {
            return true;
        }

        return false;
    }


}
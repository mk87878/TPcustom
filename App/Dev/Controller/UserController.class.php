<?php
namespace Dev\Controller;
use Think\Controller;

class UserController extends Controller {

    public function index(){
        if(session('adminUser')) {
            $this->redirect('/Dev');
        }else{
            $this->redirect('/Dev/User/login');
        }
    }
    //登录
    public function login() {
        if(IS_POST){
            $username = I('username');
            $password = I('password');
            $verify = I('verify');
            if(!trim($username)) {
                return json_error('用户名不能为空');
            }
            if(!trim($password)) {
                return json_error('密码不能为空');
            }
            if(!check_verify($verify)){
                return json_error('验证码输入错误！');
            }

            $ret = D('User')->getAdminByUsername($username);
            if(!$ret || $ret['status'] !=1) {
                return json_error('该用户不存在或者无管理员权限');
            }

            if($ret['password'] != getMd5Password($password)) {
                return json_error('密码错误');
            }

            D("User")->updateByUserId($ret['id'],array('lastlogintime'=>time()));

            session('adminUser', $ret);
            return json_success('/index.php?s=Dev','登录成功');
        }else{
            $this->display();
        }
    }

    //注销
    public function loginout() {
        session('adminUser', null);
        $this->redirect('/Dev/User/login');
    }

    public function profile(){
        if(IS_POST){
            $uid = session('adminUser.id');
            $password = trim(I('password'));
            $repassword = trim(I('repassword'));
            if(!$password) {
                return json_error('密码不能为空');
            }
            if(!($password===$repassword)) {
                return json_error('两次密码输入不一致');
            }
            $data['password'] = getMd5Password($password);
            try {
                $re = D('User')->updateByUserId($uid,$data);
                if($re === false) {
                    return json_error('修改失败');
                }
                return json_success('修改成功','/index.php?s=Dev');
            }catch(Exception $e) {
                return json_error($e->getMessage());
            }

        }else{
            $this->assign('meta_title','密码修改');
            $this->display();
        }


    }


    /* 验证码，用于登录和注册 */
    public function verify(){
        $config =    array(
            'fontSize'    =>    50,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $verify = new \Think\Verify($config);
        $verify->entry(1);
    }

    //获取加密密码
    //http://ot.cn/index.php?s=/Dev/User/getMd5/md5/admin
    public function getMd5(){
        $md5 = I('md5');
        dump(getMd5Password($md5));
    }

}
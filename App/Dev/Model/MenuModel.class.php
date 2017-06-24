<?php
namespace Dev\Model;
use Think\Model;

class MenuModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('menu');
    }


    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }


    public function getAdminMenus() {
        $data = array(
            'status' => array('neq',-1),
            'type' => 1,
        );

        return $this->_db->where($data)->order('listorder,menu_id desc')->select();
    }

    public function getMenu_name($controller) {
        $data = array(
            'status' => array('neq',-1),
            'type' => 1,
            'controller' =>$controller,
        );

        return $this->_db->where($data)->find();
    }


}
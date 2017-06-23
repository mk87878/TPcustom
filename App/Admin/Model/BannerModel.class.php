<?php
namespace Admin\Model;
use Think\Model;

class BannerModel extends Model {
    private $_db = '';

    public function __construct(){
        $this->_db= M('banner');
    }
    public function insert($map = array()){
        $map['status'] = '1';
        return $this->_db->add($map);
    }

    public function getById($id){
        $map['id'] = $id;
        $map['status'] = '1';
        return $this->_db->where($map)->find();
    }
    public function delById($id){
        $map['id'] = $id;
        $map['status'] = '1';
        $data['status'] = '-1';
        return $this->_db->where($map)->save($data);
    }


    public function updateById($id,$data=array()){
        $map['id'] = $id;
        $map['status'] = '1';
        return $this->_db->where($map)->save($data);
    }

    public function getAll(){
        $map['status'] = '1';
        return $this->_db->where($map)->select();
    }





}
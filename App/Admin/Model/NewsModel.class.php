<?php
namespace Admin\Model;
use Think\Model;

class NewsModel extends Model {
    private $_db = '';

    public function __construct(){
        $this->_db= M('news');
    }
    public function insert($map = array()){
        $map['status'] = '1';
        $map['time'] = time();
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



    public function getPageAll($data,$page,$pageSize=10) {
        if(isset($data['search_input']) && $data['search_input']) {
            $conditions['title'] = array('like','%'.$data['search_input'].'%');
        }

        $conditions['status'] = array('neq',-1);

        $offset = ($page - 1) * $pageSize;//起点数据
        $list = $this->_db->where($conditions)
            ->order('id desc')
            ->limit($offset,$pageSize)
            ->select();

        return $list;
    }
    public function getPageAll_count($data) {
        if(isset($data['search_input']) && $data['search_input']) {
            $conditions['title'] = array('like','%'.$data['search_input'].'%');
        }
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();
    }
}
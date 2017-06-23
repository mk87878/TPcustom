<?php
namespace Admin\Model;

use Think\Model;

class BasicModel extends Model {
    public function __construct(){

    }
    public function insert($data = array()) {
        if(!$data) {
            throw_exception('没有提交的数据');
        }
        return F($data['name'], $data);
    }


}
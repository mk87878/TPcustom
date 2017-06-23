<?php
namespace Admin\Model;
use Think\Model;

/**
 * 上传类
 * @author  singwa
 */
class UploadModel extends Model {
    private $_uploadObj = '';

    const UPLOAD = 'upload';

    public function __construct() {
        $this->_uploadObj = new  \Think\Upload();

        $this->_uploadObj->rootPath = './'.self::UPLOAD.'/';
        $this->_uploadObj->subName = date(Y) . '/' . date(m) .'/' . date(d);
    }



    public function Upload($file) {
        $res = $this->_uploadObj->upload();

        if($res) {
            return '/' .self::UPLOAD . '/' . $res[$file]['savepath'] . $res[$file]['savename'];
        }else{
            return false;
        }
    }
}

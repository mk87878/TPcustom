<?php
/**
 * 图片相关
 */
namespace Dev\Controller;
use Think\Controller;
use Think\Upload;

/**
 * 文件上传
 */
class UploadController extends CommonController {
//    private $_uploadObj;
    public function __construct() {

    }

    public function simditoruploadimage() {
        $file = 'fileDataFileName';
        $res = D("Upload")->Upload($file);
        if($res===false) {
            exit(json_img_simditor('false','失败',''));
        }else{
            exit(json_img_simditor('true','成功',$res));
        }

    }
    public function uploadifyimage(){
        $file = 'img_file';
        $res = D("Upload")->Upload($file);
        if($res===false) {
            return json_result(0,'上传失败','');
        }else{
            return json_result(1,'上传成功',$res);
        }
    }

    public function uploadifymp4(){
        $file = 'mp4_file';
        $res = D("Upload")->Upload($file);
        if($res===false) {
            return json_result(0,'上传失败','');
        }else{
            return json_result(1,'上传成功',$res);
        }
    }
}
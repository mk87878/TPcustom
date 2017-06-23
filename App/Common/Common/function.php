<?php

/**
 * 公用的方法
 */

//成功输出
function json_success($data = '', $msg = 'ok') {
    header('Content-Type:application/json; charset=utf-8');
    $return['error'] = 0;
    $return['msg'] = $msg;
    $return['data'] = $data;
    exit(json_encode($return));
}
//失败输出
function json_error($msg = 'error') {
    header('Content-Type:application/json; charset=utf-8');
    $return['error'] = 1;
    $return['msg'] = $msg;
    exit(json_encode($return));
}
//通用输出
function  json_result($status, $msg,$data=array()) {
    $reuslt = array(
        'status' => $status,
        'msg' => $msg,
        'data' => $data,
    );

    exit(json_encode($reuslt));
}
//通用输出
function  json_img_simditor($status,$msg,$dir = '') {
    $reuslt = array(
        'success' => $status,
        'msg' => $msg,
        'file_path' => $dir,
    );
    exit(json_encode($reuslt));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
//密码加密
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}

function status($status) {
    if($status == 0) {
        $str = '关闭';
    }elseif($status == 1) {
        $str = '正常';
    }elseif($status == -1) {
        $str = '删除';
    }
    return $str;
}

/**
 *  字符串截取
 * {$vo.title|subtext=10}
 * @param $text
 * @param $length
 * @return string
 */
function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8').'...';
    return $text;
}

/**
+----------------------------------------------------------
 * 字符串截取，支持中文和其他编码
+----------------------------------------------------------
 * @static
 * @access public
+----------------------------------------------------------
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
+----------------------------------------------------------
 * @return string
+----------------------------------------------------------
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    $len = substr($str);
    if(function_exists("mb_substr")){
        if($suffix)
            return mb_substr($str, $start, $length, $charset)."...";
        else
            return mb_substr($str, $start, $length, $charset);
    }
    elseif(function_exists('iconv_substr')) {
        if($suffix && $len>$length)
            return iconv_substr($str,$start,$length,$charset)."...";
        else
            return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}

/**
 * 男女显示
 * @param $type
 * @return string
 */
function gender($type) {
    return $type == 1 ? '男' : '女';
}

function commend($type) {
    return $type == 1 ? '已推荐' : '未推荐';
}

/**
 * 转意后字符转换回html标签
 * @param $msg
 * @return string
 */
function string2html($e){
    return htmlspecialchars_decode($e);
}


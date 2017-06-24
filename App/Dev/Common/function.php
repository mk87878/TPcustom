<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 2017/4/11
 * Time: 下午4:49
 */

/**
 * @param $controller
 * @return  string 菜单名称
 */
function getMenu_name($controller){
    $menu = D('menu')->getMenu_name($controller);
    return $menu['name'];
}

<?php
return array(
    //'配置项'=>'配置值'
//    'SHOW_PAGE_TRACE' => true,

    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common'),
    'MODULE_ALLOW_LIST'  => array('Home','Dev'),

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
    'HTML_FILE_SUFFIX' => '.html',


    'LOAD_EXT_CONFIG' => 'db',
    'MD5_PRE' => 'onethink',//混淆字符



);
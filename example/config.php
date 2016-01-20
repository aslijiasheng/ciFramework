<?php

define('PLATFORMPATH', dirname(dirname(__FILE__)) . "/");//当前目录
define('APPSPATH', PLATFORMPATH);
define('APPNAME', $DEFAULTAPPNAME);//当前文件夹名称
define('ENV', 'dev');//环境变量 dev为开发 ol为上线
define('DEBUG', FALSE);
define('CONFIG', APPSPATH . APPNAME . "/config/env/" . ENV . '/' . ENV . ".config.php");//当前文件夹名称
if (file_exists(CONFIG)) {//判断文件是否存在 存在则加载
    require_once CONFIG;
}
// define('NORMAL_MVC_EXECUTION', FALSE);
/**
 * 核心CI架构文件夹 
 */
$PLATFORMPATH = dirname(__FILE__).'/../ciFramework';

if (!isset($APPNAME)) {
    $APPNAME = $DEFAULTAPPNAME;
}

if (!isset($FCPATH)) {
    $FCPATH = $DEFAULTFCPATH;
}

if (!isset($SELF)) {
    $SELF = 'index.php';
}
$PLATFORMRUN = $PLATFORMPATH.'/run.php';
$PLATFORMCREATE = $PLATFORMPATH.'/create.php';
$PLATFORMDESTROY = $PLATFORMPATH.'/destroy.php';

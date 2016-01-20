<?php
/**
 * Bo{ 
 * 基类
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
abstract class Bo{

    protected $ci;
    protected static $config;
    
    function __construct(){
        $this->ci = &get_instance();
        self::$config = $this->ci->config->config;
    }

    protected function errorLog($msg,$sig=''){
        //将日志写入日志平台时使用
    }

    protected function throwException($msg='',$model=NULL){
        $log = $msg;
        if(!empty($model))
            $log .= (' Data:'.serialize($bean->_toString()));
        throw new Exception( $log);
    }
}

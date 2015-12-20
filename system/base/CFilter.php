<?php
/**
 * CFilter{ 
 * basefilter uri
 * @abstract
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
abstract class CFilter{

    function __construct(){

    }

    protected $autoImport;
    protected $uri_string;

    public function setAutoImport($autoImport){
        $this->autoImport = $autoImport;
    }

    public function setURI($URI){
        $this->uri_string = $URI;
    }

    /**
     * autoFilter 
     * 根据过滤规则筛选执行方法
     * @access public
     * @return void
     */
    public function autoFilter(){
        $filterError = FALSE;
        if (isset($this->autoImport['filter'])){
            foreach($this->autoImport['filter'] as $filterReg => $filterAction){
                /**
                 *  判断标识符
                 */
                switch($filterReg){
                    case 'all'://全部
                        $action = new $filterAction();
                        if($action->preFilter()){
                            $filterError = TRUE;
                        }
                        break;
                    case 'default'://默认
                        $this->preFilter();
                        break;
                    default://自定义
                        if(preg_match($filterReg, $this->uri_string)){
                            //preg filter sucess
                            $action = new $filterAction();
                            if($action->preFilter()){
                                $filterError = TRUE;
                            }
                        }
                        break;
                }
            }
        }else{
            throw new Exception("未定义过滤器, 将会对系统造成不安全隐患请定义过滤器");
        }
        if(!$filterError){
            throw new Exception("过滤规则失败, 请检查传入的参数");
        }
    }

    public function preFilter(){
    }
}

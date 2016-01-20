<?php
/**
 * RequestInterceptor 
 * 自定义拦截器
 * @uses CFilterImple
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class RequestInterceptor implements CFilterImpl{
    public function preFilter(){
        return true;
    }
}

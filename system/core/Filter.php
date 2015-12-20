<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_Filter 
 * 默认过滤类
 * @uses CFilter
 * @uses CFilterImpl
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class CI_Filter extends CFilter implements CFilterImpl {

    function __construct(){
        parent::__construct();
    }

    public function preFilter(){
        return true;
    }



}

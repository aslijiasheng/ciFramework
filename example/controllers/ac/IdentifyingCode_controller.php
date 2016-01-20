<?php defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * IdentifyingCode_controller 
 * 验证码生成器
 * @uses Base
 * @uses _Controller
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class IdentifyingCode_controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
    }
    /**
     * identifyingCodeAction 
     * 生成验证码异步
     * @access public
     * @return void
     */
    public function gernateIdetifyingCodeAction(){
        $identifyingCodeBoImpl = new IdentifyingCodeBoImpl();    
        $identifyingCodeBoImpl->gernate();
        die;
    }
}

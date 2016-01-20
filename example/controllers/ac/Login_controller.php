<?php defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * Login_controller 
 * 登陆登出控制器设定登陆action 登出action
 * @uses Base
 * @uses _Controller
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class Login_controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * login 
     * 登陆
     * @access public
     * @return void
     */
    public function login(){
        $this->viewRender(null, $ENV['user']['login']);
    }

    /**
     * tologin 
     * 用户登陆跳转
     * @access public
     * @return void
     */
    public function tologin() {
        $error = array("succ" => FALSE, "errorMsg" => array());
        $loginBean = new LoginBean();
        $loginBean->setUserAccount($this->input->post('user.account', ''));
        $loginBean->setUserPassword($this->input->post('user.password', ''));
        $loginBean->setIdentifyingCode($this->input->post('identifyingCode', ''));
        $loginBoImpl = new LoginBoImpl();
        $loginBoImpl->tologin($loginBean);
        // $userBo = new UserBoImpl();
        // PlatformLogBoImpl::logError("get list failed!r=1","ssssss1",__CLASS__,__LINE__,__FUNCTION__);
        // $this->session->set_userdata('some_name', 'some_value');
        // var_dump($this->session->userdata());
        // var_dump($this->userModel->select('*')->where('user_name', '张蔚')->as_value()->find());
        die;
    }

    /**
     * loginout 
     * 用户登出
     * @access public
     * @return void
     */
    public function loginout(){

    }

}

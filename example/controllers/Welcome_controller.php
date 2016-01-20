<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Welcome_controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function welcome() {
        // $userBo = new UserBoImpl();
        // PlatformLogBoImpl::logError("get list failed!r=1","ssssss1",__CLASS__,__LINE__,__FUNCTION__);
        $this->load->model('user_model', 'userModel');
        $this->session->set_userdata('some_name', 'some_value');
        var_dump($this->session->userdata());
        var_dump($this->userModel->select('*')->where('user_name', '张蔚')->as_value()->find());
        die;
    }
}

<?php
class LoginBoImpl extends Bo implements LoginBo{
    
    function __construct(){
        parent::__construct();
        $this->ci->load->helper('image');
        $this->ci->load->model('user_model', 'userDao');
    }

    public function tologin(LoginBean $loginBean){
        $ret = array('succ' => TRUE, 'errorMsg' => array());
        $identifyingCodeImpl = new IdentifyingCodeBoImpl();
        $identifyingCodeValid = $identifyingCodeImpl->identifyingCodeValidate($loginBean->getIdentifyingCode());
        //校验验证码的合法性
        if(!$identifyingCodeValid['succ']){
            return $identifyingCodeValid;
        }
        $loginValid = $loginBean->isValidate();    
        //先验证参数的合法性
        if(!$loginValid['succ']){
            return $loginValid;
        }
        //验证码与参数均校验成功后进入下一步校验
        $userBean = new UserBean();
        $userBean->setUserID($loginBean->getUserAccount());
        $userDao = $this->ci->userDao->selectOne($userBean);
        /**
         * 2 检查密码是否正确
         * 3 检查用户是否存在
         */
        if(empty($userDao)){
           $ret['succ'] = FALSE;
           $ret['errorMsg'] = ERROR::LOGIN_ACCOUNT_ILLEGAL;
        }
        if($userDao->getUserPassword() === $loginBean->getUserPassword()){
           $ret['succ'] = FALSE;
           $ret['errorMsg'] = ERROR::LOGIN_PASSWORD_FAILED;
        }
        $this->saveLoginStatus($loginBean, $ret['succ']);
        return $ret;
    }

    private function saveLoginStatus(LoginBean $loginBean, $valid){
        if(!$valid)
            return;
        $this->ci->session->set_userdata('userAccount', $loginBean->getUserAccount());
    }

}

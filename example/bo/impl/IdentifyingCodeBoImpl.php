<?php
class IdentifyingCodeBoImpl extends Bo implements IdentifyingCodeBo{
    
    function __construct(){
        parent::__construct();
        $this->ci->load->helper('image');
    }

    /**
     * gernate 
     * 生成验证码
     * @access public
     * @return void
     */
    public function gernate(){
        $image = new Image();
        $valid = $image->imageValidate(64, 21, $_SERVER['ENV']['params']['VALID_CODE_LENGTH'], $_SERVER['ENV']['params']['VALID_CODE_TYPE'],'#3e3e3e','#B6B6B6');
        $this->ci->session->set_userdata('vidfy', $valid);
        $image->display();
        die;
    }

    /**
     * identifyingCodeValidate 
     * 校验验证码
     * @param mixed $identifyingCode 
     * @access public
     * @return void
     */
    public function identifyingCodeValidate($identifyingCode){
        $ret = array('succ' => FALSE, 'errMsg' => array());
        if(!self::isCaptcha($identifyingCode)){
            $ret['errMsg'] = ERROR::LOGIN_VIDFY_FAILED;
            return $ret;
        }
        $vidfy = $this->ci->session->get_userdata('vidfy');
        if($vidfy === $identifyingCode){
            $ret['succ'] = TRUE;
            $ret['errMsg'] = ERROR::LOGIN_VIDFY_SUCCESS;
            return $ret;
        }
        $ret['errMsg'] = ERROR::LOGIN_VIDFY_FAILED;
        return $ret;
    }
    /**
     * 验证是否是合法的验证码
     *
     * @param     $captcha
     * @param int $size
     *
     * @return int
     */
	public static function isCaptcha($captcha, $size = 4) {
		return (bool)preg_match('/^[123456789abcdefghijklmnpqrstuvwxyz]{' . $size . '}$/ui', $captcha);
	}
}

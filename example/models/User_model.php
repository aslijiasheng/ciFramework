<?php
class User_model extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('user_id');

    protected $_table = 'tc_user';
    protected $return_type = 'array';

    public function __construct() {
        parent::__construct();
    }

    /**
     * selectOne 
     * 单一查询
     * @param UserBean $userBean 
     * @access public
     * @return void
     */
    public function selectOne(UserBean $userBean){
        $bean = new UserBean();
        $mapping = $userBean->getMapSetting();
        $ret = $this->select(implode(',', array_keys($mapping)))->where('user_id', $userBean->getUserID())->as_value()->find();
        foreach($ret as $key => $value){
            $bean->setUserID($value['user_id']);
            $bean->setUserName($value['user_name']);
            $bean->setUserPassword($value['user_password']);
            $bean->setUserEMail($value['user_email']);
        }
        return $bean;
    }


}

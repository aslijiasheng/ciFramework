<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends Core_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 与前端node实现模板html，代替view功能（正常页面）
     */
    public function viewRender($data, $view, $style = null, $subSite = null, $name = null)
    {
        $navInfo = array(
            "className" => 'icon-nav-mp',
            "title" => '蓝莓说',
        );

        $style = $style ? $style : 'blue';
        $subSite = $subSite ? $subSite : 'mp';
        $view = $style . "/{$subSite}" . $view;
        parent::ViewRender($data, $view, $navInfo);
    }
}

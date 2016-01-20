<?php
/**
 * CodeConst 
 * 参数待定 等前端介入
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class CodeConst
{
    const VIEW_TEMPLATE_DOMAIN = '';

    public static function getViewTemplateConf(){
        return array(
            'ip'   => '',
            'port' => '',
        );
    }
}

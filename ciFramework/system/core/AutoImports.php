<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_AutoImports 
 * customerautoimport
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class CI_AutoImports {

    protected $autoImport;

	public function __construct() {
	}

    public function setAutoImport($autoImport){
        $this->autoImport = $autoImport;
    }

    /**
     * autoImports 
     * 根据个人配置进行自动载入
     * @access public
     * @return void
     */
    public function autoImports(){
        if (isset($this->autoImport['import'])){
            foreach($this->autoImport['import'] as $importPath){
                $importPath = str_ireplace('application', APPPATH, $importPath);
                $importPath = str_ireplace('.', DIRECTORY_SEPARATOR, $importPath);
                $filePaths = glob($importPath . ".php");
                foreach($filePaths as $filePath){
                    $_auto = &get_instance();
                    $_auto->maps[strtolower(basename($filePath, '.php'))] = $filePath;
                }
            }
        }
    }

    public function register_autoloader(){
		spl_autoload_register(array('CI_AutoImports', 'autoloader'));
    }

    /**
     * autoloader 
     * 从缓存中把预加载的资源进行加载
     * @param mixed $class 
     * @access public
     * @return void
     */
    public function autoloader($class) {
        $_ci = &get_instance();
        $autoloader = $_ci->maps[strtolower($class)];
        if (isset($autoloader) && file_exists($autoloader)) {
            require_once $autoloader;
        } else {
            throw new Exception("未定义{$class}, 无法执行，程序中止");
        }
    }



}

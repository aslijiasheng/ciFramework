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
                    require $filePath;
                }
            }
        }
    }



}

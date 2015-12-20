<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_CAutoImports 
 * baseautoimport
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Tobias Schlitt <sky@php.net> 
 * @license PHP Version 5.3
 */
class CI_CAutoImports {

    private $baseAutoImport = [
        'import' => array(
            'application.interface.*',
            'application.base.*',
        ),
    ];

	public function __construct() {
	}

    /**
     * autoImports 
     * 根据个人配置进行自动载入
     * @access public
     * @return void
     */
    public function autoBaseImports(){
        if (isset($this->baseAutoImport['import'])){
            foreach($this->baseAutoImport['import'] as $importPath){
                $importPath = str_ireplace('application', BASEPATH, $importPath);
                $importPath = str_ireplace('.', DIRECTORY_SEPARATOR, $importPath);
                $filePaths = glob($importPath . ".php");
                foreach($filePaths as $filePath){
                    require $filePath;
                }
            }
        }
    }



}

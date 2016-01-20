<?php
class PlatformLogBoImpl extends Bo
{
    //日志级别
    const LOG_LEVEL_ERROR = 1;            //严重错误
    const LOG_LEVEL_WARNING = 2;          //警告
    const LOG_LEVEL_NOTICE = 3;           //注意
    const LOG_LEVEL_INFO = 4;             //流水
    const LOG_LEVEL_DEBUG = 5;            //调试

    /**单例模式
     */
    public static function getInstance(){
        if(null === self::$instance){
            $cls = __CLASS__;
            self::$instance = new $cls();
        }
        return self::$instance;
    }

    /**log记录
     * @param $log string
     * @param $logLevel int(1~5)
     * @param null $errno 错误码 int
     * @param null $cmd 命令号 int
     * @param null $subCmd 子命令号 int
     * @param null $userDef2 用户数据，字符串类型的数值
     * @param null $userDef3 用户数据，字符串类型的数值
     * @param null $userDef4 用户数据，字符串类型的数值
     */
    public static function log2($log,$logLevel,$fileName=null,$line=0,$funName=null,$errno=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        $paramsIn = array(
            'log' => $log,
            'loglevel' => $logLevel,
            'errno' => $errno,
            'fileName' => $fileName,
            'line' => $line,
            'funName' => $funName,
            'cmd' => $cmd,
            'subCmd' => $subCmd,
            'version' => $version,
            'userDef2' => $userDef2,
            'userDef3' => $userDef3,
            'userDef4' => $userDef4
        );
        self::localLog($paramsIn);
    }

    public static function logError($log,$errno=null,$fileName=null,$line=0,$funName=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        self::log2($log,self::LOG_LEVEL_ERROR,$fileName,$line,$funName,$errno,$cmd,$subCmd,$version,$userDef2,$userDef3,$userDef4);
    }

    public static function logWarning($log,$errno=null,$fileName=null,$line=0,$funName=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        self::log2($log,self::LOG_LEVEL_WARNING,$fileName,$line,$funName,$errno,$cmd,$subCmd,$version,$userDef2,$userDef3,$userDef4);
    }

    public static function logNotice($log,$errno=null,$fileName=null,$line=0,$funName=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        self::log2($log,self::LOG_LEVEL_NOTICE,$fileName,$line,$funName,$errno,$cmd,$subCmd,$version,$userDef2,$userDef3,$userDef4);
    }

    public static function logInfo($log,$errno=null,$fileName=null,$line=0,$funName=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        self::log2($log,self::LOG_LEVEL_INFO,$fileName,$line,$funName,$errno,$cmd,$subCmd,$version,$userDef2,$userDef3,$userDef4);
    }

    public static function logDebug($log,$errno=null,$fileName=null,$line=0,$funName=null,$cmd=null,$subCmd=null,$version=null,$userDef2=null,$userDef3=null,$userDef4=null){
        self::log2($log,self::LOG_LEVEL_DEBUG,$fileName,$line,$funName,$errno,$cmd,$subCmd,$version,$userDef2,$userDef3,$userDef4);
    }
    public static function localLog($params){
        $logLevel = array(
            1=>'ERROR',
            2=>'WARNING',
            3=>'NOTICE',
            4=>'INFO',
            5=>'DEBUG'
        );

        $logStr = "[" . date("Y-m-d H:i:s") . "][{$logLevel[$params['loglevel']]}]"
            . "[{$params['funName']}][line:{$params['line']}]"
            . "[r:{$params['errno']}]:{$params['log']} \n";

        $fileName = $params['fileName'] ? $params['fileName'] : 'LOCALDEFAULT';
        $file = self::$config['locallog_path'] . "$fileName.log";
        error_log($logStr,3,$file);
    }
}

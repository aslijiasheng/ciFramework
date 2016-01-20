<?php
class CBean{

    public function isValidata(){
        $isValidata = $this->_isValidata;//规则验证
        $mapSetting = $this->_mapSetting;//映射转换
        $ret = array('succ' => TRUE, 'msg' => '');//返回结果
        foreach($isValidata as $mapping){
            $mapField = $mapping[0];//字段名
            $ruleMapping = self::ruleMapping($mapping);//获取所需要的mapping
            //忽略
            if($ruleMapping['ingore']) continue;
            //是否为空
            if($ruleMapping['required']){
                if(empty($this->{$mapSetting[$mapField]})){
                    $ret['succ'] = FALSE;
                    $ret['msg'][] = BaseError::FIELD_EMPTY;
                }
            }
            //长度
            if(mb_strlen($this->{$mapSetting[$mapField]}) > $ruleMapping['length']) $this->{$mapSetting[$mapField]} = mb_substr($this->{$mapSetting[$mapField]}, 0, $ruleMapping['length'], "UTF-8");
            //正则过滤
            if(!empty($ruleMapping['regex'])){
                $this->{$mapSetting[$mapField]} = preg_match($ruleMapping['regex'], $this->{$mapSetting[$mapField]}) ? $this->{$mapSetting[$mapField]} : '';
            }
            //formating
            if(!empty($ruleMapping['formating'])){
                $this->{$mapSetting[$mapField]} = date($ruleMapping['formating'], $this->{$mapSetting[$mapField]});
            }
        }
        return $ret;
    }

    /**
     * ruleMapping 
     * 定义默认mapping
     * @param mixed $mapping 
     * @access private
     * @return void
     */
    private static function ruleMapping($mapping){
        $mappingType = $mapping['type'];//字段类型
        switch($mappingType){
            case 'string':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'string',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 20,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                );
                break;
            case 'numerical':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'numerical',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 10,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                );
                break;
                break;
            case 'boolean':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'boolean',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 1,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                );
                break;
            case 'date':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'date',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 10,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                    'formating'           => 'Y-m-d',
                );
                break;
            case 'datetime':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'datetime',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 20,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                    'formating'           => 'H:i:s',
                );
                break;
            case 'timestamp':
                return array(
                    'required'            => isset($mapping['required']) ? $mapping['required'] : TRUE,
                    'ingore'              => isset($mapping['ingore']) ? $mapping['ingore'] : FALSE,
                    'type'                => 'timestamp',
                    'length'              => isset($mapping['length']) ? $mapping['length'] : 20,
                    'regex'               => isset($mapping['regex']) ? $mapping['regex'] : '',
                );
                break;
            }
    }

}

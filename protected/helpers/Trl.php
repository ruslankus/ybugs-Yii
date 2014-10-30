<?php
/**
 * Labels and messages translation
 */
class Trl
{
    private static $_instanse = false;   
    private $_arrLabels = array();
    
    public static function t(){
        if(!self::$_instanse){
            self::$_instanse = new self();
        }
        return self::$_instanse;
    }
    
    private function __construct() {
        $currLng = Yii::app()->language;
        $this->_arrLabels = ExtLabels::model()->getLabels($currLng);
    }
        
    private function __clone(){}
    
    public function getLabel($labelName)
    {
        if(array_key_exists($labelName,$this->_arrLabels)){
            return $this->_arrLabels[$labelName];
        }else{
            return $labelName;  
        }
    }
 
    
}






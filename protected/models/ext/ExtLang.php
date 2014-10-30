<?php 

class ExtLang extends Languages
{
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    
    public function getAllLang($currLng = 'en') {
        
       $sql = "SELECT * FROM languages lng WHERE lng.prefix <> :currLang";
       $params = array(':currLang' => $currLng);
       
       $con = $this->dbConnection;
       $data=$con->createCommand($sql)->queryAll(true,$params);
       
       return $data;
    }//getAllLang
    
    
    public function getCurrLng(){}
    
}//ExtLng
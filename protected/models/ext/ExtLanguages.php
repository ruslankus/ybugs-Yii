<?php
class ExtLanguages extends Languages 
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
        
    }//model
    
    
    public function getLabels($lng){
        $sql = "SELECT t1.id,t2.label,t1.value FROM labels_trl t1
            JOIN labels t2 ON t1.label_id = t2.id
            JOIN languages t3 ON t1.language_id = t3.id
        WHERE t3.prefix = :prefix";
        
        $param[':prefix'] = $lng;
        $con = $this->dbConnection;        
        $retData = $con->createCommand($sql)->queryAll(true,$param);
        
        return $retData;        
    }//getLabels
    
    public function selectArray(){
        $sql = "SELECT t1.prefix,t1.name FROM languages t1";
        
        $con = $this->dbConnection;
        $arrData = $con->createCommand($sql)->queryAll();
        $retData[''] = Trl::t()->getLabel('Select language');
       
        foreach($arrData as $item){
            $retData[$item['prefix']] = $item['name'];       
        }
        
        return $retData;       
    }//selectArray 
    
    
}
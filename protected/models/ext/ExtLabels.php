<?php
Class ExtLabels extends Labels
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getLabels($currLng) {
        
      $arrLabels = array();
      $sql = "SELECT labels.label , labels_trl.value FROM labels
                JOIN labels_trl,languages
                WHERE labels.id = labels_trl.label_id 
                    AND labels_trl.language_id = languages.id
                    AND languages.prefix = :prefix";
        
        $params[':prefix'] = $currLng;
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll(true,$params);
        
        foreach($data as $row){
            $arrLabels[$row['label']] = $row['value'];
        }
        
        return $arrLabels;
    }//getLabels
    
       
}
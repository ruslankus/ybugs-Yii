<?php
class ExtMessage extends Message
{
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getMessage($currLang)
    {
      $arrMessages = array();
      
      $sql = "SELECT message.text,message_trl.translation FROM message
                JOIN message_trl,languages
                    WHERE message.id = message_trl.message_id
                    AND languages.id = message_trl.language_id
                    AND languages.prefix = :prefix";
                    
        $params[':prefix'] = $currLang;
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll(true,$params);
        
        foreach($data as $row){
            $arrMessages[$row['text']] = $row['translation'];
        }
        
        return $arrMessages;              
    }//getMessage
    
}
<?php
class ExtUsers extends Users
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function getUser($id){
        $sql = "SELECT users.name FROM users
            WHERE users.id = " . (int)$id;
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryRow();
        
        return $data;
    }
}

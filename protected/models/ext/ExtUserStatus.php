<?php
class ExtUserStatus extends UserStatus
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * @return @array roles
     */
    public function getAllStatuses($id){
        
        $sql = "SELECT u.name, u.surname, u.status, u.id FROM users u
	WHERE u.id = ".(int)$id; 
        $con = $this->dbConnection;
        $userData = $con->createCommand($sql)->queryRow();
       
        $sql = "SELECT * FROM user_status";                
        $dataStatuses=$con->createCommand($sql)->queryAll();
        
        $userData['statuses'] = $dataStatuses;
       
        return $userData;
        
    }
    
}
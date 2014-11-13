<?php 
class ExtUserRoles extends \UserRoles {
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * @return @array roles
     */
    public function getAllRoles($id){
        
        $sql = "SELECT u.name, u.surname, u.role, u.id FROM users u
	WHERE u.id = ".(int)$id; 
        $con = $this->dbConnection;
        $userData = $con->createCommand($sql)->queryRow();
       
        $sql = "SELECT * FROM user_roles";                
        $dataRoles=$con->createCommand($sql)->queryAll();
        
        $userData['roles'] = $dataRoles;
        
        return $userData;
    }
    
    
}
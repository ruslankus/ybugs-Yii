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
    
    
    /**
     * Function to get User Role
     * @param 
     */
    public function getUserRole($id){
        $sql = "SELECT t1.name,t1.surname,t1.role AS role_id, t2.name AS role_name
            FROM users t1
            JOIN user_roles t2 ON t1.role = t2.id
            WHERE  t1.id = ".(int)$id;
            
        $con = $this->dbConnection;
        $retData = $con->createCommand($sql)->queryRow();
        
        return $retData;     
    }
    
    
    
    
}
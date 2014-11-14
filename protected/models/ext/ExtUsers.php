<?php
class ExtUsers extends Users
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function getUser($id){
        $sql = "SELECT users.name,users.id FROM users
            WHERE users.id = " . (int)$id;
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryRow();
        
        return $data;
    }
    
    
    public function getAllUsers(){
        $sql = "SELECT users.id, users.login, users.email,users.name, users.surname,
        users.role as role_id, user_roles.name as role, user_status.status
            FROM users
            JOIN user_roles ON users.role = user_roles.id
            JOIN user_status ON users.status = user_status.id";
            
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll();
        
        return $data;
    }
    
    public function getUserRoles(){
        $sql = "SELECT * FROM user_roles";
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll();
        $arrSelect = array('' => Trl::t()->getLabel('Select role'));
        foreach ($data as $row){
            $arrSelect[$row['id']] = $row['name'];
        }
        
        return $arrSelect;
    }
}


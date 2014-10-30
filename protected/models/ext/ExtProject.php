<?php
class ExtProject extends Projects
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getProjects($user){
        
        if($user == 1){
            $sql = "SELECT * FROM projects";
        }else{
            
            $sql = "SELECT projects.* FROM projects_to_users pr_to_us
                        JOIN projects
                        WHERE pr_to_us.project_id = projects.id
                        AND pr_to_us.user_id = ".(int)$user;              
        }
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll();
        
        return $data;
    }//getProjects    
    
    
}



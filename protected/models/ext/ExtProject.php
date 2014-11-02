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
    
    
    public function getProject($id){
        
        $sql = "SELECT *, 
	CONCAT(issues.description) as issues
            FROM projects pr
            JOIN issues
            ON issues.project_id = pr.id
            WHERE pr.id = ".(int)$id;
	
        $con = Yii::app()->bugs_db;
        $data=$con->createCommand($sql)->queryAll();
        Debug::d($data);
        return $data;
    }
    
    
}



<?php
class ExtProject extends Projects
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getProjects($user_id, $role = 1){
        
        if($role == 3){
            $sql = "SELECT * FROM projects";
        }else{
            
            $sql = "SELECT pr_to_us.id as rel_id, projects.* FROM projects_to_users pr_to_us
                        JOIN projects ON pr_to_us.project_id = projects.id
                        WHERE pr_to_us.user_id = ".(int)$user_id;  
                                    
        }
        
        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll();
        
        return $data;
    }//getProjects
    
    
    public function getAllProjects(){
            
         $sql = "SELECT * FROM projects";
         
        $con = $this->dbConnection;
        $retData=$con->createCommand($sql)->queryAll();
        
        return $retData;
    }
    
    
    public function getProject($id){
        
        $sql = "SELECT *	
            FROM projects pr             
            WHERE pr.id = ".(int)$id;
	
        $con = $this->dbConnection;
        //getting projects array
        $dataPrj=$con->createCommand($sql)->queryRow();
        
        $sql = "SELECT iss.description,iss.title,iss.id,
            st.name AS status, st.class_name as status_class, usr.name AS fname,
            usr.surname AS lname,prio.name as prio
            FROM issues iss
            JOIN statusses st ON iss.status_id = st.id
            JOIN users usr ON iss.user_id = usr.id
            JOIN prio ON iss.prio_id = prio.id
            WHERE iss.project_id = ".(int)$id . " ORDER BY iss.id DESC";
        
        //getting issues array
        $dataIss=$con->createCommand($sql)->queryAll();
        $dataPrj['issues'] = $dataIss;
        
        return $dataPrj;
    }
    
    
    public function getPrjName($id){
        
        $sql = "SELECT t1.name, t1.id	
            FROM projects t1             
            WHERE t1.id = ".(int)$id;
        
        $con = $this->dbConnection;
        //getting projects array
        $retData=$con->createCommand($sql)->queryRow();
        
        return $retData;
    }
    
    
}



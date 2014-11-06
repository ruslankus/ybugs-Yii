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
        
        $sql = "SELECT *	
            FROM projects pr             
            WHERE pr.id = ".(int)$id;
	
        $con = $this->dbConnection;
        //getting projects array
        $dataPrj=$con->createCommand($sql)->queryRow();
        
        $sql = "SELECT iss.description,iss.title,iss.id,
            st.name AS status, st.class_name as status_class, usr.name AS fname,
            usr.surname AS lname
            FROM issues iss
            JOIN statusses st ON iss.status_id = st.id
            JOIN users usr ON iss.user_id = usr.id
            WHERE iss.project_id = ".(int)$id;
        //getting issues array
        $dataIss=$con->createCommand($sql)->queryAll();
        $dataPrj['issues'] = $dataIss;
        
        return $dataPrj;
    }
    
    
}



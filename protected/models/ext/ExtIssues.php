<?php
class ExtIssues extends Issues 
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
        
    }//model
    
    
    public function getIssue($id = null){
        
        $sql = "SELECT iss.title, iss.description, prj.name as project_name, users.name as fname,
        users.surname as lname, statusses.name as status, statusses.class_name,iss.id,
        prio.name as prio,iss.picture
            FROM issues iss
            JOIN projects prj ON iss.project_id = prj.id
            JOIN users ON iss.user_id = users.id
            JOIN statusses ON iss.status_id = statusses.id
			JOIN prio ON iss.prio_id = prio.id
            WHERE iss.id = ".(int)$id;
        
        $con = $this->dbConnection;
        //getting projects array
        $dataIssue=$con->createCommand($sql)->queryRow();
        
        $sql = "SELECT res.*, users.name as fname, users.surname as lname
            FROM resolutions res
            JOIN users ON users.id = res.user_id
            WHERE issue_id = " . (int)$id;
    
        $dataReslt = $con->createCommand($sql)->queryAll();
        
        $dataIssue['reslt'] = $dataReslt;
        return $dataIssue;      
    }//getIssue
    
    
    public function getIssueForAddRes($id = null){
        
        $sql = "SELECT iss.title,iss.description,projects.name as project
            FROM issues iss
            JOIN projects ON projects.id = iss.project_id
            WHERE iss.id = " .(int)$id;
           
        $con = $this->dbConnection;
        //getting projects array
        $dataIssue = $con->createCommand($sql)->queryRow();
        return $dataIssue;
    }
}

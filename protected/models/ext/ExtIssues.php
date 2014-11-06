<?php
class ExtIssues extends Issues 
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
        
    }//model
    
    
    public function getIssue($id = null){
        
        $sql = "SELECT iss.title, iss.description, prj.name as project_name, users.name as fname,
        users.surname as lname, statusses.name as status, statusses.class_name
            FROM issues iss
            JOIN projects prj ON iss.project_id = prj.id
            JOIN users ON iss.user_id = users.id
            JOIN statusses ON iss.status_id = statusses.id
            WHERE iss.id = ".(int)$id;
        
        $con = $this->dbConnection;
        //getting projects array
        $dataIssue=$con->createCommand($sql)->queryRow();
        
        $sql = "SELECT res.remark, res.date, res.id, users.name, users.surname
	FROM resolutions res
	JOIN users ON res.id = users.id
	WHERE res.issue_id = " . (int)$id;
        
        $dataReslt = $con->createCommand($sql)->queryAll();
        
        $dataIssue['reslt'] = $dataReslt;
        return $dataIssue;      
    }//getIssue
}

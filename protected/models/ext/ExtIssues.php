<?php
class ExtIssues extends Issues 
{
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
        
    }
    
    public function getIssue($id = null){
        
        $sql = "SELECT iss.title, iss.description, prj.name as project_name, users.name as create_user,
        statusses.name as status
            FROM issues iss
            JOIN projects prj ON iss.project_id = prj.id
            JOIN users ON iss.user_id = users.id
            JOIN statusses ON iss.status_id = statusses.id
            WHERE iss.id = ".(int)$id;
        
        $con = $this->dbConnection;
        //getting projects array
        $dataIssue=$con->createCommand($sql)->queryRow();
        
        return $dataIssue;      
    }
}

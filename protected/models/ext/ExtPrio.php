<?php

class ExtPrio extends Prio 
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function getSelectOpt()
    {
        $sql = "SELECT * FROM prio";

        $con = $this->dbConnection;
        $data=$con->createCommand($sql)->queryAll();
        $arrSelect = array('' => Trl::t()->getLabel('Select priority'));
        foreach ($data as $row){
            $arrSelect[$row['id']] = $row['name'];
        }
        
        return $arrSelect;
    }
            
}

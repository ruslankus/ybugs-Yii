<?php 
class ExtLang extends Languages
{
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    
    public function getAllLang() {
        
        Debug::d();
    }
    
}//ExtLng
  <?php

class AsideMenu extends CWidget
{

    public function run()
    {
        $prefix_lng = Yii::app()->language;
        
        $user_id = Yii::app()->user->id;        
        $user_role = Yii::app()->user->role;
       
        $arrData = ExtProject::model()->getProjects($user_id, $user_role); 
        
        $this->render('aside_menu',array('prefix_lng' => $prefix_lng,'arrData' => $arrData));
    }
}

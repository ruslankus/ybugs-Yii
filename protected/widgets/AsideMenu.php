  <?php

class AsideMenu extends CWidget
{

    public function run()
    {
        $prefix_lng = Yii::app()->language;
        
        $user = Yii::app()->user;
        
        $arrData = ExtProject::model()->getProjects($user); 
        
        $this->render('aside_menu',array('prefix_lng' => $prefix_lng,'arrData' => $arrData));
    }
}

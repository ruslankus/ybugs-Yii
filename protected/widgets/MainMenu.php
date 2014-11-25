<?php


class MainMenu extends CWidget {

    public function run()
    {

        $controller_id = Yii::app()->controller->id;

        //Menu array
        $menu=array(
            array('name' => 'projects', 'controller' => 'projects', 'action' => 'index', 'roles' => array(1,2,3)),
            //array('name' => 'issues', 'controller' => 'issues', 'action' => 'index', 'roles' => array(1,2,3)),
            //array('name' => 'resolutions', 'controller' => 'resolutions', 'action' => 'index', 'roles' => array(1,2,3)),
             array('name' => 'user', 'controller' => 'users', 'action' => 'index', 'roles' => array(3)),
            array('name' => 'settings', 'controller' => 'languages', 'action' => 'index', 'roles' => array(3)),
           
            
        );

        $this->render('main_menu',array('menu' => $menu, 'controller_id' => $controller_id));
    }
}
?>
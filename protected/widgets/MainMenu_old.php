<?php


class MainMenu extends CWidget {

    public function run()
    {

        $controller_id = Yii::app()->controller->id;

        //Menu array
        $menu=array(
            array('name' => 'Users', 'controller' => 'users', 'action' => 'index', 'roles' => array(3)),
            array('name' => 'Language settings', 'controller' => 'languages', 'action' => 'index', 'roles' => array(3)),
            array('name' => 'Logout', 'controller' => 'main', 'action' => 'logout', 'roles' => array(1,2,3)),

            array('name' => 'Projects', 'controller' => 'projects', 'action' => 'index', 'roles' => array(1,2,3)),
            array('name' => 'Issues', 'controller' => 'issues', 'action' => 'index', 'roles' => array(1,2,3)),
            array('name' => 'Resolutions', 'controller' => 'resolutions', 'action' => 'index', 'roles' => array(1,2,3))
        );

        $this->render('main_menu',array('menu' => $menu, 'controller_id' => $controller_id));
    }
}
?>
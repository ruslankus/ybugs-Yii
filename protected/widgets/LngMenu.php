<?php

class LngMenu extends CWidget
{

    public function run()
    {
        $current_lng = Yii::app()->language;
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->controller->action->id;

        //$languages = Languages::model()->findAllByAttributes(array('status' => 1));
        $lang = ExtLang::model()->getAllLang();
        
        $this->render('lng_menu',array('languages' => $languages, 'current' => $current_lng, 'controller' => $controller, 'action' => $action, 'params' => $_GET));
    }
}

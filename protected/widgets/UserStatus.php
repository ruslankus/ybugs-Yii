<?php

class UserStatus extends CWidget
{

    public function run()
    {
        $prefix_lng = Yii::app()->language;
        $user = Yii::app()->user->id;
        $arrData = ExtUsers::model()->getUser($user);
        
        $this->render('user_status',array('prefix_lng' => $prefix_lng,'arrData' => $arrData));
    }
}
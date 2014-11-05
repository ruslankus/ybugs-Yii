<?php

class MainController extends Controller
{
    /**
     * Entry point
     */
    public function actionIndex()
    {
        $prefix_lng = Yii::app()->language;
        $userId = Yii::app()->user->id;
        $arrData = ExtProject::model()->getProjects($userId);
        
        $this->render('index',array('arrData' => $arrData,'prefix_lng' => $prefix_lng));
    }

    /**
     * Renders login form, and authenticates user
     */
    public function actionLogin()
    {
        //set titles
        $this->title = 'Please login';

        //redefine layout
        $this->layout = '//layouts/login_layout';

        //if logged in - redirect to index
        if(!Yii::app()->user->isGuest){$this->redirect($this->createUrl('main/index'));}

        //create validation from-model object
        $validation= new LoginForm();

        //if post request
        if($_POST['LoginForm'])
        {
            //set all parameters from post
            $validation->attributes = $_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            if($validation->validate() && $validation->login())
            {
                $this->redirect('index');
            }
        }

        $this->render('login',array('model'=>$validation));
    }

    /**
     * Does logout and redirects
     */
    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->createUrl('/main/index'));
    }

}
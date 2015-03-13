<?php

class UsersController extends Controller
{
    /**
     * Entry
     */
    public function actionIndex()
    {
        $this->actionList();
    }

    /**
     * List all users
     * @param int $id role ID
     * @throws CHttpException
     */
    public function actionList()
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }
            
        $lang_prefix = Yii::app()->language;    
        //get all users filtered by role
        $users_arr = ExtUsers::model()->getAllUsers();
        
        //render
        $this->render('list',array('users' => $users_arr, 'lang_prefix' => $lang_prefix));
    }


    /**
     * Deletes user by id
     * @param $id
     * @throws CHttpException
     */
    public function actionDelete($id)
    {
        /* @var $user Users */

        //try find user by ID
        $user = Users::model()->findByPk($id);

        //if not admin, or user not found - no access
        if(Yii::app()->user->getState('role') != 3 || empty($user))
        {
            throw new CHttpException(404);
        }

        //suspended role
        $user->status = 4;
        $user->update();

        //list
        $this->redirect(Yii::app()->createUrl('/users/list'));
    }

    /**
     * Restores user by id
     * @param $id
     * @throws CHttpException
     */
    public function actionRestore($id)
    {
        /* @var $user Users */

        //try find users by ID
        $user = Users::model()->findByPk($id);

        //if not admin, or user not found - no access
        if(Yii::app()->user->getState('role') != 3 || empty($user))
        {
            throw new CHttpException(404);
        }

        //suspended role
        $user->status = 1;
        $user->update();

        //list
        $this->redirect(Yii::app()->createUrl('/users/list'));
    }//action restore
    
    
    /**
     * Function for adding project to user
     * @param $id - int User Id
     */
    public function actionAddPrj($id){
        
        $request = Yii::app()->request;
       
        $lang_prefix = Yii::app()->language;
        
        if($request->isPostRequest){
            
           
            $project_id = $request->getPost('prj_id');
            $objPrjToUsr = new ProjectsToUsers();
            $objPrjToUsr->user_id = $id;
            $objPrjToUsr->project_id = $project_id;
            $objPrjToUsr->save();
            
             $this->redirect(array('addprj','id'=>$id)); 
        }
        
        $userData = ExtUserRoles::model()->getUserRole($id);
        //if user admin
        if($userData['role_id'] == 3){
            
            $this->render('user_admin',array('lang_prefix' => $lang_prefix,'userData' => $userData));
        }else{            
            $arrAllPrj = ExtProject::model()->getAllProjects();
            $arrUsrPrj = ExtProject::model()->getProjects($id);
               
            $this->render('add_project_to_user',array('arrAllPrj' => $arrAllPrj,'lang_prefix' => $lang_prefix,'user_id' => $id,
            'arrUsrPrj' => $arrUsrPrj, 'userData' => $userData));
        }
          
        
        
    }
    
    
    /**
     * Function for deleting relation user-project
     * @param $id Relation Id;
     */
    public function actionRemPrj($id){
        $objPrj = ProjectsToUsers::model()->findByPk((int)$id);
        if(!empty($objPrj)){
            $user_id = $objPrj->user_id;
            $objPrj->delete();
            
            $this->redirect(array('addprj','id'=>$user_id));
        }
    }


    /**
     * Renders edit form and updates user
     * @param int $id
     * @throws CHttpException
     */
    public function actionEdit($id)
    {
        /* @var $user Users */

        //try find user by ID
        $user = Users::model()->findByPk($id);
       
        //form validator
        $form = new UserForm();

        //array of roles
        $roles = UserRoles::model()->arrayForListing();

        //if post given
        if($_POST['UserForm'])
        {
            //get attributes from post
            $form->currently_updating_user_id = $user->id;
            $form->attributes = $_POST['UserForm'];

            //if valid form
            if($form->validate())
            {
                //create new user
                $old_password = $user->password; //store old password
                $user -> attributes = $form->attributes; //set attributes from form to user

                //if new password was set
                if($_POST['UserForm']['password'] != '')
                {
                    //encode new password to md5 and set to user
                    $user->password = md5($_POST['UserForm']['password']);
                }
                //if no new password
                else
                {
                    //set old password(already in md5)
                    $user->password = $old_password;
                }

                //update
                $user -> update();

                //redirect to list
                $this->redirect(Yii::app()->createUrl('/users/list'));
            }
        }

        //render form
        $this->render('edit_user',array('form_mdl' => $form, 'roles' => $roles, 'user' => $user));

    }

    /**
     * Renders form and creates new user
     * @throws CHttpException
     */
    public function actionAdd()
    {
        $lang_prefix = Yii::app()->language;
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        //form validator
        $form = new UserForm();

        //array of roles
        $roles = ExtUsers::model()->getUserRoles();
       
        //if post given
        if($_POST['UserForm'])
        {
           
            //get attributes from post
            $form->attributes = $_POST['UserForm'];

            //if valid form
            if($form->validate())
            {
                //create new user
                $user = new Users();
                $user -> attributes = $form->attributes;
                $pass = 'user1234';
                $user -> password = md5($pass); //encode password to md5               
                $user -> status = 1;                
                $user -> save();

                // send login data to user by mail

                $message = "Login: ".$user -> login."\nPassword: ".$pass;
                $to = $user -> email;
                $subject = "New user";
                $headers = "From: yii-bugs@local.com";
                mail($to,$subject,$message,$headers);
                /*
                $mail=Yii::app()->Smtpmail;
                $mail->SetFrom($from, 'Info');
                $mail->Subject    = $subject;
                $mail->MsgHTML($message);
                $mail->AddAddress($to, "");
                if(!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else {
                    echo "Message sent!";
                }
                */

                //redirect to list

                //$this->redirect(Yii::app()->createUrl('/users/list'));
            }
        }

        //render form
        $this->render('add_user',array('form_mdl' => $form, 'roles' => $roles,'lang_prefix' => $lang_prefix));
    }//actionAdd
    
    public function actionChangeRole($id){
        
        $objUser = Users::model()->findByPk((int)$id);
        if(!empty($objUser)){
            $objUser->role = (int)$_POST['role'];
            $objUser->update();
            
             $this->redirect('/users/list');
        }
    }//actionChangeRole
    
    
    public function actionChangeStatus($id){
        $objUser = Users::model()->findByPk((int)$id);
        if(!empty($objUser)){
            $objUser->status = (int)$_POST['status'];
            $objUser->update();  
            
            $this->redirect('/users/list');
        }

    }//actionChangeStatus
    
    
    public function actionChUserRole($id = null ){
        $request = Yii::app()->request;
        if($request->isAjaxRequest){
            $id = $request->getPost('id');
            $lang_prefix = Yii::app()->language;
            $userData = ExtUserRoles::model()->getAllRoles($id);
        
            $page = $this->renderPartial('_change_role',array('userData' => $userData,
                                        'lang_prefix' => $lang_prefix),true);
            echo $page;
        }else{
            throw new CHttpException('404');
        }
    }//actionChUserRoles
    
    
    public function actionChUserStatus($id = null ){
        $request = Yii::app()->request;
        if($request->isAjaxRequest){
            $id = $request->getPost('id');
            $lang_prefix = Yii::app()->language;
            $userData = ExtUserStatus::model()->getAllStatuses($id);
            
            $page = $this->renderPartial('_change_status',array('userData' => $userData,
                                         'lang_prefix' => $lang_prefix),true);
            echo $page;
        }
        
    }//actionChUserStatus
    
    public function actionChUserDelete($id = null){
        $request = Yii::app()->request;
        $lang_prefix = Yii::app()->language;
        if($request->isAjaxRequest){
            $id = $request->getPost('id');
             $userData = ExtUserStatus::model()->getAllStatuses($id);
            
             $page = $this->renderPartial('_delete_user',array('userData' => $userData,'lang_prefix' => $lang_prefix));
             echo $page;
             exit();
        }
        
        $objUser = Users::model()->findByPk($id);       
        $objUser->delete();
        
        $this->redirect('/users/list');
    }// actionChUserDelete
    
    
    

}

?>
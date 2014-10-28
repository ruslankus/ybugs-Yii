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
    public function actionList($id = null)
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        //get all users filtered by role
        $users_arr = Users::model()->getArrayByRole($id,null);

        //render
        $this->render('list',array('users' => $users_arr));
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

        //if not admin, or user not found - no access
        if(Yii::app()->user->getState('role') != 3 || empty($user))
        {
            throw new CHttpException(404);
        }

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
        $this->render('edit',array('form_mdl' => $form, 'roles' => $roles, 'user' => $user));

    }

    /**
     * Renders form and creates new user
     * @throws CHttpException
     */
    public function actionAdd()
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        //form validator
        $form = new UserForm();

        //array of roles
        $roles = UserRoles::model()->arrayForListing();

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
                $user -> password = md5($form->password); //encode password to md5
                $user -> save();

                //redirect to list
                $this->redirect(Yii::app()->createUrl('/users/list'));
            }
        }

        //render form
        $this->render('add',array('form_mdl' => $form, 'roles' => $roles));
    }

}

?>
<?php

class ProjectsController extends Controller
{
    /**
     * Entry
     */
    public function actionIndex()
    {
        $this->actionList();
    }

    /**
     * List all items
     */
    public function actionList()
    {
       $prefix_lng = Yii::app()->language;
        $user_id = Yii::app()->user->id;
        $user_role = Yii::app()->user->role;
        
        $arrData = ExtProject::model()->getProjects($user_id,$user_role);
        
        $this->render('/main/index',array('arrData' => $arrData,'prefix_lng' => $prefix_lng,'role' => $user_role));
    }


    /**
     * Adds new project (renders form and adds to base)
     * @throws CHttpException
     */
    public function actionAdd()
    {
         $prefix_lng = Yii::app()->language;
        //If user not admin - no access for this page
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        $form = new ProjectForm();

          

        if($_POST['ProjectForm'])
        {
            $form->attributes = $_POST['ProjectForm'];

            if($form->validate())
            {
                //get all attributes from form (or POST)
                $name = $form->name;
                $description = $form->description;
                $developers_arr = $form->developers;
                $users_arr = $form->users;

                //create new project
                $project = new Projects();
                $project -> name = $name;
                $project -> description = $description;
                $project -> status = 1; //Visible
                $saved = $project -> save();

                

                //go back to list
                $this->redirect('list');
            }
        }

        $this->render('add',array('form_mdl' => $form, 'users' => $users, 'developers' => $developers,
                        'prefix_lng' => $prefix_lng));
    }//add

    /**
     * Deletes project and relations with users
     * @param int $id
     * @throws CHttpException
     */
    public function actionDel($id)
    {
        $prefix_lng = Yii::app()->language;
        
        $request = Yii::app()->request;
        
        if($request->isAjaxRequest){
            
            $prjData = ExtProject::model()->getPrjName($id);
            
            $data = $this->renderPartial('_delete_project_modal',array('prjData' => $prjData, 
                        'lang_prefix' => $prefix_lng));
            echo $data;
            exit();
        }else{
            
            $objPrj = ExtProject::model()->findByPk($id);
            $objPrj->delete();
            
            $this->redirect(array('list'));
        }
    }    

}

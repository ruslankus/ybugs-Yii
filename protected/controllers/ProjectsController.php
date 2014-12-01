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
    }

    /**
     * Deletes project and relations with users
     * @param int $id
     * @throws CHttpException
     */
    public function actionDel($id)
    {
        /* @var $project Projects */
        /* @var $relations ProjectsToUsers[] */

        //find project by id
        $project = Projects::model()->findByPk($id);

        //if project found ad user has access to delete
        if(!empty($project) && Yii::app()->getUser()->getState('role') != 1)
        {
            //firstly - delete all relations with users (developers and testers)
            $relations = ProjectsToUsers::model()->findAllBySql('SELECT * FROM '.ProjectsToUsers::model()->tableName().' WHERE project_id = '.$project->id);
            foreach($relations as $relation)
            {
                $relation->delete();
            }

            //secondly - delete project
            $project->deleteAllIssuesAndResolutionsOfProject();
            $project->delete();

            //go back to list
            $this->redirect(Yii::app()->createUrl('/projects/list'));
        }
        else
        {
            throw new CHttpException(404);
        }
    }
}

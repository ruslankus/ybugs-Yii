<?php

class IssuesController extends Controller
{
    /**
     * Entry
     */
    public function actionIndex()
    {
        $this->actionList();
    }

    /**
     * Lists all issues
     * @param int $id
     */
    public function actionList($id = null)
    {
        $prefix_lng = Yii::app()->language;
        if(!empty($id)){
            
            $arrPrj = ExtProject::model()->getProject($id); 
            
            $this->render('list',array('arrPrj' => $arrPrj,'prefix_lng' => $prefix_lng));

        }

        
        //render list
    }
    
    
    public function actionGetissue($id = null){
          
         $prefix_lng = Yii::app()->language;
         $arrIssue = ExtIssues::model()->getIssue($id);
         
         Debug::d($arrIssue);
    }


    /**
     * @param null $id
     * @throws CHttpException
     */
    public function actionAdd($id = null)
    {
        /* @var $project Projects */

        //if id not got from GET
        if($id == null)
        {
            //get from POST
            $id = Yii::app()->request->getPost('id',null);
        }

        //find project by id
        $project = Projects::model()->findByPk($id);

        //if project exist
        if(!empty($project))
        {
            //create new validator form
            $form = new IssueForm();

            //if got POST
            if($_POST['IssueForm'])
            {
                //get attributes
                $form->attributes = $_POST['IssueForm'];

                //if valid data given
                if($form->validate())
                {
                    //create new issue
                    $issue = new Issues();
                    $issue -> project_id = $project->id;
                    $issue -> user_id = Yii::app()->user->id;
                    $issue -> status_id = 5; //new
                    $issue -> description = $form->description;
                    $issue -> date = time();
                    $saved = $issue -> save();

                    //if saved
                    if($saved)
                    {
                        //get uploaded files
                        $files = CUploadedFile::getInstances($form,'files');

                        //for each file
                        foreach($files as $index => $file_obj)
                        {
                            //if file exist
                            if($file_obj->size > 0)
                            {
                                //generate new name for it
                                $new_name = uniqid('issue_').'.'.$file_obj->extensionName;

                                //if saved
                                if($file_obj->saveAs('images/uploaded/'.$new_name))
                                {
                                    //set file-name to issue
                                    $issue->picture = $new_name;
                                    $issue->update();
                                }
                            }
                        }
                    }

                    //redirect to list of issues filtered by project
                    $this->redirect(Yii::app()->createUrl('/issues/list/',array('id' => $project->id)));
                }
            }

            //render form
            $this->render('add',array('form_mdl' => $form, 'project' => $project));
        }

        //if project not exist
        else
        {
            //exception 404
            throw new CHttpException(404);
        }
    }
}
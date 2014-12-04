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

      
    } //render list
    
    
    public function actionDelRes($id){
        $prefix_lng = Yii::app()->language;
        $request = Yii::app()->request;
        
        if($request->isAjaxRequest){
            $issue = $request->getPost('issue');
            $data = $this->renderPartial('_delete_res',array('res_id' => $id, 
                    'prefix_lng' => $prefix_lng, 'issue' => $issue),true);
            echo $data;
            exit();
        }else{
            $issue = $request->getPost('issue');
            $objRes = Resolutions::model()->findByPk($id);
            $objRes->delete();
            
            $this->redirect(array('getissue','id' => $issue));
        }
    }


    
    public function actionGetissue($id = null){
          
         $prefix_lng = Yii::app()->language;
         $user_id = Yii::app()->user->id;
         $userData = ExtUserRoles::model()->getUserRole($user_id);
         
         $arrIssue = ExtIssues::model()->getIssue($id);
         
         $this->render('get_issue',array('arrIssue' => $arrIssue,'prefix_lng' => $prefix_lng,
                       'userData' => $userData ));
    }


    /**
     * @param null $id
     * @throws CHttpException
     */
    public function actionAdd($id = null)
    {
         
        //find project by id
        $project = Projects::model()->findByPk((int)$id);
        $arrSelect = ExtPrio::model()->getSelectOpt();    
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
                    $issue->attributes = $form->attributes;
                    $issue -> project_id = $project->id;
                    $issue -> user_id = Yii::app()->user->id;
                    $issue -> status_id = 5; //new
                    $issue -> description = $form->description;                     
                    $issue -> date = time();
                    $saved = $issue -> save();
                    
                    //get uploaded file
                    $file = CUploadedFile::getInstance($form,'files');
                   
                    //if saved
                    if($saved && !empty($file))
                    {
                         //generate new name for it
                        $new_name = uniqid('issue_').'.'.$file->extensionName;
                       
                        //if saved
                        if($file->saveAs('images/uploaded/'.$new_name))
                        {
                            //set file-name to issue
                            $issue->picture = $new_name;
                            $issue->update();
                        }
                      
                    }

                    //redirect to list of issues filtered by project
                    $this->redirect(Yii::app()->createUrl('/issues/list/',array('id' => $project->id)));
                }
            }//if($_POST['IssueForm'])

            //render form
            $this->render('add',array('form_mdl' => $form, 'project' => $project,'arrSelect' => $arrSelect));
        }            
        else
        {
            //exception 404
            throw new CHttpException(404);
        }//if project not exist
    }
}
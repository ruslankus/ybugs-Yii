<?php

class ResolutionsController extends Controller
{
    /**
     * Entry
     */
    public function actionIndex()
    {
        $this->actionList();
    }

    /**
     * Lists all resolutions
     * @param int $id
     */
    public function actionList($id = null)
    {
        $resolutions = Resolutions::getAllAsArrayComplex($id);

        if($id != null)
        {
            $issue = Issues::model()->findByPk($id);
        }
        else
        {
            $issue = null;
        }

        $this->render('list',array('resolutions' => $resolutions, 'issue' => $issue));
    }


    /**
     * @param null $id
     * @throws CHttpException
     */
    public function actionAdd($id = null)
    {
        /* @var $issue Issues */

        //try find issue by id
        $issue = Issues::model()->findByPk($id);

        //Only for developers and if issue found by id
        if(!Yii::app()->user->getState('role') == 2 || empty($issue))
        {
            throw new CHttpException(404);
        }

        $form = new ResolutionForm(); //form validation object
        $statuses = Statusses::model()->getAllAsArray(4,3); //get array of issue statuses

        if($_POST['ResolutionForm'])
        {
            //attributes
            $form->attributes = $_POST['ResolutionForm'];

            //if form valid
            if($form->validate())
            {
                //create new resolution and save it
                $resolution = new Resolutions();
                $resolution -> issue_id = $issue->id;
                $resolution -> remark = $form->description;
                $resolution -> date = time();
                $resolution -> user_id = Yii::app()->user->id;
                $saved = $resolution -> save();

                //if resolution saved
                if($saved)
                {
                    //update issue status
                    $issue->status_id = $form->issue_status;
                    $issue->update();
                }

                //redirect to list
                $this->redirect(Yii::app()->createUrl('/resolutions/list',array('id' => $issue->id)));
            }
        }

        //render form
        $this->render('add',array('statuses' => $statuses, 'form_mdl' => $form));
    }
}
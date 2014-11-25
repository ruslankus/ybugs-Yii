<?php

class LanguagesController extends Controller
{
    /**
     * Entry
     */
    public function actionIndex()
    {
        $this->actionList();
    }


    public function actionList()
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }
        
        $lang_prefix = Yii::app()->language;
        $arrSelect = ExtLanguages::model()->selectArray();    
        $arrLabel = ExtLanguages::model()->getLabels($lang_prefix);
       
        $this->render('list',array('arrLabel' => $arrLabel,
                'arrSelect' => $arrSelect,'lang_prefix' => $lang_prefix));
    }



    /* L A N G U A G E S */

    /**
     * Add language
     * @throws CHttpException
     */
    public function actionAddLanguage()
    {
        //If user not admin - no access for this page
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        //form validator
        $form = new LanguageForm();

        //if got POST from form
        if($_POST['LanguageForm'])
        {
            //assign attributes to form-validator
            $form->attributes = $_POST['LanguageForm'];

            //if form valid
            if($form->validate())
            {
                //create new language
                $language = new Languages();
                $language->attributes = $form->attributes;
                $language->save();

                //back to list
                $this->redirect(Yii::app()->createUrl('/languages/list'));
            }
        }

        //get statuses as array
        $statuses = Statusses::model()->getAllAsArray(0,2);

        //render form
        $this->render('language_add',array('form_mdl' => $form, 'statuses' => $statuses));
    }


    /**
     * Edit language
     * @param int $id
     * @throws CHttpException
     */
    public function actionEditLanguage($id = null)
    {
        //try find language
        $language = Languages::model()->findByPk($id);

        //If user not admin - no access for this page
        if(Yii::app()->user->getState('role') != 3 || empty($language))
        {
            throw new CHttpException(404);
        }

        //form validator
        $form = new LanguageForm();

        //if got POST from form
        if($_POST['LanguageForm'])
        {
            //assign attributes to form-validator
            $form->attributes = $_POST['LanguageForm'];

            //if form valid
            if($form->validate())
            {
                //create new language
                $language->attributes = $form->attributes;
                $language->update();

                //back to list
                $this->redirect(Yii::app()->createUrl('/languages/list'));
            }
        }

        //get statuses as array
        $statuses = Statusses::model()->getAllAsArray(0,2);

        //render form
        $this->render('language_edit',array('form_mdl' => $form, 'statuses' => $statuses, 'language' => $language));
    }


    /**
     * Delete language and translations
     * @param int $id
     * @throws CHttpException
     */
    public function actionDeleteLanguage($id = null)
    {
        /* @var $language Languages */

        //try find language
        $language = Languages::model()->findByPk($id);

        //If user not admin - no access for this page
        if(Yii::app()->user->getState('role') != 3 || empty($language))
        {
            throw new CHttpException(404);
        }

        //delete all translations by language id
        TranslationsLng::model()->deleteByLanguageId($language->id);

        //delete language
        $language->delete();

        //back to list
        $this->redirect(Yii::app()->createUrl('/languages/list'));
    }


    /* T R A N S L A T I O N S */

    /**
     * Edit translation
     * @param int $id
     * @throws CHttpException
     */
    public function actionEditTrans($id = null)
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        $translation = Translations::model()->findByPk($id);
        $languages = Languages::model()->findAll();

        $this->render('translation_edit',array('translation' => $translation, 'languages' => $languages));
    }

    /**
     * Add new translation
     * @throws CHttpException
     */
    public function actionAddTrans()
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        $translation = new Translations();
        $languages = Languages::model()->findAll();

        $this->render('translation_edit',array('translation' => $translation, 'languages' => $languages));
    }


    /**
     * Update translation
     * @throws CHttpException
     */
    public function actionUpdateTrans()
    {
        //if not admin - no access
        if(Yii::app()->user->getState('role') != 3)
        {
            throw new CHttpException(404);
        }

        //get params from post
        $id = Yii::app()->request->getPost('id');
        $label = Yii::app()->request->getPost('label');
        $translations = Yii::app()->request->getPost('translation');

        //try find translation
        $translation = Translations::model()->findByPk($id);

        //if not found - create new one
        if(empty($translation))
        {
            $translation = new Translations();
        }

        //set label to translation
        $translation->label = $label;
        $translation->status = 1;

        //if created - save, if old - update
        if($translation->isNewRecord)
            $translation->save();
        else
            $translation->update();

        //for every translation value
        foreach($translations as $lng_id => $value)
        {
            //try find value by translation id and language
            $tr_lng = TranslationsLng::model()->findByAttributes(array('translation_id' => $translation->id, 'language_id' => $lng_id));

            //if not found - create new one
            if(empty($tr_lng))
            {
                $tr_lng = new TranslationsLng();
            }

            //if new - relate with translation and language, set value and save
            if($tr_lng->isNewRecord)
            {
                $tr_lng -> language_id = $lng_id;
                $tr_lng -> translation_id = $translation->id;
                $tr_lng -> value = $value;
                $tr_lng -> save();
            }
            //if old - just update value
            else
            {
                $tr_lng -> value = $value;
                $tr_lng -> update();
            }
        }

        //back to list
        $this->redirect(Yii::app()->createUrl('/languages/list'));
    }


    /**
     * Deletes translation
     * @param int $id
     * @throws CHttpException
     */
    public function actionDeleteTrans($id = null)
    {
        /* @var $translation Translations */

        //try find translation
        $translation = Translations::model()->findByPk($id);

        //If user not admin, or translation don't exist - no access for this page
        if(Yii::app()->user->getState('role') != 3 || empty($translation))
        {
            throw new CHttpException(404);
        }

        $translation->deleteTranslations(); //delete all translations
        $translation->delete(); //delete translation-unit

        //back to list
        $this->redirect(Yii::app()->createUrl('/languages/list'));
    }
}

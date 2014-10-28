<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main_layout';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public $keywords = 'Bug-tracker';
    public $description = 'Bug-tracker';
    public $title = 'Bug-tracker';

    /**
     * @param CAction $action
     * @return bool
     */
    protected function beforeAction($action)
    {
        //if current action - not login, and you are guest
        if (Yii::app()->controller->action->id!=='login' && Yii::app()->user->isGuest)
        {
            //redirect to login
            $this->redirect($this->createUrl('/main/login'));
        }

        return parent::beforeAction($action);
    }


    /**
     * Constructor override - to assign language
     * @param string $id
     * @param null $module
     */
    public function __construct($id,$module=null)
    {
        $language = Yii::app()->request->getParam('language',Yii::app()->params['defaultLanguage']);
        Languages::SetLanguage($language);

        parent::__construct($id,$module);
    }
}
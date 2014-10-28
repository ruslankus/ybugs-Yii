<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    /**
     * Returns project by id
     * @param $id
     * @return CActiveRecord
     */
    public static function getById($id)
    {
        $sql = "SELECT * FROM projects WHERE id = ".$id;
        $project = self::model()->findBySql($sql);

        return $project;
    }

    /**
     * Get all projects
     * @param $user CWebUser
     * @return Projects[]
     */
    public function getAllProjectsByUser($user)
    {
        /* @var $projects Projects[] */

        if($user->getState('role') == 1) /* 1 - simple user*/
        {
            $sql = "SELECT projects.id, projects.name, projects.description, projects.status FROM projects_to_users JOIN projects WHERE projects.id = projects_to_users.project_id AND
            projects_to_users.user_id =".$user->getState('id')."";
        }
        else /* 2 - developers, 3 - administrators */
        {
            $sql = "SELECT projects.id, projects.name, projects.description, projects.status FROM ".$this->tableName();
        }

        $projects = Projects::model()->findAllBySql($sql);

        return $projects;
    }


    /**
     * Returns members of project(users, developers)
     * @param int $role
     * @return Users[]
     */
    public function getMembers($role = 2)
    {
        /* @var $members Users[] */

        $sql = "SELECT users.id, users.login, users.password, users.name, users.surname, users.email, users.token, users.role FROM users JOIN
        projects_to_users, projects WHERE role = ".$role." AND users.id = projects_to_users.user_id AND
        projects.id = projects_to_users.project_id AND projects.id = ".$this->id;

        $members = Users::model()->findAllBySql($sql);

        return $members;
    }

    /**
     * Deletes all issues of projects and all resolutions of every issue
     * @return bool
     */
    public function deleteAllIssuesAndResolutionsOfProject()
    {
        //all right (by default)
        $done = true;

        /* @var $issues Issues[] */
        /* @var $resolutions Resolutions[] */

        //get all issues of this project
        $issues = Issues::model()->findAllByAttributes(array('project_id' => $this->id));

        //for every issue
        foreach($issues as $issue)
        {
            //get all resolutions of current issue
            $resolutions = Resolutions::model()->findAllByAttributes(array('issue_id' => $issue->id));

            //delete every resolution
            foreach($resolutions as $resolution)
            {
                $done = $done && $resolution->delete();
            }

            //delete current issue
            $done = $done && $issue->delete();
        }

        //return status
        return $done;
    }

}

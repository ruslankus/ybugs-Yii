<?php

/**
 * This is the model class for table "resolutions".
 *
 * The followings are the available columns in table 'resolutions':
 * @property integer $id
 * @property integer $issue_id
 * @property string $remark
 * @property string $date
 * @property integer $user_id
 */
class Resolutions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resolutions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('issue_id, user_id', 'numerical', 'integerOnly'=>true),
			array('remark, date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, issue_id, remark, date, user_id', 'safe', 'on'=>'search'),
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
			'issue_id' => 'Issue',
			'remark' => 'Remark',
			'date' => 'Date',
			'user_id' => 'User',
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
		$criteria->compare('issue_id',$this->issue_id);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resolutions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Returns array of all resolutions with issue description and project name
     * @param int $id
     * @return array
     */
    public static function getAllAsArrayComplex($id = null)
    {
        if($id != null)
        {
            $sql = "SELECT resolutions.id as id, issues.id as issue_id, issues.project_id as project_id, issues.description as issue_description ,
            resolutions.remark as resolution_remark, issues.date as issue_date, resolutions.date as resolution_date, projects.name as project_name,
            issues.picture as issue_picture, users.name as dev_user_name, users.surname as dev_user_surname, resolutions.user_id as dev_user_id FROM
            resolutions JOIN issues, projects, users WHERE resolutions.issue_id = ".$id." AND issues.id = resolutions.issue_id AND projects.id = issues.project_id
            AND users.id = resolutions.user_id";
        }
        else
        {
            $sql = "SELECT resolutions.id as id, issues.id as issue_id, issues.project_id as project_id, issues.description as issue_description ,
            resolutions.remark as resolution_remark, issues.date as issue_date, resolutions.date as resolution_date, projects.name as project_name,
            issues.picture as issue_picture, users.name as dev_user_name, users.surname as dev_user_surname, resolutions.user_id as dev_user_id FROM
            resolutions JOIN issues, projects, users WHERE issues.id = resolutions.issue_id AND
            projects.id = issues.project_id AND users.id = resolutions.user_id";
        }


        $connection = Yii::app()->getDb();

        $data = $connection->createCommand($sql)->queryAll(true);

        return $data;
    }
}

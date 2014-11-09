<?php

/**
 * This is the model class for table "issues".
 *
 * The followings are the available columns in table 'issues':
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property string $description
 * @property integer $date
 * @property string $picture
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $prio_id
 */
class Issues extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'issues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, date, user_id, status_id, prio_id', 'numerical', 'integerOnly'=>true),
			array('title, description, picture', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_id, title, description, date, picture, user_id, status_id, prio_id', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project',
			'title' => 'Title',
			'description' => 'Description',
			'date' => 'Date',
			'picture' => 'Picture',
			'user_id' => 'User',
			'status_id' => 'Status',
			'prio_id' => 'Prio',
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
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('prio_id',$this->prio_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Issues the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

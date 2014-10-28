<?php

/**
 * This is the model class for table "translations".
 *
 * The followings are the available columns in table 'translations':
 * @property integer $id
 * @property string $label
 * @property integer $status
 */
class Translations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'translations';
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
			array('label', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, label, status', 'safe', 'on'=>'search'),
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
			'label' => 'Label',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Translations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    /**
     * Returns translation
     * @param $label
     * @param $language
     * @return mixed
     */
    public static function getFor($label,$language = null)
    {
        $return_val = $label;

        if($language == null)
        {
            $language = Yii::app()->language;
        }

        $connection = Yii::app()->getDb();

        $sql = "SELECT value FROM translations JOIN translations_lng, languages
        WHERE translations_lng.translation_id = translations.id AND
        translations_lng.language_id = languages.id AND languages.prefix = '".$language."' AND translations.label = '".$label."'";

        $data = $connection->createCommand($sql)->queryRow(true);

        if(!empty($data)){$return_val = $data['value'];}

        return $return_val;
    }

    /**
     * Returns translation for specified language
     * @param int $id
     * @return string
     */
    public function getByLngId($id)
    {
        $sql = "SELECT value FROM translations_lng WHERE translation_id = ".$this->id." AND language_id = ".$id;
        $connection = Yii::app()->getDb();
        $data = $connection->createCommand($sql)->queryRow(true);

        $return_val = "";

        if(!empty($data)){$return_val = $data['value'];}

        return $return_val;
    }

    /**
     * Deletes translations of all language-variants
     */
    public function deleteTranslations()
    {
        $sql = "DELETE FROM translations_lng WHERE translations_lng.translation_id = ".$this->id;
        $db = Yii::app()->getDb();
        $db -> createCommand($sql)->queryAll();
    }
}

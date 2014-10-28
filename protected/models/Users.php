<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $token
 * @property integer $role
 * @property integer $status
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role, status', 'numerical', 'integerOnly'=>true),
			array('login, password, name, surname, email, token', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, name, surname, email, token, role, status', 'safe', 'on'=>'search'),
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
			'login' => 'Login',
			'password' => 'Password',
			'name' => 'Name',
			'surname' => 'Surname',
			'email' => 'Email',
			'token' => 'Token',
			'role' => 'Role',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Returns array of users by role id
     * @param int $role_id
     * @return array
     */
    public function getArrayByRole($role_id = null)
    {
        if($role_id != null)
        {
            $sql = "SELECT users.id, users.login, users.password, users.name, users.surname, users.email, users.role as role_id, user_roles.name as role_name,
            users.token, users.status, statusses.name as status_name FROM users JOIN user_roles, statusses WHERE users.role = ".$role_id." AND users.role = user_roles.id AND statusses.id = users.status";
        }
        else
        {
            $sql = "SELECT users.id, users.login, users.password, users.name, users.surname, users.email, users.role as role_id, user_roles.name as role_name,
            users.token, users.status, statusses.name as status_name FROM users JOIN user_roles, statusses WHERE users.role = user_roles.id AND statusses.id = users.status";
        }

        $db = Yii::app()->getDb();
        $data = $db->createCommand($sql)->queryAll();

        return $data;
    }
}

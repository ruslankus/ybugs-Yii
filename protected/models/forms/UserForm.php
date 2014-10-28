<?php

class UserForm extends CFormModel
{
    public $login;
    public $password;
    public $name;
    public $surname;
    public $email;
    public $role;

    public $currently_updating_user_id = null;

    public function rules()
    {
        $creating = array('login, password, name, surname, role', 'required','message'=> Translations::getFor('Please assign value to').' "{attribute}"');
        $updating = array('login, name, surname, role', 'required','message'=> Translations::getFor('Please assign value to').' "{attribute}"');
        $unique = array('login, email', 'unique', 'model_class' => 'Users', 'current_id' => $this->currently_updating_user_id);

        if($this->currently_updating_user_id == null)
        {
            $result = array($creating,$unique);
        }
        else
        {
            $result = array($updating,$unique);
        }

        return $result;
    }

    public function attributeLabels()
    {
        return array(
            'login' => Translations::getFor('Login'),
            'password' => Translations::getFor('Password'),
            'name' => Translations::getFor('Name'),
            'surname' => Translations::getFor('Surname'),
            'email' => Translations::getFor('Email'),
            'role' => Translations::getFor('Role of user'),
        );
    }

    /**
     * Checks some field for unique in table
     * @param $attribute
     * @param $param
     * @return bool
     */
    public function unique($attribute,$param)
    {
        /* @var $MODEL_NAME CActiveRecord */
        /* @var $obj CActiveRecord */

        $MODEL_NAME = $param['model_class'];
        $param_name = $attribute;
        $param_value = $this->$attribute;
        $cur_id = $param['current_id'];


        //if no errors (all required fields not empty)
        if(!$this->hasErrors())
        {
            //try find object by search value
            $obj = $MODEL_NAME::model()->findByAttributes(array($param_name => $param_value));

            //if found
            if($obj)
            {
                //if found object is not same as object that we need update (in that case unique fields can be the same)
                if(!($cur_id != null && $cur_id == $obj->getAttribute('id')))
                {
                    //error
                    $this->addError($attribute,Translations::getFor($attribute).' '.Translations::getFor('already used'));
                }
            }
        }

        //no errors
        return false;
    }
}

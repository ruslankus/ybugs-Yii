<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
        return array(
            // username and password are required
            array('username, password', 'required','message'=> Trl::t()->getMsg('fill the field') . '"{attribute}"'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
	}


    public function attributeLabels()
    {
        return array(
            'username' => Trl::t()->getLabel('login'),
            'password' => Trl::t()->getLabel('password')
        );
    }


	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            if(!$this->_identity->authenticate())
            {
                if($this->_identity->errorCode == UserIdentity::ERROR_PASSWORD_INVALID){$this->addError('password',Trl::t()->getMsg('Incorrect password'));}
                elseif($this->_identity->errorCode == UserIdentity::ERROR_USERNAME_INVALID){$this->addError('username',Trl::t()->getMsg('User not exist'));}
                elseif($this->_identity->errorCode == UserIdentity::ERROR_UNKNOWN_IDENTITY){$this->addError('username',Trl::t()->getMsg('Unknown error. Authentication failed'));}
            }
        }
    }

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else
        {
            return false;
        }
	}
}

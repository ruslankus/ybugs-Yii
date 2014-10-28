<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        /* @var $user Users */

        $user = Users::model()->findBySql("SELECT * FROM users WHERE login = '".$this->username."'");

        //if user found
        if(!empty($user))
        {
            //if user's status - deleted
            if($user->status == 4)
            {
                //can't connect by this account
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            //if not deleted
            else
            {
                //if password not correct
                if($user->password !== md5($this->password))
                {
                    //can't connect
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }
                //if no errors
                else
                {
                    //no error
                    $this->errorCode = self::ERROR_NONE;

                    //write params to session
                    $this->setState('id',$user->id);
                    $this->setState('username',$user->login);
                    $this->setState('login',$user->login);
                    $this->setState('name',$user->name);
                    $this->setState('surname',$user->surname);
                    $this->setState('email',$user->email);
                    $this->setState('role',$user->role);
                    $this->setState('token',$user->token);
                }
            }

        }
        //if user not found
        else
        {
            //can't connect
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }

        //return error status
		return !$this->errorCode;
	}
}
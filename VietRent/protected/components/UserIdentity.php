<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $email;
	
	public function __construct($email,$password){
		$this->email = $email;
		$this->password = $password;
		$this->username = $email;
	}
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
		$user = Users::model()->findAllByAttributes(array('user_email' => $this->email, 'user_password'=>md5($this->password)));
		if (!$user)
		{
			return false;			
		}
		else{
			return true;
		}
	}
}
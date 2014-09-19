<?php
/**
 * SignUpForm class.
 * SignUpForm is the data structure for keeping
 * user sign up form data. It is used by the 'register' action of 'SiteController'.
 */
class SignUpForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $password;
	public $email;
	public $phone;
	
	public function rules()
	{
		return array(
			// username and password are required
			array('firstname, lastname, password, email, phone','required'),
			// password needs to be authenticated
			array('password', 'checkLength'),
			array('email', 'checkExisted'),
			array('phone', 'checkValidNumber'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstname'=>'First Name',
			'lastname' =>'Last Name',
			'phone' => 'Mobile Number',
		);
	}
	
	public function checkLength($attribute, $params){
		if (strlen($this->password) > 30){
			$this->addError('password', 'Password is too long');
		}
		if (strlen($this->password) < 6){
			$this->addError('password', 'Password must be at least 6 characters');
		}
	}
	
	public function checkExisted($attribute, $params){
		$user = Users::model()->findAllByAttributes(array('user_email' => $this->email));
		if ($user){
			$this->addError('email', 'Email has been registered');
		}
	}
	
	public function checkValidNumber($attribute, $params){
		if (strlen($this->phone) < 8 || strlen($this->phone) > 15){
			$this->addError('phone', 'Invalid Mobile Number');
		}
	}
}
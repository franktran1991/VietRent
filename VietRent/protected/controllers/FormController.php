<?php
class FormController extends Controller
{

	public function actionRegister()
	{
		$model=new SignUpForm();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='sign_up_form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionProceedRegister()
	{	
		$user = new Users();
		$user->user_first_name= $_POST['SignUpForm']['firstname'];
		$user->user_last_name= $_POST['SignUpForm']['lastname'];
		$user->user_mobile= $_POST['SignUpForm']['phone'];
		$user->user_password= md5($_POST['SignUpForm']['password']);
		$user->user_email= $_POST['SignUpForm']['email'];
		$user->user_create_time = date("Y-m-d H:i:s");
		$user->user_update_time = date("Y-m-d H:i:s");
		$user->save(false);
		$this->redirect(Yii::app()->homeUrl);
	}
	
/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='Login_Form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionProceedLogin()
	{
		$user = new LoginForm();
		$user->email = $_POST['LoginForm']['email'];
		$user->password = $_POST['LoginForm']['password'];
		$user->rememberMe = $_POST['LoginForm']['rememberMe'];
		$user->login();
		if(isset($_POST['new_property'])){
			$this->redirect(array('property/new'));
		}
		else{
			$this->redirect(Yii::app()->homeUrl);	
		}
	}
	
	public function actionUpload_Image(){
		$temp_file = $_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		$uploadfile = Yii::app()->basePath."/public/" . $file_name;
		move_uploaded_file($temp_file,$uploadfile);
			
		//$tempdir = 
	}
	


}
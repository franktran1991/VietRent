<?php
class PropertyController extends Controller
{
	public function actionNew(){
		if (Yii::app()->user->isGuest){
			$login_model = new LoginForm();
			$signup_model = new SignUpForm();
			$this->render ("new", array('login_model' => $login_model, 'signup_model' => $signup_model));
		}
		else{
			var_dump("not shit");
		}
	}
	
	
}
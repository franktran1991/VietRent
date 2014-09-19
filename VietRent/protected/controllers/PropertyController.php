<?php
class PropertyController extends Controller
{
	public $layout='//layouts/property_layout';
	public function actionNew(){
		if (Yii::app()->user->isGuest){
			$login_model = new LoginForm();
			$signup_model = new SignUpForm();
			$this->render ("new_login", array('login_model' => $login_model, 'signup_model' => $signup_model,));
		}
		else{
			$address = 'Singapore';
			$this->render ("new", array( 'height' => '500px', 'address' => $address));
		}
	}

	public function actionSearch(){
		$location = $_POST['location'];
		$this->render("property_list", array('height' => '700px', 'address' => $location));
	}
	

	public function actionShowMap(){
		$file = "/Users/Frank/a.txt";
		$address = $_POST['address'];
		$this->renderPartial('//components/_googleMap',array( 'height' => '500px', 'address' => $address,'new_property' => true),false, true);
	}
	
	public function actionSaveInfo(){
		$file = "/Users/Frank/a.txt";
		$content = "file: ". json_encode($_FILES). "post: ". json_encode($_POST);
		file_put_contents($file, $content, FILE_APPEND);
		var_dump($_FILES);
		var_dump($_POST);
	}
}
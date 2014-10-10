<?php
class PropertyController extends Controller
{
	const EARTH_RADIUS = 6371.0;
	const SEARCH_RADIUS = 5.0;

	public $layout='//layouts/property_layout';

	public function filters()
	{
		return array(
            'accessControl',
		);
	}

	public function accessRules(){
		return array(
		array('deny',
				'actions' => array('enterdetail'),
				'users' => array('?'),
		),
		);
	}

	public function actionNew(){
		if (Yii::app()->user->isGuest){
			$login_model = new LoginForm();
			$signup_model = new SignUpForm();
			$this->render ("new_login", array('login_model' => $login_model, 'signup_model' => $signup_model,));
		}
		else{
			//Save property into DB as pending status
			$new_property = new Properties();
			$new_property->User = Yii::app()->user->User_Status->user_id;
			$new_property->property_status = 1;
			$new_property->property_create_time = $new_property->property_update_time = time();
			$new_property->save(false);
			//End of save property
			//Redirect to enter detail page
			$this->redirect(array('property/enterdetail','property_id' => $new_property->property_id));
		}
	}

	public function actionEnterDetail(){
		$address = 'Singapore';
		$amentity_model = new Amentities();
		$property_id = $_REQUEST['property_id'];
		$this->render ("new", array( 'height' => '500px', 'address' => $address ,'property_id' => $property_id,'amentity' => $amentity_model->findAll()));
	}

	public function actionSearch(){
		$location = $_POST['location'];
		$property_list = $this->property_near_this_location($location);
		$this->render("property_list", array('height' => '700px', 'address' => $location));
	}

	private function property_near_this_location($location){
		Yii::import('ext.EGMap.*');
		$gMap = new EGMap();
		$central_location = new EGMapGeocodedAddress($location);
		$central_location->geocode($gMap->getGMapClient());
		$property_list=Properties::model()->findAll();
		$property_filtered_list = array();
		foreach($property_list as $k=>$property){
			if($property->property_address  == null) continue;
			if ($k%3==0) sleep(1);
			$geocoded_address = new EGMapGeocodedAddress($property->property_address);
			$geocoded_address->geocode($gMap->getGMapClient());
			$distance = $this->getDistanceFromLatLonInKm($geocoded_address->getLat(), $geocoded_address->getLng(), $central_location->getLat(), $central_location->getLng());
			if ($distance <= self::SEARCH_RADIUS){
				$property_filtered_list [] = $property;
			}
		}
		return $property_filtered_list;
	}

	private function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2) {
		$R = self::EARTH_RADIUS; // Radius of the earth in km
		$dLat = deg2rad($lat2-$lat1);  // deg2rad below
		$dLon = deg2rad($lon2-$lon1);
		$a =sin($dLat/2) * sin($dLat/2) +cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *sin($dLon/2) * sin($dLon/2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));
		$d = $R * $c; // Distance in km
		return $d;
	}


	public function actionShowMap(){
		$address = $_POST['address'];
		$this->renderPartial('//components/_googleMap',array( 'height' => '500px', 'address' => $address,'new_property' => true),false, true);
	}

	public function actionSaveInfo(){
		//Save all the information from form to DB
		$_POST['property_available_date']= strtotime($_POST['property_available_date']);
		$property = Properties::model()->findByPk(intval($_POST['property_id']));
		$property->attributes=$_POST;
		$property->property_update_time = time();
		//save the rent length into DB
		foreach($_POST['property_rent_length'] as $rent_length){
			$update_rent_length = new RentLength();
			$update_rent_length->p_id = $_POST['property_id'];
			$update_rent_length->rent_length = $rent_length;
			$update_rent_length->save(false);
		}
		//save the amentity into DB
		foreach($_POST['property_amentity'] as $property_amentity){
			$amentity = new HasAmentity();
			$amentity->p_id = $_POST['property_id'];
			$amentity->a_id = $property_amentity;
			$amentity->save(false);
		}
		//move images into public folder and save images url into DB
		$temp_file = $_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		foreach ($temp_file as $k=>$upload_file){
			$uploadfolder = Yii::app()->basePath."/public/" . $k .'_'.$file_name[$k];
			move_uploaded_file($upload_file,$uploadfolder);
			$update_image = new HasImage();
			$update_image->p_id = $_POST['property_id'];
			$update_image->url = $uploadfolder;
			$update_image->save(false);
		}
		//Change the address from postal code to full address
		$address = $_POST['property_address'];
		Yii::import('ext.EGMap.*');
		$gMap = new EGMap();
		$geocoded_address = new EGMapGeocodedAddress($address);
		$geocoded_address->geocode($gMap->getGMapClient());
		$url  = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($geocoded_address->getLat()).','.trim($geocoded_address->getLng()).'&sensor=false';
		$json  = @file_get_contents($url);
		$data  = json_decode($json, true);
		/* Specify Postion for formatted address array index */
		$current_address = $data['results'][0]['formatted_address'];
		$property->property_address = $current_address;
		$property->save(false);
	}
}
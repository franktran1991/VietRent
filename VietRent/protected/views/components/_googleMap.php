<?php 
Yii::import('ext.EGMap.*');

$gMap = new EGMap();
$gMap->zoom = 16;
$gMap->setHeight($height);
$gMap->setWidth("auto");
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU,
); 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;
$geocoded_address = new EGMapGeocodedAddress($address);
$geocoded_address->geocode($gMap->getGMapClient());
$gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());
$url  = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($geocoded_address->getLat()).','.trim($geocoded_address->getLng()).'&sensor=false';
  $json  = @file_get_contents($url);
  $data  = json_decode($json, true);
  
  /* Specify Postion for formatted address array index */
$current_address = $data['results'][0]['formatted_address'];
// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow($current_address);
$info_window_b = new EGMapInfoWindow('This is your place!'); 
$icon = new EGMapMarkerImage(Yii::app()->baseURL."/images/pin_icon.png");
$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);
 
// Create marker
$marker = new EGMapMarker($geocoded_address->getLat(), $geocoded_address->getLng(), array('title' => 'Marker With Custom Image','icon'=>$icon));
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);
 
// Create marker with label
$marker = new EGMapMarkerWithLabel($geocoded_address->getLat(), $geocoded_address->getLng(), array('title' => 'Marker With Label'));
 
$label_options = array(
  'backgroundColor'=>'yellow',
  'opacity'=>'0.75',
  'width'=>'100px',
  'color'=>'blue'
);
?>
<?php
if(isset($new_property)){
?>
	<input class="form-control input-lg" type="text" value="<?php echo $current_address ?>" disabled >
	<div class="form-inline form-group" style = "color:#2D2D2D;">
		<input type = "text" style = "width:100px;" class = "form-control" id = "house_block" placeholder = "Block">
		&nbsp;
		<input type = "text" style = "width:100px;" class = "form-control" id = "house_level" placeholder = "Level">
		&nbsp;
		<input type = "text" style = "width:100px;" class = "form-control" id = "house_room" placeholder = "Room No.">
	</div>
<?php 
}
?>
<?php 
$gMap->renderMap();
?>


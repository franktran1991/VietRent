<!-- Create new property Tab -->
<div class=".container-fluid">
	<div class="row">
        
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-map-marker"></h4><br/>Address
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-picture"></h4><br/>Photos
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Details
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-hand-up"></h4><br/>Activate Property
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <div class="bhoechie-tab-content active">
                    	<legend>Property Type</legend>
                    	<div class= "form-inline form-group">
	                    	<div class="radio">
							  <label>
							    <input type="radio" name="property_type" id="property_type1" value="option1" checked>
							    &nbsp;
							    HDB
							  </label>
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							  <label>
							    <input type="radio" name="property_type" id="property_type2" value="option2">
							    &nbsp;
							    Condo
							  </label>
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							  <label>
							    <input type="radio" name="property_type" id="property_type2" value="option2">
							    &nbsp;
							    Landed
							  </label>
							</div>
                    	</div>
                    	<input style ="width:200px;" type="text" class="form-control" placeholder="Postal Code or Address" onkeydown="showMap(this.value)" name="address">
                     	
                     	<div id ="map" style = "color:#0066FF"><?php $this->renderPartial('/components/_googleMap',array( 'height' => $height, 'address'=>$address, 'new_property' => true)); ?></div>
                   
                </div>
                <div class="bhoechie-tab-content">
                      	<legend>Upload Photos</legend>
                      	<p>
                      		<?php $this->renderPartial('/components/_photoForm'); ?>
						</p>
                </div>
    
                <div class="bhoechie-tab-content">
                      	<legend>Unit Details</legend>
                </div>
                <div class="bhoechie-tab-content">
                      	<legend>Activate Listing</legend>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      
                    </center>
                </div>
            </div>
      
  </div>
</div>
<!-- End of create new property -->
<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>

<script type="text/javascript">
//<!-- On Mouse Out Event to show map
function showMap(str) {
  if (str=="") {
    document.getElementById("map").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("map").innerHTML=xmlhttp.responseText;
      var ob = document.getElementsByTagName("script");
      for(var i=0; i<ob.length-1; i++){
      	if(ob[i+1].text!=null) eval(ob[i+1].text);
      }
     // EGMapContainer1_init();
      }
  }
  xmlhttp.open("POST","index.php?r=property/showMap");
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send("address=" + str);
}
//-->
</script>


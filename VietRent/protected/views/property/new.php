<!-- Create new property Tab -->
<div class=".container-fluid">
	<div class="row">
        
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-map-marker"></h4><br/>Address
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Details
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-picture"></h4><br/>Photos
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-hand-up"></h4><br/>Activate
                </a>
              </div>
            </div>
           
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab" >
                <div class="bhoechie-tab-content active">
                    	<legend>Property Type</legend>
                    	<div class= "form-inline form-group">
	                    	<div class="radio">
							  <label>
							    <input type="radio" name="house_type" id="property_room_type1" value="1" >
							    &nbsp;
							    HDB
							  </label>
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							  <label>
							    <input type="radio" name="house_type" id="property_room_type2" value="2">
							    &nbsp;
							    Condo
							  </label>
							</div>
							&nbsp;&nbsp;
							<div class="radio">
							  <label>
							    <input type="radio" name="house_type" id="property_room_type3" value="3">
							    &nbsp;
							    Landed
							  </label>
							</div>
                    	</div>
                    	<input style ="width:200px;" type="text" class="form-control" placeholder="Postal Code or Address" onchange="showMap(this.value)" id="house_address">
                    	<div class="form-inline form-group" style = "color:#2D2D2D;">
							<input type = "text" style = "width:100px;" class = "form-control" id = "house_block" placeholder = "Block">
							&nbsp;
							<input type = "text" style = "width:100px;" class = "form-control" id = "house_level" placeholder = "Level">
							&nbsp;
							<input type = "text" style = "width:100px;" class = "form-control" id = "house_room" placeholder = "Room No.">
						</div>
                     	<p><div id ="map" style = "color:#0066FF"><?php $this->renderPartial('/components/_googleMap',array( 'height' => $height, 'address'=>$address, 'new_property' => true)); ?></div></p>
                   		<p><button type="button" id="continue_button_tab1" class="btn btn-primary">Save and Continue</button></p> 
                </div>
                <div class="bhoechie-tab-content " >
                      	<legend>Unit Details</legend>
                      	<p><?php $this->renderPartial('/components/_property-details',array('amentity' => $amentity)); ?></p>
                      	<p><button type="button" id="continue_button_tab2" class="btn btn-primary">Save and Continue</button></p>
                      	<p><button type="button" id="back_button_tab2" class="btn btn-primary">Back</button></p>
                </div>
                <div class="bhoechie-tab-content">
                      	<legend>Upload Photos</legend>
                      	
                      	<form method="post" action = "index.php?r=property/saveInfo" class = "dropzone" id="my-awesome-dropzone" enctype='multipart/form-data'>
                      		<input type ="text" name = "property_room_type" value = "" id = "property_room_type" style = "display:none">
	                      	<input type ="text" name = "property_address" value = "" id = "property_address" style = "display:none">
	                      	<input type ="text" name = "property_block" value = "" id = "property_block" style = "display:none">
	                      	<input type ="text" name = "property_level" value = "" id = "property_level" style = "display:none">
	                      	<input type ="text" name = "property_room" value = "" id = "property_room" style = "display:none">
                      		<input type = "text" name = "property_id" value = "<?php echo $property_id; ?>" style = "display:none">
                      		<input type ="text" name = "property_cost" value = "" id = "property_cost" style = "display:none"> 
                      		<input type ="text" name = "property_max_persons" value = "" id = "property_max_persons" style = "display:none">
                      		<input type ="text" name = "property_bed_rooms" value = "" id = "property_bed_rooms" style = "display:none">
                      		<input type ="text" name = "property_available_date" value = "" id = "property_available_date" style = "display:none">
                      		<input type ="text" name = "property_desc" value = "" id = "property_desc" style = "display:none">
                      		<input type ="checkbox" name = "property_rent_length[]" id = "property_rent_term1" value="short_term" style = "display:none">
                      		<input type ="checkbox" name = "property_rent_length[]" id = "property_rent_term2" value="medium_term" style = "display:none">
                      		<input type ="checkbox" name = "property_rent_length[]" id = "property_rent_term3" value="long_term" style = "display:none">
                      		<?php foreach($amentity as $k=>$facility) { ?>
								<span class="button-checkbox">
								 <button type="button" class="btn"  id="<?php echo 'property_amentity_'.$facility->amentity_name;?>" data-color="info" style="display:none" ><?php echo $facility->amentity_name;?></button>
								        <input type="checkbox" name="property_amentity[]" class="hidden" value = "<?php echo $facility->amentity_id;?>"/>
								</span>
							<?php }?>
                      		<script type = "text/javascript">
                      		</script>
                      		<p>
                      		<?php $this->renderPartial('/components/_photoForm'); ?>
							</p>
							 <input type="submit" class="btn btn-primary" id="submitInfo" value="Upload Photos"/>
							 
						</form>
						<p><button type="button" id="continue_button_tab3" class="btn btn-primary">Save and Continue</button></p>
						<p><button type="button" id="back_button_tab3" class="btn btn-primary">Back</button></p>
                </div>
    
                <div class="bhoechie-tab-content">
                      	<legend>Activate the Property</legend>
                      	<p>By activate the property, you have agree with all of our <a href="#">Terms & Conditions</a>. We will review your fucking application and get back to you as soon as possible</p>
                      	<p><button type="button" id="activate_button_tab4" class="btn btn-primary">Activate It!</button></p>
                      	<p><button type="button" id="back_button_tab4" class="btn btn-primary">Back</button></p>
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
//<!--Handle the form
$(document).ready(function(){
$('input[name="house_type"]').click(function() {
    $('#property_room_type').val(this.value);
});

$('#house_address').change(function() {
	$('#property_address').val(this.value);
  });

$('#house_block').change(function() {
	$('#property_block').val(this.value);
  });

$('#house_level').change(function() {
	$('#property_level').val(this.value);
  });

$('#house_room').change(function() {
	$('#property_room').val(this.value);
  });

$('#house_price').change(function() {
	$('#property_cost').val(this.value);
  });

$('#house_max_persons').change(function() {
	$('#property_max_persons').val(this.value);
  });

$('#house_bedRooms').change(function() {
	$('#property_bed_rooms').val(this.value);
  });

$('#house_avaiDate').change(function() {
	$('#property_available_date').val(this.value);
  });

$('#house_desc').change(function() {
	$('#property_desc').val(this.value);
  });

$('#rent_term1').click(function() {
	$('#property_rent_term1').trigger('click');
});

$('#rent_term2').click(function() {
	$('#property_rent_term2').trigger('click');
});

$('#rent_term3').click(function() {
	$('#property_rent_term3').trigger('click');
});

$('#continue_button_tab1').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("1").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("1").addClass("active");
});

$('#continue_button_tab2').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("2").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("2").addClass("active");
});

$('#continue_button_tab3').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("3").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("3").addClass("active");
});

$('#back_button_tab2').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("0").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("0").addClass("active");
});

$('#back_button_tab3').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("1").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("1").addClass("active");
});
$('#back_button_tab4').click(function() {
	$("div.bhoechie-tab-menu>div.list-group>a").siblings('a.active').removeClass("active");
	$("div.bhoechie-tab-menu>div.list-group>a").eq("2").addClass("active");
	$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
    $("div.bhoechie-tab>div.bhoechie-tab-content").eq("2").addClass("active");
});

});
//-->
</script>
<script type = "text/javascript">
<?php foreach($amentity as $k=>$facility){?>
$('#house_amentity_<?php echo $facility->amentity_name;?>').click(function() {
	$('#property_amentity_<?php echo $facility->amentity_name;?>').trigger('click');
});      
<?php }?>
</script>
<script>
$( document ).ready(function() {
	
	Dropzone.options.myAwesomeDropzone = { 
          addRemoveLinks: true,
          uploadMultiple: true,
          parallelUploads: 10,
          autoProcessQueue: false, // this is important as you dont want form to be submitted unless you have clicked the submit button
          autoDiscover: false,
          clickable: true, // this tells that the dropzone will not be clickable . we have to do it because v dont want the whole form to be clickable 
          accept: function(file, done) {
            console.log("uploaded");
            done();
          },
         error: function(file, msg){
            alert(msg);
          },
          init: function() {
              var myDropzone = this;
            //now we will submit the form when the button is clicked
            $("#submitInfo").click(function(e) {
               e.preventDefault();
                      e.stopPropagation();
               myDropzone.processQueue(); 
               myDropzone.on("completemultiple", function(files, response) {
                      // Gets triggered when the files have successfully been sent.
                      // Redirect user or notify of success.
                    	alert("You have successfully upload the image");
                     
                      });
                     // this will submit your form to the specified action path
              // after this, your whole form will get submitted with all the inputs + your files and the php code will remain as usual 
        //REMEMBER you DON'T have to call ajax or anything by yourself, dropzone will take care of that
            });

          } // init end

        };
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
      	if(ob[i+1].text!=null) 
          	{
			if(ob[i+1].text.indexOf("map")>-1)
          		eval(ob[i+1].text);
          	}
      }
      }
  }
  xmlhttp.open("POST","index.php?r=property/showMap",true);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send("address=" + str);
}
//-->
</script>
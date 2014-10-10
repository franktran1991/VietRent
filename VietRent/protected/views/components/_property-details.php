<div class = "form-group">
	<h5>Rent Cost</h5>
	<div class="input-group">
      <div class="input-group-addon">$</div>
      <input class="form-control" id= "house_price" type="text" placeholder="Rent Cost Per Month">
    </div>
</div>
<div class = "form-group">
	<h5>Rent Length</h5>
	<div class = "form-inline">
		<label class="checkbox-inline">
		  <input type="checkbox" id="rent_term1" value="short_term">0-3 months
		</label>
		<label class="checkbox-inline">
		  <input type="checkbox" id="rent_term2" value="medium_term"> 3-6 months
		</label>
		<label class="checkbox-inline">
		  <input type="checkbox" id="rent_term3" value="long_term"> More than 6 months
		</label>
	</div>
</div>
<div class="form-inline form-group">
		<h5>Unit Information</h5>
		<input type = "text" class = "form-control" id = "house_max_persons" placeholder = "Max Persons">
		<input type = "text" class = "form-control" id = "house_bedRooms" placeholder = "Bed Rooms">
        <input id="house_avaiDate" type="text" class="form-control" placeholder = "Available Date"/>		
</div>
<div class = "form-group">
	<textarea rows="3" class = "form-control" id = "house_desc" >Briefly Describe Your Place
	</textarea>
</div>

<div class = "form-group">
	<h5>Unit Amentities</h5>
		<?php foreach($amentity as $k=>$facility) { ?>
		<span class="button-checkbox">
		 <button type="button" class="btn" id="<?php echo 'house_amentity_'.$facility->amentity_name;?>" data-color="info"><?php echo $facility->amentity_name;?></button>
		        <input type="checkbox" class="hidden" />
		</span>
		<?php }?>
</div>
<script type = "text/javascript">
$(function () {
    $('#house_avaiDate').datetimepicker(
    		{
    			pickTime: false
        		}
            );
});
</script>
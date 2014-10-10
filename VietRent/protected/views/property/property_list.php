
<div class = ".container-fluid">
<div class = "row">
<div class = "col-sm-4 hidden-xs" style = "pointer-events: none">
<?php $this->renderPartial('/components/_googleMap', array( 'height' => $height, 'address'=> $address)); ?>
</div>
<div class = "col-sm-8">
	<div class = "filter">
		<div class = "row">
			<div class = "filter-date">
				<div class = "filter-label col-sm-3">Dates</div>
				<div class = "filter-content col-sm-9">
					<div class = "row">
						<div class='col-sm-3'>
							<input type='text' class="form-control" id='datetimepicker1' placeholder="Available Date"/>
						</div>
						<div class = "col-sm-3">
							<select class = "form-control">
								<option selected disabled>Total Persons</option>
								<option value = "1">1</option>
								<option value = "2">2</option>
								<option value = "3">3</option>
								<option value = "3+">3+</option>
							</select>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "row">
			<div class = "filter-roomtype">
				<div class = "filter-label col-sm-3">Property Types</div>
				<div class = "filter-content col-sm-9">
					<div class = "row">
						<div class='col-sm-3'>
							<input type="checkbox"> HDB
						</div>
						<div class = "col-sm-3">
							<input type="checkbox"> Condo
						</div>
						<div class = "col-sm-3">
							<input type="checkbox"> Landed
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "row">
			<div class = "filter-roomtype">
				<div class = "filter-label col-sm-3">Price Ranges</div>
				<div class = "filter-content col-sm-9">
					<div class = "row">
						<div class = "col-sm-9">
							<input type="text" id="amount-range" style="border:0; color:#f6931f; font-weight:bold;" value="0-5000" />
							<?php
							$this->widget('zii.widgets.jui.CJuiSliderInput', array(
							    'name'=>'slider_range',
							    'event'=>'change',
							    'options'=>array(
							        'values'=>array(0,5000),// default selection
							        'min'=>0, //minimum value for slider input
							        'max'=>5000, // maximum value for slider input
							        'animate'=>true,
							        // on slider change event 
							        'slide'=>'js:function(event,ui){
							        $("#amount-range").val(ui.values[0]+\'-\'+ui.values[1]);
							        }',
							    ),
							    // slider css options
							    'htmlOptions'=>array(
							        'style'=>''
							    ),
							));
							//for AJAX
						//http://demo.bsourcecode.com/yiiframework/cjuislider	
							/*
							 * $.ajax({
                    url:"'.$ajaxurl.'",
                    data:"range1="+ui.values[0]+"&range2="+ui.values[1],
                    success:function(data){
                            $("#amount-range-action").val(data);
                        }                
                });      
							 * */
							?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<br>
	<div class = "well">Property near <?php echo $address;?></div>
	<div class = "result"></div>
		<div class = "row">
			<div class = "col-sm-6 col-md-5 col-lg-4">
				<div class="panel panel-default">
	                <div class="panel-image">
	                    <img src="http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_52cd36aac6bed_1.JPG" class="panel-image-preview" />
	                </div>
	                <div class="panel-body">
	                    <p>Quiet department in the heart of Mahattan</p>
	                    <p>Address here</p>
	                </div>
	            </div>
	         </div>
	     </div>
	 </div>
</div>
</div>
</div>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker(
                		{
                			pickTime: false
                    		}
                        );
            });
 </script>
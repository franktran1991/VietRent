<?php
	$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
					'action' => array('form/upload_image'),
				    'id' => 'upload_image',
					'htmlOptions' => array("class" => "dropzone", "enctype" => "multipart/form-data")
				));
	?>
                      <fieldset>
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</fieldset>
<?php
	$this->endWidget();
?>	
							
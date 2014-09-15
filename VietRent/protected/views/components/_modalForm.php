<!-- Modal -->
<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="container">
    <div class="row">
      	<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 well well-sm">
            	Sign up with facebook, google, twitter or
            	<?php
					$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
					    'enableAjaxValidation' => true,
						'action' => array('form/proceedRegister'),
						'enableClientValidation' => true,
					    'id' => 'sign_up_form',
						'clientOptions' => array(
						'validateOnSubmit'=>true,
						'validationUrl' => array('form/register'),
		    			),
					));
					?>
					<fieldset>
					<?php
					echo $form->textFieldControlGroup($signup_model, 'firstname', array(
					    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_USER)
					));
					?>
					<?php
					echo $form->textFieldControlGroup($signup_model, 'lastname', array(
					    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_USER)
					));
					?>
					<?php
					echo $form->emailFieldControlGroup($signup_model, 'email');
					?>
					<?php
					echo $form->textFieldControlGroup($signup_model, 'phone', array(
					    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_EARPHONE)));
					?>
					<?php
					echo $form->passwordFieldControlGroup($signup_model, 'password');
					?>
					</fieldset>
					<?php
					echo BsHtml::formActions(array(
					    BsHtml::submitButton('Submit', array(
					        'color' => BsHtml::BUTTON_COLOR_PRIMARY
					    ))
					));
					?>
					<?php
					echo BsHtml::button('Cancel', array(
			            'data-dismiss' => 'modal'
			        ));
					?>
					<?php
					$this->endWidget();
					?>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="omb_login col-xs-12 col-sm-12 col-md-6 col-md-offset-3 well well-sm">
    	<h3 class="omb_authTitle">Welcome to Viet Rent!</h3>
		<div class="row omb_row-sm-offset-3 omb_socialButtons">
    	    <div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
			        <i class="fa fa-facebook visible-xs"></i>
			        <span class="hidden-xs">Facebook</span>
		        </a>
	        </div>
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
			        <i class="fa fa-twitter visible-xs"></i>
			        <span class="hidden-xs">Twitter</span>
		        </a>
	        </div>	
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-google">
			        <i class="fa fa-google-plus visible-xs"></i>
			        <span class="hidden-xs">Google+</span>
		        </a>
	        </div>	
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>

		<?php
		$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
						'enableAjaxValidation' => true,
						'action' => array('form/proceedLogin'),
						'enableClientValidation' => true,
					    'id' => 'Login_Form',
						'clientOptions' => array(
						'validateOnSubmit'=>true,
						'validationUrl' => array('form/login'),
		    			),
					));
		?>
		<fieldset>
		<legend>Sign in with Email</legend>
		<?php
		echo $form->emailFieldControlGroup($login_model, 'email', array(
		    'prepend' => BsHtml::icon(BsHtml::GLYPHICON_USER)
		));
		?>
		<?php
		echo $form->passwordFieldControlGroup($login_model, 'password');
		?>
		<?php
		echo $form->checkBoxControlGroup($login_model, 'rememberMe');
		?>		
		<?php echo $form->error($login_model,'password'); ?>
		<?php echo $form->error($login_model,'email'); ?>
		</fieldset>
		<?php
		echo BsHtml::formActions(array(
		    BsHtml::submitButton('Submit', array(
		        'color' => BsHtml::BUTTON_COLOR_PRIMARY
		    ))
		));
		?>
		<?php
		echo BsHtml::button('Cancel', array(
            'data-dismiss' => 'modal'
        ));
		?>
		<?php
		$this->endWidget();
		?>
		
	</div>
</div>
<!-- End of Modal -->


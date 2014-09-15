<?php $this->renderPartial('/components/_head');?>
<body>
<?php
$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => Yii::app()->name,
    'brandUrl' => Yii::app()->homeUrl, 
    'items' => array(
		'
		<div class="col-sm-1 col-md-1">
        <form class="navbar-form navbar-left" action='.Yii::app()->createUrl("property/search").' role="search" method = "post" id = "the-basics">
        <div class="input-group">
            <input style ="width:250px; height:28px" type="text" class="form-control typeahead" placeholder="Where do you want to live?" name="location">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
   	 </div>
		',
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => 'Sign Up',
                    'data-toggle'=>"modal", 
                    'data-target'=>'#SignUpModal',
                	'url' => "#",
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Login',
                    'url' => "#",
                	'data-toggle'=>"modal", 
                    'data-target'=>'#LogInModal',
                    'visible' => Yii::app()->user->isGuest,
                ),
                 array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'url' => array(
                        '/site/logout'
                    ),
                    'visible' => !Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'List Your Space',
                    'url' => array(
                        'property/new'
                    ),
                    'htmlOptions' => array(''),
                ),
            ),
            'htmlOptions' => array(
                'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
            )
        )
    )
));
?>
<?php echo $content;?>
</body>
<?php $this->renderPartial('/components/_footer');?>
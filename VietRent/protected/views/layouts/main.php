<?php $this->renderPartial('/components/_head');?>

<body>

  <?php
//  var_dump(Yii::app()->user);exit;
$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => Yii::app()->name,
    'brandUrl' => Yii::app()->homeUrl, 
    'items' => array(
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

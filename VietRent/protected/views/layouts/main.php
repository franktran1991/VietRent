<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- blueprint CSS framework -->
	<?php
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($themePath.'/assets/css/bootstrap.css')
    ->registerCssFile($themePath.'/assets/css/viet-rent.css')
    ->registerCssFile($themePath.'/assets/css/bootstrap-theme.css');

/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/bootstrap.min.js',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/typeahead.js',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/viet-rent.js',CClientScript::POS_END)
    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->baseUrl ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->baseUrl ?>/assets/js/respond.min.js"></script>
<![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

  <?php
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
                    
                ),
                array(
                    'label' => 'List Your Space',
                    'url' => array(
                        '#'
                    ),
                    'htmlOptions' => array(''),
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'url' => array(
                        '/site/logout'
                    ),
                    'visible' => !Yii::app()->user->isGuest
                )
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

<footer>
<div class="container">
	<hr>
        <div class="text-center center-block">
                <h5>Follow Us On
                <a href="#"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
	            <a href="#"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
	            <a href="#"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
	            <a href="#"><i id="social" class="fa fa-envelope-square fa-3x social-em"></i></a>
	            </h5>
		</div>
</footer>
</html>
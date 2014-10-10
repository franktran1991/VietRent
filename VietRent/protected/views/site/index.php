<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php $this->renderPartial('/components/_modalForm', array('login_model' => $login_model, 'signup_model' => $signup_model)); ?>

<div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/home1.jpg" alt="First slide">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/home2.jpg" alt="Second slide">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/home3.jpg" alt="Third slide">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
            <div class="main-text">	
                <div class="col-md-12 text-center">
                		<h1 class="hidden-xs">Welcome Home</h1>
 						<a class="btn btn-clear btn-sm btn-min-block" style="width: 20%" href="http://www.jquery2dotnet.com/" data-toggle="modal" data-target="#myModal"><h6>HOW WE WORK</h6></a>
                </div>
            </div>
        </div>
 </div>
 <div class = "row">
 	 <div class="col-xs-12 well">
          <form class="form-inline" action="<?php echo  Yii::app()->createUrl("property/search");?>" role="search" method = "post" id = "the-basics">
          	<div class="input-group">
	          	<div class = "col-md-6 col-xs-6">
	          		<input type = "text" class = "form-control typeahead" name="location" style = "width:100%" placeholder = "Your place?">
	          	</div>
	          	<div class = "col-md-3 col-xs-5">
	          		<select class="form-control">
					  <option value="" disabled selected>Rent Type</option>
					  <option>Short Term</option>
					  <option>Medium Term</option>
					  <option>Long Term</option>
					</select>
	          	</div>
	          	<div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          	</div>
          </form>
 	 </div>
 </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 text-center">
        <h1>Modal with blur effect</h1>
        <h2>Put here whatever you want here</h2>
        <h4>For instance, a login form or an article content</h4>
        <h4><kbd>esc</kbd> or click anyway to close</h4>
        <hr>
        <div class="alert alert-info"><h4>I can add a close button if you want.<br>Please, tell me in comments :)</h4></div>
      </div>
    </div>
  </div>
</div>

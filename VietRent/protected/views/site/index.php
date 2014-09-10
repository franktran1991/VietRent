<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php $this->renderPartial('/_modalForm', array('login_model' => $login_model, 'signup_model' => $signup_model)); ?>
<div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/VietRent/images/home1.jpg" alt="First slide">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="/VietRent/images/home2.jpg" alt="Second slide">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="/VietRent/images/home3.jpg" alt="Third slide">
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
 	 <div class="col-md-12 text-center well">
          
 	 </div>
 </div>
 

            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#home" data-toggle="tab" title="welcome">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-home" style="padding-top: 15px"></i>
                      </span> 
                  </a></li>

                  <li><a href="#profile" data-toggle="tab" title="profile">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-user" style="padding-top: 15px"></i>
                     </span> 
           </a>
                 </li>
                 <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-gift" style="padding-top: 15px"></i>
                     </span> </a>
                     </li>

                     <li><a href="#settings" data-toggle="tab" title="blah blah">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-comment" style="padding-top: 15px"></i>
                         </span> 
                     </a></li>

                     <li><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok" style="padding-top: 15px"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="home">

                          <h3 class="head text-center">Welcome to Bootsnipp<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="profile">
                          <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                          
                      </div>
                      <div class="tab-pane fade" id="messages">
                          <h3 class="head text-center">Bootsnipp goodies</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="settings">
                          <h3 class="head text-center">Drop comments!</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="doner">
  <div class="text-center">
    <i class="img-intro icon-checkmark-circle"></i>
</div>
<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
<p class="narrow text-center">
  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
</p>
</div>
<div class="clearfix"></div>
</div>

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

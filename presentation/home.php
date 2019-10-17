<?php
$page="home";
 require_once('../include/header.php') ;
 
 ?>
<body>		
		<!-- carousal -->
		
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../images/banner1.jpg" alt="">
    </div>

    <div class="item">
      <img src="../images/banner2.jpg" alt="">
    </div>
	
    <div class="item">
      <img src="../images/banner3.jpg" alt="">
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		<!-- carousal -->
		
		<!--welcome-->
		<div class="content">
		<div class="welcome">
			<div class="container">
				<h3>Welcome to Lorem Ipsum</h3>
				
			</div>
		</div>
		<!--welcome-->
		
	</div>
</body>
<?php require_once('../include/footer.php');
			
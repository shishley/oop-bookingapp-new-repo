<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BeachSide Hotels | Home :: Page</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>

</head>
<body>
		<!--header-->
			<div class="header">
				<div class="container">
				<?php include_once('includes/header.php');?>
		<div class="slider">
			<div class="callbacks_container">
				  <ul class="rslides" id="slider">
						 <li>	          
							<h3>luxury options of  <span>hotels</span> </h3>
						 </li>
						 <li>	          
							<h3>beautiful coastal  <span>views</span> </h3>  
						 </li>
						 <li>	          
							 <h3>well known for <span>family vacations</span> </h3>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--header-->

		<div class="content">
			
		<div class="features">
					<div class="container">
						<h3>Services</h3>
							<div class="features-grids">
								<?php
$sql="SELECT * from tblfacility order by rand() limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
								<div class="col-md-3 feature-grid">
								<div class="feature">
									
									<div class="feature1">
										<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										<h4><?php  echo htmlentities($row->FacilityTitle);?></h4>
									</div>
									<div class="feature2">
										<p><?php  echo htmlentities($row->Description);?>. </p>
									</div>
								</div>
								</div>
								<?php $cnt=$cnt+1;}} ?>
								
								
									<div class="clearfix"></div>
							</div>
					</div>
				</div>
	<!-- slider -->
	<div class="slider1">
		<div class="arrival-grids">			 
			 <ul id="flexiselDemo1">
				 <li>
					 <a href="index.php"><img src="images/s1.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					 <a href="index.php"><img src="images/s2.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					 <a href="index.php"><img src="images/s3.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					 <a href="index.php"><img src="images/s4.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					 <a href="index.php"><img src="images/s5.jpg" alt=""/>
					 </a>
				 </li>
				 <li>
					 <a href="index.php"><img src="images/s6.jpg" alt=""/>
					 </a>
				 </li>
				</ul>
				<script type="text/javascript">
				 $(window).load(function() {			
				  $("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover:true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
		</div>
	</div>
	<!-- //slider -->
		
				<!--GET IN TOUCH-->
					<?php include_once('includes/getintouch.php');?>
			</div>
			<!--footer-->
		<?php include_once('includes/footer.php');?>
</body>
</html>

<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BeachSide Hotels | Hotel :: Facilities</title>
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
			<div class="header head-top">
				<div class="container">
	<?php include_once('includes/header.php');?>
		</div>
</div>
<!--header-->
		<!--services-->
		<div class="content">
			<div class="services">
	<div class="container">
		<div class="services-main">
				<h2>Facilities</h2>
			<div class="services1">
				<?php
$sql="SELECT * from tblfacility";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="col-md-6 services-grid">
					<br />
					<div class="col-md-5 serv-img">
						<img src="admin/images/<?php echo $row->Image;?>" height="300" width="300" alt="" class="img-responsive">
					</div><br />
					<div class="col-md-6 serv-text">
						<h4><?php  echo htmlentities($row->FacilityTitle);?> </h4>
						<p><?php  echo htmlentities($row->Description);?> </p>
					</div>
				  <div class="clearfix"> </div>
				</div><?php $cnt=$cnt+1;}} ?>
				
			   
			</div>
	
		</div>
	</div>
</div>
	
		
			<?php include_once('includes/getintouch.php');?>
				
			</div>
			<!--footer-->
				<?php include_once('includes/footer.php');?>
</body>
</html>

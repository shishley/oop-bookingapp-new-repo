<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BeachSide Hotels | About Us :: Page</title>
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
		<!--about-->
		<div class="content">
			<div class="about-section">
			<div class="container">
				<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<h2><?php  echo htmlentities($row->PageTitle);?></h2>
				<img src="images/island-cabana.jpg" class="img-responsive" alt="/">
				<h5><?php  echo htmlentities($row->PageTitle);?></h5>
				<p><?php  echo htmlentities($row->PageDescription);?>.</p>
				<?php $cnt=$cnt+1;}} ?>
			</div>
		</div>
		<!--about-->
		
		<?php include_once('includes/getintouch.php');?>

			</div>
			
					<?php include_once('includes/footer.php');?>
</body>
</html>

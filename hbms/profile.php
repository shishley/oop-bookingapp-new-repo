<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['hbmsuid'];
    $AName=$_POST['fname'];
  $mobno=$_POST['mobno'];
  $sql="update tbluser set FullName=:name,MobileNumber=:mobilenumber where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
     

  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BeachSide Hotels | Hotel :: Profile</title>
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
				<div class="contact">
				<div class="container">
					
					<h2>View Your Profile !!!!!!</h2>
					
				<div class="contact-grids">
					
						<div class="col-md-6 contact-right">
							<form method="post">
								<?php
$uid=$_SESSION['hbmsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
								<h5>Full Name</h5>
								<input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control">
								<h5>Mobile Number</h5>
								<input type="text" name="mobno" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
								<h5>Email Address</h5>
								<input type="email" class="form-control" value="<?php  echo $row->Email;?>" name="email" required="true" readonly='true'>
								<h5>Registration Date</h5>
								<input type="text" value="<?php  echo $row->RegDate;?>" class="form-control" name="password" readonly="true">
								<br /><?php $cnt=$cnt+1;}} ?>
								
								<br/>
								 <input type="submit" value="Update" name="submit">
						 	 </form>

						</div>
						<div class="col-md-6 contact-right">
							
						 	 <img src="images/img.jpg" width="400" height="400" />

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php include_once('includes/getintouch.php');?>
			</div>
			<?php include_once('includes/footer.php');?>
</html><?php }  ?>

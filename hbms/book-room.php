<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if (strlen($_SESSION['hbmsuid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
 $rid=intval($_GET['rmid']);
 $uid=$_SESSION['hbmsuid'];
     $idtype=$_POST['idtype'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $checkindate=$_POST['checkindate'];
    $checkoutdate=$_POST['checkoutdate'];
   
 $cdate=date('Y-m-d');
if($checkindate <  $cdate){
 echo '<script>alert("Check in date must be greater than current date")</script>';
} else if($checkindate > $checkoutdate)
{
echo '<script>alert("Check out date must be equal to / greater than  check in date")</script>';	
} else {
$sql="insert into tblbooking(RoomId,BookingNumber,UserID,IDType,Gender,Address,CheckinDate,CheckoutDate)values(:rid,:booknum,:uid,:idtype,:gender,:address,:checkindate,:checkoutdate)";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':idtype',$idtype,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':checkindate',$checkindate,PDO::PARAM_STR);
$query->bindParam(':checkoutdate',$checkoutdate,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo '<script>alert("Your room has been book successfully. Booking Number is "+"'.$booknum.'")</script>';

echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BeachSide Hotels | Hotel :: Book Room</title>
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
					<h2>Book Your Hotel</h2>
					
				<div class="contact-grids">
					
						<div class="col-md-6 contact-right">
							<form method="post">
					
									
								</select>
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
								<h5>Name</h5>
								<input type="text"  value="<?php  echo $row->FullName;?>" name="name" class="form-control" required="true" readonly="true">
								<h5>Mobile Number</h5>
								<input type="text" name="phone" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>" readonly="true">
								<h5>Email Address</h5>
								<input  type="email" value="<?php  echo $row->Email;?>" class="form-control" name="email" required="true" readonly="true"><?php $cnt=$cnt+1;}} ?>
								<h5>ID Type</h5>
								<select  type="text" value="" class="form-control" name="idtype" required="true" class="form-control">
									<option value="">Choose ID Type</option>
									<option value="Voter Card">ID Card</option>
									<option value="Driving Licence Card">Driving Licence Card</option>
									<option value="Passport">Passport</option>
									</select>
									<h5>Gender</h5>
								 <p style="text-align: left;"> <input type="radio"  name="gender" id="gender" value="Female" checked="true">Female</p>
             
                                 <p style="text-align: left;"> <input type="radio" name="gender" id="gender" value="Male">Male</p>
                               
								<h5>Address</h5>
								 <textarea type="text" rows="10" name="address" required="true"></textarea>
								 <h5>Checkin Date</h5>
								<input  type="date" value="" class="form-control" name="checkindate" required="true">
								<h5>Checkout Date</h5>
								<input  type="date" value="" class="form-control" name="checkoutdate" required="true">
								
								 <input type="submit" value="send" name="submit">
						 	 </form>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php include_once('includes/getintouch.php');?>
			</div>
			<?php include_once('includes/footer.php');?>
</html><?php }  ?>

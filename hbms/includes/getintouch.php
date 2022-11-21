<div class="touch-section">
					<div class="container">
						<h3>Contact Us</h3>
						<div class="touch-grids">
							<?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
							<div class="col-md-4 touch-grid">
								<h4>Office</h4>
								<h5>674 Business Park</h5>
								<h5>Grizzly Avenue, Umhlanga</h5>
								<h5>Durban, 4279</h5>
								
							</div>
							<div class="col-md-4 touch-grid">
								<h4>Direct Contact</h4>
								<h5>Sale Enquiries</h5>
								<p>Telephone : 0615540908</p>
							<p>E-mail : beachsidehotels@gmail.com</p>
							</div><?php $cnt=$cnt+1;}} ?>
							<div class="col-md-4 touch-grid">
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
							<h4><?php  echo htmlentities($row->PageTitle);?></h4>
									
								<p>Book any luxury coastal hotel through us, no extra fees, no hidden charges, self check in, fully automated system.</p>
								
							</div><?php $cnt=$cnt+1;}} ?>
							<div class="clearfix"></div>
						</div>
					</div>
					</div>
				<!--GET IN TOUCH-->
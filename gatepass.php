<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Hostel Management System | Contact</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>
<?php 
	 $h_id = $_SESSION['hostel_id'];
	  $query7 = "SELECT Hostel_name FROM Hostel WHERE Hostel_id = '$h_id'";
    $result7 = mysqli_query($conn,$query7);
    $row7 = mysqli_fetch_array($result7);
 //echo "========".$row7['Hostel_name'];

	 ?>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home.php">PIET-DS <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="services.php">Hostels</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="gatepass.php">Gatepass</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="contact.php">Complaint</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="message_user.php">Message Received</a>
					</li>
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['fname']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>
			  
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner --> 

<!-- contact -->
<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Gatepass Form </h2>
			<div class="mail_grid_w3l">
				<form action="gatepass.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel_name" placeholder="Hostel Name" value="<?php echo $row7['Hostel_name'];?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="rol_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']; ?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="subject" placeholder="Subject" value="Gate Pass Application" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<div class="contact-fields-w3ls">
								<textarea name="message" placeholder="Message..." required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Submit">
						</div>
					</div>

				</form>
			</div>
		
	</div>
</section>
<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> GatePass Application </h2>
<?php
  $std_id = $_SESSION['roll'];
  $hostel_id = $_SESSION['hostel_id'];
	$query1 = "SELECT * FROM gatepass where sender_id = '$std_id'";

?>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Contact Number</th> 
        <th>Hostel</th>
        <th>Room Number</th>
        <th>Application</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result)==0){
         echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result)){
      		//get the room_no of the student from room_id in room table
      		
			   $query12 = "SELECT * FROM Student where Student_id = '$std_id'";
			   $result12 = mysqli_query($conn,$query12);
			  $row12 = mysqli_fetch_assoc($result12);

			  $hostel_id = $row12['Hostel_id'];
			   //select the hostel name from hostel table
			   $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
			   $result6 = mysqli_query($conn,$query6);
			   $row6 = mysqli_fetch_assoc($result6);
			   $hostel_name = $row6['Hostel_name'];


            $room_id = $row12['Room_id']; 
            $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $room_no = $row7['Room_No'];
            //student name
            $student_name = $row12['Fname']." ".$row12['Lname']; ?>

             <tr>
        		    <td><?php echo $student_name;?></td>
			        <td><?php echo $row12['Student_id'];?></td>
			        <td><?php echo $row12['Mob_no'];?></td> 
			        <td><?php echo $hostel_name;?></td>
			        <td><?php echo $room_no;?></td>
			        <td><?php echo $row1['message'];?></td>
			        <td>
			    <?php    	if($row1['status']==1){
			    	echo "Approved";
			    }else if($row1['status']==2){
			    	echo "Rejected";
			    }

			    ?>
			        </td>
           </tr>
            
      		
 <?php     	}
      }
    ?>
    </tbody>
  </table>
</div>
<!-- //contact -->


<!-- footer -->
<?php include('footer_login.php'); ?>
<!-- footer -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>

<?php
if(isset($_POST['submit'])){
	/*echo "<script type='text/javascript'>alert('hello')</script>";*/
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$hostel_name = $_POST['hostel_name'];

  /*  $query7 = "SELECT * FROM Hostel WHERE Hostel_name = '$hostel_name'";
    $result7 = mysqli_query($conn,$query7);
    $row7 = mysqli_fetch_assoc($result7);
    $hostel_id = $row7['Hostel_id'];
*/
    $query6 = "SELECT * FROM Hostel_Manager WHERE Hostel_id = '$h_id'";
    $result6 = mysqli_query($conn,$query6);
    $row6 = mysqli_fetch_assoc($result6);
    $hos_man_id = $row6['Hostel_man_id'];

	$roll = $_SESSION['roll'];
	$fname = $_SESSION['fname'];

    $today_date =  date("Y-m-d");
    $time = date("h:i A");

	$query = "INSERT INTO gatepass (sender_id,sender_name,receiver_id,hostel_id,subject_h,message,msg_date,msg_time) VALUES ('$roll','$fname','$hos_man_id','$h_id','$subject','$message','$today_date','$time')";
    $result = mysqli_query($conn,$query);
    if($result){
         echo "<script type='text/javascript'>alert('Gatepass application sent Successfully!')</script>";
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending application!!! Please try again.')</script>";
   }
  }


?>
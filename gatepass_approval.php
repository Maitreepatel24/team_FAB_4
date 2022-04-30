<?php
  require 'includes/config.inc.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Gate Pass</title>
	
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
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>
<?php
if(isset($_GET['ap']) && isset($_GET['g_id'])){
	$val = $_GET['ap'];
	$gid = $_GET['g_id'];
	if($val==1){
		$que = "update gatepass set status=1 where g_id='$gid'";
		$resp = mysqli_query($conn,$que);
		 if($resp){
         echo "<script type='text/javascript'>alert('Application Approved!')</script>";
        // header('location:gatepass_approval.php');
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
  		// header('location:gatepass_approval.php');
   }
	}
	else if($val==2){
		$que = "update gatepass set status=2 where g_id='$gid'";
		$resp = mysqli_query($conn,$que);
		 if($resp){
         echo "<script type='text/javascript'>alert('Application Rejected!')</script>";
       //  header('location:gatepass_approval.php');
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
  		// header('location:gatepass_approval.php');
   }
	}



}

?>
<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home_manager.php">PIET-DS <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="allocate_room.php">Allocate Rooms</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="gatepass_approval.php">Gatepass Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="message_hostel_manager.php">Complaints Received</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="allocated_rooms.php">Allocated Rooms</a>
							</li>
							<li>
								<a href="empty_rooms.php">Empty Rooms</a>
							</li>
							<li>
								<a href="vacate_rooms.php">Vacate Rooms</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact_manager.php">Reply</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="manager_profile.php">My Profile</a>
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
<br>





<div class="container">
<h2 class="heading text-capitalize mb-sm-5 mb-4"> GatePass Application </h2>
<?php
 
  $hostel_id = $_SESSION['hostel_id'];
	$query1 = "SELECT * FROM gatepass where Hostel_id = '$hostel_id'";
$result = mysqli_query($conn,$query1);

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
      		
			   $query12 = "SELECT * FROM Student where Hostel_id = '$hostel_id'";
			   $result12 = mysqli_query($conn,$query12);
			  $row12 = mysqli_fetch_assoc($result12);
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
			        	<?php 
			        	if($row1['status']==0){
			        	?>
			        	<a href="gatepass_approval.php?g_id=<?php echo $row1['g_id']?>&ap=1">Approve</a>  |  <a href="gatepass_approval.php?g_id=<?php echo $row1['g_id']?>&ap=2">Reject</a></td>
			        <?php }else if($row1['status']==1){
			        	echo "Approved";
			        } else if($row1['status']==2){
			        	echo "Rejected";
			        }

			        ?>
           </tr>
            
      		
 <?php     	}
      }
    ?>
    </tbody>
  </table>
</div>
<br>
<br>


<!-- footer -->
<?php include('footer_manager.php');?>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

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


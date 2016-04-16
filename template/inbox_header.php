<?php

require_once('../auth.php');

$alevel = ($_SESSION['SESS_MEMBER_LEVEL']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo "$title" ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../template/css/simple-sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->
	
	
	
	<link href="../template/css/hover.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
	
		<?php
		
		if($alevel == 1)
		{
			
			echo"
			
			<!-- Sidebar -->
			<div id='sidebar-wrapper'>
			
				<ul class='sidebar-nav'>
					<li class='sidebar-brand'>
						<a href='../home.php'>
							Home
						</a>
					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Inbox</a>
						<ul class='dropdown-menu'>
						<li><a href='../inbox/appc.php'>Inbox Appreciation Letter</a></li>
						<li><a href='../inbox/app.php'>Inbox Appointment Letter</a></li>
						</ul>
					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Outbox</a>
						<ul class='dropdown-menu'>
						<li><a href='../outbox/appc.php'>Outbox Appreciation Letter</a></li>
						<li><a href='../outbox/app.php'>Outbox Appointment Letter</a></li>
						</ul>

					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Pending Letters</a>
						<ul class='dropdown-menu'>
						<li><a href='../pending/appc.php'>Pending Appreciation Letter</a></li>
						<li><a href='../pending/app.php'>Pending Appointment Letter</a></li>
						</ul>

					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Approved Letters</a>
						<ul class='dropdown-menu'>
						<li><a href='../approved/appc.php'>Approved Appreciation Letter</a></li>
						<li><a href='../approved/app.php'>Approved Appointment Letter</a></li>
						</ul>

					</li>
					
					<li>
						<a href='../about.php'>About</a>
					</li>
					<li>
						<a href='../contact.php'>Contact</a>
					</li>
					<center>
					<br><br><br>
					<img src='../template/img/uitm.png' alt='Logo UiTM' style='width:200px' ><br><br>
					<br><br><br><br></center>
					<center><button class='dropbtn2'><a href='../logout.php'><span style='color:#ffffff'>&nbsp;&nbsp; LogOut &nbsp;&nbsp;</span></a></button></center>
				</ul>
			</div>
			<!-- /#sidebar-wrapper -->
			
			";
		}
		else if($alevel == 2)
		{
			echo"
			
			<!-- Sidebar -->
			<div id='sidebar-wrapper'>
			
				<ul class='sidebar-nav'>
					<li class='sidebar-brand'>
						<a href='../home.php'>
							Home
						</a>
					</li>
					<li>
						<div class='dropdown'><br>
						  <button class='dropbtn'>Compose Letter</button>
						  <div class='dropdown-content'>
							<a href='../surat/appreciation/appr_letter.php' >Appreciation   Letter</a>
							<a href='../surat/appointment/app_letter.php' >Appointment   Letter</a>
						  </div>
						</div><br><br><br><br>
						
					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Inbox</a>
						<ul class='dropdown-menu'>
						<li><a href='../inbox/appc.php'>Inbox Appreciation Letter</a></li>
						<li><a href='../inbox/app.php'>Inbox Appointment Letter</a></li>
						</ul>
					</li>
					
					<li class='dropdown-submenu'>
						<a tabindex='-1' href='#'>Outbox</a>
						<ul class='dropdown-menu'>
						<li><a href='../outbox/appc.php'>Outbox Appreciation Letter</a></li>
						<li><a href='../outbox/app.php'>Outbox Appointment Letter</a></li>
						</ul>

					</li>
					
					<li>
						<a href='../about.php'>About</a>
					</li>
					<li>
						<a href='../contact.php'>Contact</a>
					</li>
					<center>
					<br><br><br>
					<img src='../template/img/uitm.png' alt='Logo UiTM' style='width:200px' ><br><br>
					<br><br><br><br></center>
					<center><button class='dropbtn2'><a href='../logout.php'><span style='color:#ffffff'>&nbsp;&nbsp; LogOut &nbsp;&nbsp;</span></a></button></center>
				</ul>
			</div>
			<!-- /#sidebar-wrapper -->
			
			";
		}
		
		
		?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
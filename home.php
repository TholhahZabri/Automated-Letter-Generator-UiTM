<?php

	require_once('./auth.php');
	$alevel = ($_SESSION['SESS_MEMBER_LEVEL']);

$title = "HOME";
include './template/_header.php';
?>

	<center><img src="./template/img/uitm_logo.png" alt="Logo UiTM" style="width:304px" ></center><center>
	<h1>WELCOME TO THE AUTOMATED LETTER GENERATOR SYSTEM</h1><br/><br/><br/>
	<h2><span style="color:#12FF00">Welcome!</span></h2>
	<h3><span style="color:#0024F8">
	Staff ID : <?php echo ($_SESSION['SESS_MEMBER_ID']) ?> <br/>
	Name : <?php echo ($_SESSION['SESS_MEMBER_NAME']) ?> <br/>
	Access Level : <?php 
	
	if($alevel==1)
		echo  "Vice Rector";
	else if($alevel==2)
		echo "Lecturer";
	
	
	
	
	?></span></h3>
    
	<br/><br/><br/><br/>
	


<?php
include './template/_footer.php';
?>
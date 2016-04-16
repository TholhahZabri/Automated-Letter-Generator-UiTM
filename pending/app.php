<?php

require_once('../auth.php');

$title = "Pending Appointment Letter";
include '../template/inbox_header.php';


?>



<?php
if($alevel == 1)
{
		echo "
		<h1>Pending Appointment Letter</h1><br>
		<table class='resulttable'>
		<tr>
		<th> Sender </th><th> Event Name </th><th> Date </th><th> Approval </th>
		</tr>";

		$userid = ($_SESSION['SESS_MEMBER_ID']);

		include '../db_info.php';
			
					
				try
				{
					//connect to db
					$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					//sql query
					//$stmt = $conn->prepare("SELECT * FROM letter_appointment WHERE approve_stat = '0' ");
					$stmt = $conn->prepare("SELECT DISTINCT EV_NAME, SENDER, TARIKH, approve_stat FROM letter_appointment WHERE approve_stat = '0' ");

					//execute query
					$stmt->execute();
					
					//fetch
					while($result = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$ev_name = $result['EV_NAME'];
						$date = $result['TARIKH'];
						$sender = $result['SENDER'];
						
						echo"
					<tr>
					<td> {$sender} </td>
					<td><a href='./preview.php?ev_name={$ev_name}&type=app' target='_blank'>{$ev_name}</a> </td>
					<td> {$date} </td>
					<td><button><a href='./approve.php?ev_name={$ev_name}&sender={$sender}&type=app' target='_blank'>Approve</a></button></td>
					</tr>
					
					";				
					}
					
					
					if(isset($err))
					{
						echo "<center><font color='red'><p>$err</p></font></center>";
					}
					
				}
				catch(PDOException $e)
				{
					echo "Connection failed : " . $e->getMessage();
				}

				$conn = null;
				echo "</table><br><br>";
}
else if($alevel == 2)
{
	echo "<script>alert('You have no privilaged to view this page!')</script>";
	echo "<script>goBack()</script>";
}


?>




<?php
include '../template/inbox_footer.php';
?>
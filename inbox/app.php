<?php

require_once('../auth.php');

$title = "Appointment Letter Inbox";
include '../template/inbox_header.php';


?>

<h1>Appointment Letter Inbox</h1><br>
<table class="resulttable">
<tr>
<th> Sender </th><th> Event Name </th><th> Date </th>
</tr>

<?php

$userid = ($_SESSION['SESS_MEMBER_ID']);

include '../db_info.php';
	
			
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("SELECT * FROM letter_appointment WHERE RECEIVER = '$userid' AND APPROVE_STAT = '1'");

			//execute query
			$stmt->execute();
			
			//fetch
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$ev_name = $result['ev_name'];
				$date = $result['tarikh'];
				$sender = $result['sender'];
				$lett_id = $result['lett_id'];
				
				echo"
				<tr>
				<td> {$sender} </td>
				<td><a href='./preview.php?lett_id={$lett_id}&type=app' target='_blank'>{$ev_name}</a> </td>
				<td> {$date} </td>
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



?>


</table><br><br>

<?php
include '../template/inbox_footer.php';
?>
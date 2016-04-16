<?php
require_once('../../auth.php');
$title = "Appointment Letter";
include '../../template/header.php';
require_once('../../db_info.php');

//connect to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $conn->query("SELECT Staff_ID FROM user");
$data = $sth->fetchAll();


?>

	<img src="../../template/img/uitm_logo.png" alt="Logo UiTM" style="width:240px" >
	<form method="post" action="./preview.php" target="_blank">
        <p><br/><br/><h1><b>Appointment Letter Generator</b></h1><br/><br/><br/></p>
         
    
        <p> Event Name : &nbsp; <input type="text" name="title" size="70" required="required"  >
        </p>
        <br/><b><p>Programme's Details</p></b><br/>
		<b>Jawatan &nbsp;&nbsp;: &nbsp;&nbsp; <select name="jawatan"><option value="" required="required">Pilih Jawatan</option>
										<option value="Pengerusi">Pengerusi</option>
										<option value="Setiausaha">Setiausaha</option>
										<option value="Pemantau">Pemantau</option>
										<option value="AJK Khas">AJK Khas</option>
										</select></b></br></br>
        
         Date &nbsp;&nbsp; :&nbsp;&nbsp; <input type="date" name="tarikh"><br/><br/>
         Time &nbsp;&nbsp; : &nbsp; <input type="time" name="masa"><br/><br/>
         Place&nbsp;&nbsp; :&nbsp;&nbsp; <input type="text" name="tempat" size="50"><br/><br/>
		 Receiver (Staff ID)&nbsp;&nbsp; :&nbsp;&nbsp; 
		 <select name="receiver">
		 <?php 
		 foreach($data as $each)
		 {
			?>
			<option value="<?php echo $each['Staff_ID']; ?>"><?php echo $each['Staff_ID']; ?></option>
			<?php 
		 }
		 ?>
		 </select>
		
		 <!--Receiver (Staff ID)&nbsp;&nbsp; :&nbsp;&nbsp; <input type="text" name="receiver" ><br/><br/>-->
         
        <p>
          <input type="submit" name="preview" id="preview" value="Preview">
          <input type="submit" name="submit" id="submit" value="Submit">
        </p>
		
		
	</form>
	
	<br/><br/><br/><br/>
	<a href="../../index.php">Back To Testing Page</a></center>


<?php
include '../../template/footer.php';
?>
<?php
require_once('../../auth.php');
$title = "Appreciation Letter";
include '../../template/header.php';

require_once('../../db_info.php');
//connect to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $conn->query("SELECT Staff_ID FROM user");
$data = $sth->fetchAll();
?>
	
	<img src="../../template/img/uitm_logo.png" alt="Logo UiTM" style="width:240px">
		
	<!--<style type="text/css">
	input {font-weight:bold;}
	select {font-weight:bold;}
	
	</style>-->
        <p><br/><br/><h1><b>Appreciation Letter Generator</b></h1><br/><br/><br/></p>
				<form action="preview.php" method="post" target="_blank">
			<p> Event Name &nbsp:&nbsp </br><input type="text" name="E_name" size="100" required="required" >
        </p>
		
		Tarikh &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; <input type="date" name="tarikh"></br></br>
		Jawatan &nbsp;&nbsp;: &nbsp;&nbsp; <select name="jawatan"><option value="">Pilih Jawatan</option>
										<option value="Pengerusi">Pengerusi</option>
										<option value="Setiausaha">Setiausaha</option>
										<option value="Pemantau">Pemantau</option>
										<option value="AJK Khas">AJK Khas</option>
										</select></br></br>
										<p> Receiver (Staff ID)&nbsp;&nbsp; :&nbsp;&nbsp; 
		 <select name="receiver" required = "required">
		 <?php 
		 foreach($data as $each)
		 {
			?>
			<option value="<?php echo $each['Staff_ID']; ?>"><?php echo $each['Staff_ID']; ?></option>
			<?php 
		 }
		 ?>
		 </select>
		
										</p>
										<input type="submit" name="preview" id="preview" value="Preview">
                                        <input type="submit" name="submit" id="submit" value="Submit">
										
													
										
										
		</form>
		</br></br></br></br>
<?php	
	include '../../template/footer.php';
?>
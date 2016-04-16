<?php 
require_once('../../auth.php');

if(isset($_POST['preview'])){
	
	require_once('fpdf/fpdf.php');
	define('FPDF_FONTPATH', 'fpdf/font/');
	include '../../db_info.php';
	
	$tarikh = date("d-M-Y",strtotime($_POST['tarikh']));
	$receiver = $_POST['receiver'];
	
	try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("SELECT * FROM user WHERE Staff_ID = '{$receiver}' ");

			//execute query
			$stmt->execute();
			
			//fetch
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
						
			
			$_name = $result['Name'];
			$_faculty = $result['Faculty'];
		
	
	
	
	
	$val = "Dengan segala hormatnya perkara di atas adalah dirujuk. 
	
2.	Sukacita dimaklumkan bahawa tuan/puan telah dilantik sebagai ".$_POST['jawatan']." bagi ".$_POST['title']." mengikut ketetapan berikut :-

			Tarikh   : ".$tarikh."
			Tempat  : ".$_POST['tempat']."
			Masa     : ".$_POST['masa']."
			Jawatan : ".$_POST['jawatan']."

3.	Kerjasama dan sokongan tuan/puan melaksanakan tanggungjawab ini amatlah dihargai dan di dahului dengan ucapan ribuan terima kasih.


Yang Benar,


.................................
Dr. Shaiful Annuar Bin Khalid
Timbalan Rektor Hal Ehwal (Akademik)
";
	
	
	$fpdf = new FPDF();
		$fpdf->SetMargins(20, 20, 20);
		$fpdf->SetAutoPageBreak(true, 0);
		$fpdf->AliasNbPages();
		
		$fpdf->AddPage('P','A4');
		$fpdf->SetFont('times', '',12);
		$fpdf->Cell(56, 6,"", 0, 1, 'L', FALSE);
		$fpdf->Ln();
		$fpdf->Ln();
		$fpdf->Ln();
		$fpdf->Ln();

		$fpdf->Cell(56, 6, $_name.",", 0, 1, 'L', FALSE);
		$fpdf->Cell(56, 6, $_faculty, 0, 1, 'L', FALSE);
		$fpdf->Ln();

		$fpdf->Cell(56, 6, 'Tuan/Puan', 0, 1, 'L', FALSE);
		$fpdf->Ln();

		$fpdf->SetFont('times','B',12);
		$fpdf->MultiCell(165, 6, "PERLANTIKAN SEBAGAI ".strtoupper($_POST['jawatan']), 0, 'L', FALSE);
		$fpdf->Ln();
		$fpdf->SetFont('times', '',12);
		$fpdf->MultiCell(165, 6, $val, 0, 'L', FALSE);
		$fpdf->Ln();
		
		$fpdf->SetXY(140, 27);
		$fpdf->Cell(56, 6, "Tarikh : ".$tarikh, 0, 0, 'L', FALSE);
		$store = $fpdf->Output();
		$fpdf->Output();
		
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}
	
if(isset($_POST['submit']))
{
	include '../../db_info.php';
			$ename = $_POST['title'];
			$tarikh = $_POST['tarikh'];
			$masa = $_POST['masa'];
			$jawatan = $_POST['jawatan'];
			$place = $_POST['tempat'];
			$sender = ($_SESSION['SESS_MEMBER_ID']);
			$receiver = $_POST['receiver'];
			$app = 0;
			
			try
			{
				//connect to database
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				//insert data into db
				$stmt = $conn->prepare("INSERT INTO letter_appointment (sender,receiver,approve_stat,ev_name,jawatan,tarikh,masa,tempat) VALUES('{$sender}' , '{$receiver}' , '{$app}' ,'{$ename}' ,'{$jawatan}', '{$tarikh}' , '{$masa}' , '{$place}');");
				
				//execute sql query
				$stmt->execute();
				
				echo "<script>alert('Your letter has been submitted and pending approval.')</script>";
				echo "<script>window.close();</script>";
			}
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}


			//close conection
			$conn = null;
}	

?>
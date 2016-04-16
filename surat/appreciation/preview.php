<?php

require_once('../../auth.php');

if(isset($_POST['preview']))
{
	include '../../db_info.php';
	
	
	$title = "Appreciation Letter";
	
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
						
		
	
	
	require_once('fpdf/fpdf.php');
	define('FPDF_FONTPATH', 'fpdf/font/');
	$_name = $result['Name'];
	$_faculty = $result['Faculty'];
	
	
	// make bold text utk tunjuk ??
	$val = "Dengan segala hormatnya perkara di atas adalah dirujuk. 
		
	2.	Sukacitanya Fakulti Sains Komputer dan Matematik, UiTM Perlis merakamkan ucapan penghargaan dan terima kasih di atas sumbangan tuan/puan sebagai ".$_POST['jawatan']." ".$_POST['E_name']." 

	3.	Sesungguhnya sumbangan dan komitment pihak tuan/puan amat dihargai dan bermanfaat untuk meningkatkan kualiti penyelidikan dan penulisan oleh pihak universiti.

	Sekian.

		
	Yang Benar,


	.................................
	Dr. Shaiful Annuar Bin Khalid
	Timbalan Rektor Hal Ehwal (Akademik)

	";
		$tarikh=date("d-M-Y",strtotime($_POST['tarikh']));

		
		
			
		
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
		$fpdf->MultiCell(165, 6, "UCAPAN PENGHARGAAN DAN TERIMA KASIH", 0, 'L', FALSE);
		$fpdf->Ln();
		$fpdf->SetFont('times', '',12);
		$fpdf->MultiCell(165, 6, $val, 0, 'L', FALSE);
		$fpdf->Ln();
		
		$fpdf->SetXY(140, 27);
		$fpdf->Cell(56, 6, "Tarikh : ".$tarikh, 0, 0, 'L', FALSE);
		
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
			$ename = $_POST['E_name'];
			$tarikh = $_POST['tarikh'];
			$jawatan = $_POST['jawatan'];
			$sender = ($_SESSION['SESS_MEMBER_ID']);
			$receiver = $_POST['receiver'];
			$app = 0;
			
			try
			{
				//connect to database
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				//insert data into db
				$stmt = $conn->prepare("INSERT INTO letter_appreciation (sender,receiver,approve_stat,ev_name,date,jawatan) VALUES('{$sender}' , '{$receiver}' , '{$app}' ,'{$ename}' , '{$tarikh}' , '{$jawatan}');");
				
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
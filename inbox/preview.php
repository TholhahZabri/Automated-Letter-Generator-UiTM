<?php

require_once('../auth.php');

if(isset($_GET['lett_id']) && isset($_GET['type']))
{
	$lett_id = $_GET['lett_id'];
	$userid = ($_SESSION['SESS_MEMBER_ID']);
	
	if($_GET['type'] == "appc") //check if letter type is appreciation letter
	{
		
		include '../db_info.php';
	
		
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("SELECT * FROM letter_appreciation WHERE lett_id = '{$lett_id}' AND approve_stat='1' AND RECEIVER = '{$userid}'");

			//execute query
			$stmt->execute();
			
			//fetch
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$ev_name = $result['ev_name'];
			$jawatan = $result['jawatan'];
			$tarikh = $result['date'];
			
			//sql query
			$stmt2 = $conn->prepare("SELECT * FROM user WHERE Staff_ID = '{$userid}' ");

			//execute query
			$stmt2->execute();
			
			//fetch
			$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

			$_name = $result2['Name'];
			$_faculty = $result2['Faculty'];
			
			$title = "Appreciation Letter";
		
				require_once('../fpdf/fpdf.php');
				define('FPDF_FONTPATH', 'fpdf/font/');
				
				
				// make bold text utk tunjuk ??
				$val = "Dengan segala hormatnya perkara di atas adalah dirujuk. 
				
		2.	Sukacitanya Fakulti Sains Komputer dan Matematik, UiTM Perlis merakamkan ucapan penghargaan dan terima kasih di atas sumbangan tuan/puan sebagai ".$jawatan." ".$ev_name." 

		3.	Sesungguhnya sumbangan dan komitment pihak tuan/puan amat dihargai dan bermanfaat untuk meningkatkan kualiti penyelidikan dan penulisan oleh pihak universiti.

		Sekian.

				

		Yang Benar,
			";
			
			$val2 = "
			.................................
	Dr. Shaiful Annuar Bin Khalid
	Timbalan Rektor Hal Ehwal (Akademik)";
			
				$tarikhs=date("d-M-Y",strtotime($tarikh));

				
				
					
					
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
					
					$fpdf->Image("sign.jpg",$fpdf->getX(),$fpdf->getY(), -200);
					$fpdf->Ln();
					$fpdf->MultiCell(165, 6, $val2, 0, 'L', FALSE);
					$fpdf->Ln();
					$fpdf->SetXY(140, 27);
					$fpdf->Cell(56, 6, "Tarikh : ".$tarikhs, 0, 0, 'L', FALSE);
					
					
					if($ev_name != null)
					{
						$fpdf->Output();
					}
					else
					{
						echo "<script>alert('No letter available!')</script>";
						echo "<script>window.close();</script>";
					}
					
				
			
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}
	else if($_GET['type'] == "app") //check if letter type is appointment letter
	{
		include '../db_info.php';
	
		
		try
		{
			//connect to db
			$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//sql query
			$stmt = $conn->prepare("SELECT * FROM letter_appointment WHERE lett_id = '{$lett_id}' AND approve_stat = '1' AND RECEIVER = '{$userid}'");

			//execute query
			$stmt->execute();
			
			//fetch
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			//sql query
			$stmt2 = $conn->prepare("SELECT * FROM user WHERE Staff_ID = '{$userid}' ");

			//execute query
			$stmt2->execute();
			
			//fetch
			$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

			$_name = $result2['Name'];
			$_faculty = $result2['Faculty'];
			
			
			$ev_name = $result['ev_name'];
			$jawatan = $result['jawatan'];
			$tarikh = $result['tarikh'];
			$masa = $result['masa'];
			$tempat = $result['tempat'];
			
			
			require_once('fpdf/fpdf.php');
				define('FPDF_FONTPATH', 'fpdf/font/');
				$tarikhs = date("d-M-Y",strtotime($tarikh));
				$val = "Dengan segala hormatnya perkara di atas adalah dirujuk. 
				
			2.	Sukacita dimaklumkan bahawa tuan/puan telah dilantik sebagai ".$jawatan." bagi ".$ev_name." mengikut ketetapan berikut :-

						Tarikh   : ".$tarikhs."
						Tempat  : ".$tempat."
						Masa     : ".$masa."
						Jawatan : ".$jawatan."

			3.	Kerjasama dan sokongan tuan/puan melaksanakan tanggungjawab ini amatlah dihargai dan di dahului dengan ucapan ribuan terima kasih.


			Yang Benar,";
			
			$val2 = "
			.................................
	Dr. Shaiful Annuar Bin Khalid
	Timbalan Rektor Hal Ehwal (Akademik)";
				
				
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
					$fpdf->MultiCell(165, 6, "PERLANTIKAN SEBAGAI ".strtoupper($jawatan), 0, 'L', FALSE);
					$fpdf->Ln();
					$fpdf->SetFont('times', '',12);
					$fpdf->MultiCell(165, 6, $val, 0, 'L', FALSE);
					
					$fpdf->Image("sign.jpg",$fpdf->getX(),$fpdf->getY(), -200);
					$fpdf->Ln();
					$fpdf->MultiCell(165, 6, $val2, 0, 'L', FALSE);
					$fpdf->Ln();
					$fpdf->SetXY(140, 27);
					$fpdf->Cell(56, 6, "Tarikh : ".$tarikhs, 0, 0, 'L', FALSE);
					
					
					if($ev_name != null)
					{
						$fpdf->Output();
					}
					else
					{
						echo "<script>alert('No letter available!')</script>";
						echo "<script>window.close();</script>";
					}
				
				
			
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed : " . $e->getMessage();
		}

		$conn = null;
	}
		

}
?>
<?php	
	function diemtk($cc, $thi){
		$tk = $cc*0.3 + $thi*0.7;
		$tk = round($tk, 1);
		return $tk;
	}
	function diemchu($cc, $thi){
		$tk = $cc*0.3 + $thi*0.7;
		$tk = round($tk, 1);
		switch ($tk) {
			case ($tk<3.5):
				return 'F';
				break;
			case ($tk>=3.5 && $tk<5.5):
				return 'D';
				break;
			case ($tk>=5.5 && $tk<7):
				return 'C';
				break;
			case ($tk>=7 && $tk<8.5):
				return 'B';
				break;
			case ($tk>8.5 && $tk<=10):
				return 'A';
				break;
			default:
				break;
		}
	}

	function note($cc, $thi){
		$tk = $cc*0.3 + $thi*0.7;
		$tk = round($tk, 1);
		if($tk < 3.5){
			return "THI LẠI";
		}else{
			return "ĐẠT";
		}
	}


	/*function diema($con){

		
	}*/
	/*function diem($con){
		if(isset($_POST['watch']))
		{
			$year = $_POST['year'];
			if($year == $row['semester']){
				diema($con);
			}
		}
	}*/
?>
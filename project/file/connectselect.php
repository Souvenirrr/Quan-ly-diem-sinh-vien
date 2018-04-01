<?php
	//require_once '../file/calculator.php';
	//require_once '../file/connect.php';
	//require_once '../file/home.php';


	function diem($con,$dk){
		$sql = '';
		if(isset($_POST['watch'])){
			//$user = $_COOKIE['msv'];
				$sql = "SELECT * FROM result, student, subject WHERE result.studentid = student.studentid AND subject.subjectid = result.subjectid  AND $dk";
				$count = 0;
				$result = $con->query($sql);
				if($result->num_rows > 0){
					while ($row = $result->fetch_assoc()) {
						$count++;
						echo '<tr>';
						echo '<td>'.$count.'</td>';
						echo '<td>'.$row['subjectid'].'</td>';
						echo '<td>'.$row['namesubject'].'</td>';
						echo '<td>'.$row['number'].'</td>';
						echo '<td>'.$row['diemcc'].'</td>';
						echo '<td>'.$row['diemthi'].'</td>';
						echo '<td>'.diemtk($row['diemcc'], $row['diemthi']).'</td>';
						echo '<td>'.diemchu($row['diemcc'], $row['diemthi']).'</td>';
						echo '<td>'.note($row['diemcc'], $row['diemthi']).'</td>';
						echo '</tr>';
					 }
				}else{
					echo 'Chưa có cơ sở dữ liệu';
				}
			
		}
	}
	
	
?>
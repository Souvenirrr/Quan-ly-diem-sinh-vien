
<?php
	require_once '../file/calculator.php';
	function diemad($con,$dk){
		$if = $_GET['msv'];
		//require_once '../file/connect.php';
		if(isset($_POST['show'])){
		//$user = $_COOKIE['msv'];
			$sql = "SELECT * FROM result, student, subject WHERE result.studentid = student.studentid AND subject.subjectid = result.subjectid AND result.studentid = '$if'";
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
					echo '<td><a target="_blank" href="../admin/editscore.php?msv='.$row['studentid'].'&idsj='.$row['subjectid'].'">edit</td>';
					echo '<td><a target="_blank" href="../admin/deletescore.php?msv='.$row['studentid'].'&idsj='.$row['subjectid'].'">delete</td>';
					echo '</tr>';
				}
			}else{
				echo 'Chưa có trong cơ sở dữ liệu';
			}

		}
	}

	
?>
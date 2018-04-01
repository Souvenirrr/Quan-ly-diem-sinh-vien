<?php
	require_once '../admin/studentadmin.php';
	require_once '../file/connect.php';


	$sql = '';
	if(isset($_POST['watchad'])){
		//$user = $_COOKIE['msv'];
		$sql = "SELECT * FROM student, class, science";
		$count = 0;
		$result = $con->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$count++;
				echo '<tr>';
				echo '<td>'.$count.'</td>';
				echo '<td>'.$row['studentid'].'</td>';
				echo '<td>'.$row['fullname'].'</td>';
				echo '<td>'.$row['birthday'].'</td>';
				echo '<td>'.$row['gender'].'</td>';
				echo '<td>'.$row['address'].'</td>';
				echo '<td>'.$row['nameclass'].'</td>';
				echo '<td>'.$row['namescience'].'</td>';
				echo '</tr>';
			 }
		}else{
			echo '1';
		}
	}
	
?>
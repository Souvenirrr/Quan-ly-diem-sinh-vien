<?php
	require_once '../file/login.php';

	function info($con){
		$stdId = $_COOKIE['msv'];
		$sql = "SELECT * FROM student, science, class WHERE student.classid = class.classid AND science.scienceid = class.scienceid AND student.studentid='$stdId'";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo '<tr>';
				echo '<td class="c">Họ và tên: '.$row['fullname'].'</td>';
				echo '<td class="d">Ngày sinh: '.$row['birthday'].'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td class="c">Giới tính: '.$row['gender'].'</td>';
				echo '<td class="d">Địa chỉ: '.$row['address'].'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td class="c">Khoa: '.$row['namescience'].'</td>';
				echo '<td class="d">Lớp: '.$row['nameclass'].'</td>';
				echo '</tr>';
			}
		}
	}
		
?>
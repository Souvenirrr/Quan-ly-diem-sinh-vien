<?php
	require_once '../file/connect.php';
	require_once '../file/exit.php';
	mysqli_set_charset($con,"utf8");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<h1>SINH VIÊN</h1>
		<table border="1" class="table2">
			<tr>
				<td>STT</td>
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Ngày sinh</td>
				<td>Giới tính</td>
				<td>Địa chỉ</td>
				<td>Khoa</td>
				<td>Lớp</td>
			</tr>
			<?php
				$sql = '';
				if(isset($_POST['watchad'])){
					$sql = "SELECT DISTINCT * FROM student, class, science WHERE class.scienceid = science.scienceid AND student.classid = class.classid";
					$count = 0;
					$result = $con->query($sql);
					if($result->num_rows > 0){
						while ($row = $result->fetch_assoc()) {
							$count++;
							echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<td><a target="_blank" href="../admin/result.php?msv='.$row['studentid'].'" >'.$row['studentid'].'</td>';
							echo '<td>'.$row['fullname'].'</td>';
							echo '<td>'.$row['birthday'].'</td>'; 
							echo '<td>'.$row['gender'].'</td>';
							echo '<td>'.$row['address'].'</td>';
							echo '<td>'.$row['namescience'].'</td>';
							echo '<td>'.$row['nameclass'].'</td>';
							echo '<td><a target="_blank" href="../file/edit.php?msv='.$row['studentid'].'" >edit</td>';
							echo '<td><a target="_blank" href="../admin/deletesv.php?msv='.$row['studentid'].'" >delete</td>';
							echo '</tr>';
						 }
					}
				}
				
			?>
		</table>
		<input type="submit" name="watchad" value="Sinh viên">
		<input type="submit" name="addsv" value="Thêm sinh viên">
		<input type="submit" name="exit" value="Thoát">
		<?php
			if(isset($_POST['addsv'])){
				header("location: ../admin/addsv.php");
			}
		?>
	</form>
</body>
</html>
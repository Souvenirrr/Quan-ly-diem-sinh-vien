<?php
	$if = $_GET['msv'];
	require_once '../file/connect.php';
	$sql = "SELECT * FROM student, result, subject WHERE student.studentid = result.studentid AND result.subjectid = subject.subjectid AND student.studentid='$if'";
	$query = $con->query($sql);
	$row = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<h1>QUẢN LÝ ĐIỂM SINH VIÊN</h1>
		<table>
			<tr>
				<td>Sinh viên</td>
				<td>
					<?php
						echo $row['fullname'];
					?>
				</td>
			</tr>
			<tr>
				<td>Môn học</td>
				<td>
					<select name="subject">
						<?php
							$sql = "SELECT * FROM subject";
							$result = $con->query($sql);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row['subjectid'].'">'.$row['namesubject'].'</option>'.'<br>';
								}
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Điểm chuyên cần: </td>
				<td><input type="text" name="diemcc"></td>
			</tr>
			<tr>
				<td>Điểm thi </td>
				<td><input type="text" name="diemthi"></td>
			</tr>
			<tr>
				<td>Năm học</td>
				<td>
					<select name="semester">
						<?php
							$sql = "SELECT DISTINCT semester FROM result";
							$result = $con->query($sql);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row['semester'].'">'.$row['semester'].'</option>'.'<br>';
								}
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" name="addd" value="Xác nhận">
	</form>

	<?php
		$sql = "SELECT * FROM student, subject, result WHERE student.studentid = result.studentid AND result.subjectid = subject.subjectid AND student.studentid='$if'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();
		if(isset($_POST['addd'])){
			$subject = $_POST['subject'];
			$diemcc = $_POST['diemcc'];
			$diemthi = $_POST['diemthi'];
			
			$dk = $con->query("INSERT INTO  result(studentid,subjectid , diemcc, diemthi) VALUES ('$if','$subject','$diemcc', '$diemthi')");

			if(isset($dk)){
				//header("location: ../admin/result.php");
				echo "Thêm thành công";
			}else{
				echo "Thêm không thành công";
			}
			
		}
	?>
</body>
</html>
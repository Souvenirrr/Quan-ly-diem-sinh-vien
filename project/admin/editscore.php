<?php
	$if = $_GET['msv'];
	$subjectid = $_GET['idsj'];
	require_once '../file/connect.php';
	$sql = "SELECT * FROM student, result, subject WHERE student.studentid = result.studentid AND result.subjectid = subject.subjectid AND student.studentid='$if' AND result.subjectid = '$subjectid'";
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
					<?php
						echo $row['namesubject'];
					?>
				</td>
			</tr>
			<tr>
				<td>Điểm chuyên cần: </td>
				<td><input type="text" name="diemcc" value="<?php echo $row["diemcc"] ?>"></td>
			</tr>
			<tr>
				<td>Điểm thi </td>
				<td><input type="text" name="diemthi" value="<?php echo $row["diemthi"] ?>"></td>
			</tr>
			
		</table>
		<input type="submit" name="editscore" value="Xác nhận">
	</form>

	<?php
		$sql = "SELECT * FROM student, subject, result WHERE student.studentid = result.studentid AND result.subjectid = subject.subjectid AND student.studentid='$if'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();
		if(isset($_POST['editscore'])){
			$diemcc = $_POST['diemcc'];
			$diemthi = $_POST['diemthi'];
			
			$dk = $con->query("UPDATE result SET diemcc = '$diemcc', diemthi = '$diemthi' WHERE student.studentid='$if' AND student.classid=class.classid");

			if(isset($dk)){
				header("location: ../admin/studentadmin.php");
			}else{
				echo "Thêm không thành công";
			}
			
		}
	?>
</body>
</html>
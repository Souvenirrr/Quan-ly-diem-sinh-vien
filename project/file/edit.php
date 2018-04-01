<?php
	$if = $_GET['msv'];
	require_once '../file/connect.php';
	$sql = "SELECT * FROM student, science, class WHERE student.classid = class.classid AND science.scienceid = class.scienceid AND student.studentid='$if'";
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
	<label>THÔNG TIN SINH VIÊN</label>
	<form method="post" action="">
		<table>
			<tr>
				<td>Mã sinh viên: </td>
				<td><input type="text" name="studentid" value="<?php echo $row['studentid']?>"></td>
			</tr>
			<tr>
				<td>Họ và tên: </td>
				<td><input type="text" name="username" value="<?php echo $row['fullname']; ?>"></td>
			</tr>
				<td>Ngày sinh: </td>
				<td><input type="text" name="birthday" value="<?php echo $row['birthday']; ?>"></td>
			</tr>
			<tr>
				<td>Giới tính: </td>
				<td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ: </td>
				<td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
			</tr>
			<tr>
				
				<td>Khoa: </td>
				<td><select name="namescienc">
					<?php
						$sql = "SELECT * FROM science";
						$result = $con->query($sql);
						if($result->num_rows > 0){
							while ($row = $result->fetch_assoc()) {
								echo '<option value="'.$row['scienceid'].'">'.$row['namescience'].'</option>'.'<br>';
							}
						}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Lớp: </td>
				<td><select name="nameclass">
					<?php
						$sql = "SELECT * FROM class";
						$result = $con->query($sql);
						if($result->num_rows > 0){
							while ($row = $result->fetch_assoc()) {
								echo '<option value="'.$row['classid'].'">'.$row['nameclass'].'</option>'.'<br>';
							}
						}
					?>
				</select></td>
			</tr>
			
			
		</table>
		
		<input type="submit" name="edit" value="Cập nhật thông tin">

	</form>

	<?php
		
		$sql = "SELECT * FROM student, science, class WHERE student.classid = class.classid AND science.scienceid = class.scienceid AND student.studentid= '$if'";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();
		if(isset($_POST['edit'])){
			$id = $_POST['studentid'];
			$username = $_POST['username'];
			$birthday = $_POST['birthday'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$namescience = $_POST['namescienc'];
			$nameclass = $_POST['nameclass'];
			
			$dk = $con->query("UPDATE student, class SET fullname = '$username', birthday = '$birthday', gender = '$gender', address = '$address', class.scienceid = '$namescience', student.classid = '$nameclass' WHERE student.studentid='$if' AND student.classid=class.classid ");

			if(isset($dk)){
				header("location: ../admin/studentadmin.php");
			}else{
				echo "update không thành công";
			}
			
		}
	?>

</body>
</html>

<?php
	require_once '../file/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<h1>THÊM SINH VIÊN</h1>
		<table>
			<tr>
				<td>Nhập MSV: </td>
				<td><input type="text" name="studentid"></td>
			</tr>
			<tr>
				<td>Nhập họ tên: </td>
				<td><input type="text" name="namestudent"></td>
			</tr>
			<tr>
				<td>Nhập ngày sinh: </td>
				<td><input type="text" name="birthday"></td>
			</tr>
			<tr>
				<td>Nhập giới tính: </td>
				<td><input type="text" name="gender"></td>
			</tr>
			<tr>
				<td>Nhập địa chỉ: </td>
				<td><input type="text" name="address"></td>
			</tr>
			<tr>
				<td>Khoa: </td>
				<td>
					<select name="namescience">
						<?php
							$sql = "SELECT * FROM science";
							$result = $con->query($sql);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row['scienceid'].'">'.$row['namescience'].'</option>'.'<br>';
								}
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Lớp: </td>
				<td>
					<select name="nameclass">
						<?php
							$sql = "SELECT * FROM class";
							$result = $con->query($sql);
							if($result->num_rows > 0){
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row['classid'].'">'.$row['nameclass'].'</option>'.'<br>';
								}
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" name="addsv" value="Xác nhận">
	</form>

	<?php
		$sql = "SELECT * FROM student, science, class WHERE student.classid = class.classid AND science.scienceid = class.scienceid";
		$query = $con->query($sql);
		$row = $query->fetch_assoc();
		if(isset($_POST['addsv'])){
			$id = $_POST['studentid'];
			$namestudent = $_POST['namestudent'];
			$birthday = $_POST['birthday'];
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			//$namescience = $_POST['namescience'];
			$nameclass = $_POST['nameclass'];
			
			$dk = $con->query("INSERT INTO  student(studentid, fullname, birthday, gender, address, password,classid ,lv) VALUES ('$id', '$namestudent', '$birthday', '$gender', '$address','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '$nameclass' ,'0')");
			if(isset($dk)){
				echo "Thêm thành công";
				header("location: ../admin/studentadmin.php");
			}else{
				echo "Thêm không thành công";
			}
			
		}
	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Điểm chuyên cần</td>
				<td><input type="text" name="diemcc"></td>
			</tr>
			<tr>
				<td>Điểm thi</td>
				<td><input type="text" name="diemthi"></td>
			</tr>
			<tr>
				<td><input type="submit" name="diem" value="Nhập điểm"></td>
			</tr>
		</table>
	</form>

	<?php
		$connect = new mysqli("localhost", "root", "", "qldsv");
		$sql = "SELECT * FROM result, student";
		$result = $connect->query($sql);

		if(isset($_POST['diem'])){
			if($_POST['diemcc']==null ||  $_POST['diemthi']==null){
				echo "Điền thêm thông tin";
			}else{
				$dk=mysqli_query($connect, "INSERT INTO result(diemcc, diemthi) VALUES('".$_POST['diemcc']."', '".$_POST['diemthi']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['phonenumber']."')");
				if (isset($dk)) {
					echo "update thành công";
				}else{
					echo "update không thành công";
				}
			}
		}
	?>
</body>
</html>
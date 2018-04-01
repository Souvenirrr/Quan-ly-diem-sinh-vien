<?php

	if(!isset($_COOKIE['msv'])){
		header("location: ../");
	}
	require_once '../file/connect.php';
	require_once '../file/calculator.php';
	require_once '../file/student.php';	
	require_once '../file/connectselect.php';
	require_once '../file/exit.php';
	//mysqli_set_charset($con,"utf8");


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
 		form {
		    width: 820px;
		    height: 500px;
		    margin-left: auto;
		    margin-right: auto;
		}
		.a {
		    font-size: 40px;
		    margin-left: 20%;
		}
		.table1 {
		    margin-left: 18%;
		}
		div{
			float: left;
		}
		a {
		    float: right;
		    text-decoration: none;
		}
		.hl {
		    float: right;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<label class="hl">Xin chào,
			<?php 
				$stdId = $_COOKIE['msv'];
				$sql = "SELECT * FROM student WHERE student.studentid='$stdId'";
				$query = $con->query($sql);
				$row = $query->fetch_assoc();
				if(isset($_COOKIE['msv'])){
					echo $row['fullname'];
				}
			?>
		</label>
		<label class="a">Bảng điểm sinh viên</label><br>
		<table class="table1">
			<?php 
				info($con);
			?>
		</table>
		<div><label class="b">Học kỳ</label>
		<select name="year">
			<option>
				<?php
					//mysqli_set_charset($con,"utf8");
					$sql = "SELECT DISTINCT semester FROM result";
					$result = $con->query($sql);
					if($result->num_rows > 0){
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['semester'].'">'.$row['semester'].'</option>'.'<br>';

						}
					}
				?>
			</option>
		</select>
		<input type="submit" name="watch" value="Xem điểm">
		<input type="submit" name="exit" value="Thoát"></div><br><br>

		<table border="1" class="table2">
			<tr>
				<td>STT</td>
				<td>Mã môn</td>
				<td>Tên môn</td>
				<td>Số tín chỉ</td>
				<td>Điểm chuyên cần</td>
				<td>Điểm thi</td>
				<td>THTK</td>
				<td>Điểm chữ</td>
				<td>Đánh giá</td>
			</tr>
			<?php
				if(isset($_POST['year'])){
					if(!empty($_POST['year']) && isset($_COOKIE['msv'])){
						diem($con, "result.semester='".$_POST['year']."' AND student.studentid = '".$_COOKIE['msv']."'");
					}else{
						diem($con, "student.studentid = '".$_COOKIE['msv']."'");
					}
				}
			?>
		</table>
	</form>
</body>
</html>
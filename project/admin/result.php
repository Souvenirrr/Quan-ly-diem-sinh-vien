<?php
	require_once '../file/connect.php';
	require_once '../admin/result.php';
	require_once '../admin/selectad.php';
	require_once '../file/calculator.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<h1>Quản lý điểm sinh viên</h1><br>
		
		<label>Học kỳ</label>
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
		<input type="submit" name="show" value="Điểm">
		<input type="submit" name="addscore" value="Thêm điểm"></div><br><br>
		<?php 
			$if = $_GET['msv'];
			$sql = "SELECT * FROM result, student, subject WHERE result.studentid = student.studentid AND subject.subjectid = result.subjectid AND result.studentid = '$if'";
			$result = $con->query($sql);
			if(isset($_POST['addscore'])){
				header("location: ../admin/addscore.php?msv=".$if);
			}
		?>

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
					if(!empty($_POST['year'])){
						diemad($con, "result.semester='".$_POST['year']."' AND student.studentid = '".$if."'");
						echo "a";
					}else{
						diemad($con, "student.studentid = '".$if."'");
					}
				}
			?>

			
		</table>
	</form>
</body>
</html>
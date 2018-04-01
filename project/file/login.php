<?php
		if(isset($_POST['submit']))
		{

			$username = $_POST['username'];
			$password = hash('sha256', $_POST['password']);
			setcookie('msv', $username, time() + (86400*30), "/");
			
			//NẾU đã nhấn nút submit thì làm tiếp những công việc sau
			$sql = "SELECT * FROM student WHERE studentid='".$username."' and password='".$password."'";
			$query = $con->query($sql);
			$row = $query->fetch_assoc();
			
			if($row['studentid'] == $username && $row['password'] == $password && $row['lv'] == 0){
				header("location: file/home.php");
			}else if($row['studentid'] == $username && $row['password'] == $password && $row['lv'] == 1){
				header("location: file/admin.php");
			}else{
				echo "Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại.";
			}
		}
		
?>
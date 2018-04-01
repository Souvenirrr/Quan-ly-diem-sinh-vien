<?php
	if(isset($_POST['exit'])){
		setcookie('msv', ' ' , time() - (86400 * 30), "/");
		header("location: ../");;
	}
	
?>
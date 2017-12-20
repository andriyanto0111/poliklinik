<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("db_poliklinik");

	session_start();
	if (isset($_POST['login'])) {
		$pass = md5($_POST['pass']);
		$sql5 = mysql_query("SELECT * FROM login WHERE username = '$_POST[user]' AND password = '$pass' ");
		$row5 = mysql_num_rows($sql5);
		$dt5 = mysql_fetch_array($sql5);
		if ($row5 == 0) {
			echo "<script>alert('Gagal Login !!')</script>";
			echo "<script>document.location = '../views/login.php'</script>";
		}else{
			if ($dt5['level'] == "admin") {
				$_SESSION['id'] = $dt5['kodelogin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai Admin')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}elseif ($dt5['level'] == "manager") {
				$_SESSION['id'] = $dt5['kodelogin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai Manager')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}elseif ($dt5['level'] == "apotek") {
				$_SESSION['id'] = $dt5['kodelogin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai apotek')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}elseif ($dt5['level'] == "pendaftar") {
				$_SESSION['id'] = $dt5['kodelogin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai pendaftar')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}
		}
	}
 ?>
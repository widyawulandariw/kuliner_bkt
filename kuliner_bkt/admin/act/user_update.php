<?php
include ('../../../connect.php');

//$id = $_POST['id'];
$stewardship_period = $_POST['stewardship_period'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$role = $_POST['role'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$periode = $_POST['periode'];
$username = $_POST['username'];


$sql  = "UPDATE admin set id='$id', name='$nama', password='$pass', role='$role', hp='$no_hp', address='$alamat', stewardship_period='$periode', username='$username' where id='$id'";
$insert = pg_query($sql);

if ($insert)
	{
	echo "<script>alert ('Data Successfully Change');</script>";
	}
else
	{
	echo "<script>alert ('Error');</script>";
	}
	echo "<script>
		eval(\"parent.location='../?page=user_management'\");
		</script>";
?>
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
$aset = $_POST['aset'];
$arrData = explode('-', $aset);
$tabel = $arrData[0]; 
$id_tabel = $arrData[1]; 
echo "$id_tabel";

$sql  = "UPDATE admin set name='$nama', password='$pass', role='$role', hp='$no_hp', address='$alamat', stewardship_period='$periode', username='$username' where username='$username'";
$sql_admin = '';
if($tabel == 'kuliner'){
	$sql_admin  = "UPDATE culinary_place set username='$username' where id='$id_tabel' ";
} else{
	$sql_admin  = "UPDATE souvenir set username='$username' where id='$id_tabel' ";
}

$insert = pg_query($sql);
$insert_admin = pg_query($sql_admin);

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
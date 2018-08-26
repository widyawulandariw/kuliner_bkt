<?php
include ('../../../connect.php');
$id = $_GET['id'];
	
	$sql   = "DELETE from admin where id='$id'";	
	$delete = pg_query($sql);
	if ($delete)
	{
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=user_management'\");</script>";
?>
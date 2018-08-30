<?php
include ('../../../connect.php');
$id = $_GET['id'];
	
	$sql   = "DELETE from admin where username='$id'";
	$sql1  = "UPDATE culinary_place = '' where username='$id'";
	$sql2  = "UPDATE souvenir = '' where username='$id'";
	$sql3  = "UPDATE small_industry = '' where username='$id'";
	$sql4  = "UPDATE hotel = '' where username='$id'";
	$sql5  = "UPDATE tourism = '' where username='$id'";
	$delete = pg_query($sql);
	$delete1 = pg_query($sql1);
	$delete2 = pg_query($sql2);
	$delete3 = pg_query($sql3);
	$delete4 = pg_query($sql4);
	$delete5 = pg_query($sql5);



	$delete = pg_query($sql);
	if ($delete)
	{
		echo "<script>alert ('Data Successfully Deleted');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=user_management'\");</script>";
?>
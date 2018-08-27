<?php
require '../connect.php';
$info = $_GET["info"];

$querysearch ="select small_industry.id,small_industry.name,small_industry.address,small_industry.cp,small_industry.owner,newtable.id_small_industry,newtable.price,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat, newtable.product_small_industry from (select detail_product_small_industry.id_small_industry,detail_product_small_industry.price, string_agg(product_small_industry.product, ', ') as product_small_industry from detail_product_small_industry join product_small_industry on product_small_industry.id = detail_product_small_industry.id_product where detail_product_small_industry.id_small_industry='$info' group by detail_product_small_industry.id_small_industry,detail_product_small_industry.price) as newtable join small_industry on small_industry.id = newtable.id_small_industry";




$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil)){
	$id=$row['id'];
	$name=$row['name'];	 
	$address=$row['address'];
	$cp=$row['cp'];
	$owner=$row['owner'];  
	$price=$row['price'];
	$product_small_industry=$row['product_small_industry'];		 
	$longitude=$row['lng'];
	$latitude=$row['lat'];
	$dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp,'owner'=>$owner,'close'=>$close,'product_small_industry'=>$product_small_industry,'price'=>$price,'longitude'=>$longitude,'latitude'=>$latitude);
}

// $querysearch ="select souvenir.id, souvenir.name, souvenir.owner, souvenir.address, souvenir.cp, status.status, souvenir_type.name as nama, ST_X(ST_Centroid(souvenir.geom)) AS lng, ST_Y(ST_CENTROID(souvenir.geom)) As lat from souvenir join status on souvenir.id_status=status.id join souvenir_type on souvenir.id_souvenir_type=souvenir_type.id where souvenir.id='$info'";	   
// $hasil=pg_query($querysearch);
// while($row = pg_fetch_array($hasil))
// 	{
// 		  $id=$row['id'];
// 		  $name=$row['name'];
// 		  $nama=$row['nama'];
// 		  $status=$row['status'];
// 		  $address=$row['address'];
// 		  $cp=$row['cp'];
// 		  $owner=$row['owner'];
// 		  $longitude=$row['lng'];
// 		  $latitude=$row['lat'];
// 		  $dataarray[]=array('id'=>$id,'name'=>$name,'nama'=>$nama,'status'=>$status,'address'=>$address,'owner'=>$owner,'cp'=>$cp,'longitude'=>$longitude,'latitude'=>$latitude);
// 	}
echo json_encode ($dataarray);
?>

<?php
require '../connect.php';
$info = $_GET["info"];


$querysearch ="SELECT souvenir.id,souvenir.name,souvenir.address,souvenir.cp,souvenir.id_status,souvenir.id_souvenir_type,souvenir.owner,newtable.id_souvenir,newtable.price,ST_X(ST_Centroid(souvenir.geom)) AS lng, ST_Y(ST_CENTROID(souvenir.geom)) As lat, newtable.product_souvenir from (select detail_product_souvenir.id_souvenir,detail_product_souvenir.price, string_agg(product_souvenir.product, ', ') as product_souvenir from detail_product_souvenir join product_souvenir on product_souvenir.id = detail_product_souvenir.id_product where detail_product_souvenir.id_souvenir='$info' group by detail_product_souvenir.id_souvenir,detail_product_souvenir.price) as newtable join souvenir on souvenir.id = newtable.id_souvenir";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];		   
		  $price=$row['price'];
		  $dataproduct=$row['product_souvenir'];		 
		  $product_souvenir=$row['product_souvenir'];		 
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];

		  $stat=$row['id_status'];
		  $status= '';
		  if ($stat=='a'){
		  $status = 'Sales';
		} else if ($stat=='b') {
		  $status = 'Manufacture';
		} else if ($stat=='c'){
		  $status = 'Sales & Manufacture';
		}

		$typ=$row['id_souvenir_type'];
		$type= '';
		  if ($typ='a'){
		  $type = 'Various Sanjai';
		} else if ($typ=='b') {
		  $type = 'Coffee Powder';
		} else if ($typ=='c') {
		  $type = 'Various Cake';
		} else if ($typ=='d') {
		  $type = 'Bukittinggi Shirt';
		}


		$dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp,'owner'=>$owner,'status'=>$status,'type'=>$type,'product_souvenir'=>$product_souvenir,'dataproduct'=>$dataproduct,'price'=>$price,'longitude'=>$longitude,'latitude'=>$latitude);
		
	}

$querysearch2 ="select small_industry.id,small_industry.name,small_industry.address,small_industry.cp,small_industry.id_status,small_industry.id_industry_type,small_industry.owner,newtable.id_small_industry,newtable.price,ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) As lat, newtable.product_small_industry from (select detail_product_small_industry.id_small_industry,detail_product_small_industry.price, string_agg(product_small_industry.product, ', ') as product_small_industry from detail_product_small_industry join product_small_industry on product_small_industry.id = detail_product_small_industry.id_product where detail_product_small_industry.id_small_industry='$info' group by detail_product_small_industry.id_small_industry,detail_product_small_industry.price) as newtable join small_industry on small_industry.id = newtable.id_small_industry";
// echo $querysearch2;
$hasil2=pg_query($querysearch2);
while($row = pg_fetch_array($hasil2))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $cp=$row['cp'];
		  $owner=$row['owner'];
		  $price=$row['price'];
		  $dataproduct=$row['product_small_industry'];		 
		  $product_small_industry=$row['product_small_industry'];		 
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];

		$stat=$row['id_status'];
		$status= '';
		if ($stat=='a'){
		$status = 'Sales';
		} else if ($stat=='b') {
		$status = 'Manufacture';
		} else if ($stat=='c'){
		$status = 'Sales & Manufacture';
		}

		$typ=$row['id_industry_type'];
		$type= '';
		  if ($typ='a'){
		  $type = 'Various Sulaman';
		} else if ($typ=='b') {
		  $type = 'Various Bordiran';
		} else if ($typ=='c') {
		  $type = 'Sulaman & Bordiran';
		} else if ($typ=='d') {
		  $type = 'Tenunan';
		}

		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp,'owner'=>$owner,'status'=>$status,'type'=>$type,'close'=>$close,'product_small_industry'=>$product_small_industry,'dataproduct'=>$dataproduct,'price'=>$price,'longitude'=>$longitude,'latitude'=>$latitude);
	}	
	
echo json_encode ($dataarray);
?>

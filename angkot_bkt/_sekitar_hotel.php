<?php

	include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
	$rad=$_GET['rad'];

	$querysearch="SELECT id, name, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), hotel.geom) as jarak FROM hotel where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), hotel.geom) <= ".$rad.""; 

	$hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $jarak=$baris['jarak']; 
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name, 'jarak'=>$jarak,'lng'=>$lng,'lat'=>$lat);
            }
            echo json_encode ($dataarray);
?>
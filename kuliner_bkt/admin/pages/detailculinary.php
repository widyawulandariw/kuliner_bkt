<?php
require '../../connect.php';
$id=$_GET["id"];

$query="SELECT culinary_place.id,name,address,cp,open,close,capacity,employee, ST_X(ST_Centroid(culinary_place.geom)) AS lng, ST_Y(ST_CENTROID(culinary_place.geom)) As lat FROM culinary_place  where culinary_place.id='$id' ";

$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
	$id=$row['id'];
	$name=$row['name'];
	$address=$row['address'];
	$cp=$row['cp'];
	$open=$row['open'];
	$close=$row['close'];
	$capacity=$row['capacity'];
	$employee=$row['employee'];
	 $lat=$row['lat'];
	$lng=$row['lng'];
	if ($lat=='' || $lat==''){
		$lat='<span style="color:red">Kosong</span>';
		$lng='<span style="color:red">Kosong</span>';
	}
}
?>
<!-- Default box -->

          <div class="row mt">
           <div class="col-lg-7 ds" style="background-color:#f2f2f2;margin-left:30px;margin-bottom:20px">
				<div class="box-header with-border">
				  <h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h2>
				</div>

                <!-- First Action -->
              	<div class="panel-body">
                  	<table>
						<tbody  style='vertical-align:top;'>
						<tr><td><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						<tr><td><b>Telephone</b></td><td>:</td><td><?php echo $cp ?></td></tr>
						<tr><td><b>Open</b> </td><td>: </td><td><?php echo $open ?></td></tr>
						<tr><td><b>Close</b> </td><td>: </td><td><?php echo $close ?></td></tr>
						<tr><td><b>Capacity</b> </td><td>: </td><td><?php echo $capacity ?></td></tr>
						<tr><td><b>Employee</b> </td><td>: </td><td><?php echo $employee ?></td></tr>
						<tr><td><b>Data Spasial</b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <b>Longitude</b> : <?php echo $lng ?></td></tr>
						<tr><td><b>Culinary</b> </td><td>: </td><td>
						<ul style="padding-left:20px;">
							<table class="table table-hover table-bordered table-striped">
							<thead><th>Jenis Kuliner</th><th>Harga</th></thead>
							<tbody>													
							<?php 
								$queryl = "select * from detail_culinary join culinary on detail_culinary.id_culinary=culinary.id where id_culinary_place='$id' order by detail_culinary.id_culinary";
								$hasill=pg_query($queryl);
								while($rowl = pg_fetch_array($hasill)){
							?>
							<tr>
								<td><?php echo $rowl['name']; ?></td>
								<td><?php echo $rowl['price']; ?></td>
							</tr>
							<?php } ?>
							</tbody>
							</ul>
							</table>
						<a href="?page=forml&id=<?php echo $id ?>" class="btn btn-round btn-warning"><i class="fa fa-edit"></i> Set Culinary</a></td></tr>


						<tr><td><b>Facility<b> </td><td>: </td><td><ul style="padding-left:20px;">
							<table class="table table-hover table-bordered table-striped">
							<thead><th >Facility</th></thead>
							<tbody>
																	
							<?php 
								$queryl = "select * from detail_facility_culinary join facility_culinary on detail_facility_culinary.id_facility=facility_culinary.id where id_culinary_place='$id' order by detail_facility_culinary.id_facility";
								$hasill=pg_query($queryl);

								while($rowl = pg_fetch_array($hasill)){
									// echo '<li>'.$rowl['name'].'</li>';
									// echo '<li>'.$rowl['price'].'</li>';
								
							?>
							<tr>
							<td><?php echo $rowl['facility']; ?></td>
							
							</tr>
							<?php } ?>
							</tbody>
							</ul>
							</table>
							<a href="?page=formlfas&id=<?php echo $id ?>" class="btn btn-round btn-warning"><i class="fa fa-edit"></i> Set Facility</a></td></tr>

						</tbody>
					</table>
					</ul>
				</div>

				<div class="box-footer">
					<div class="btn-group">
					</div>
					<!-- <br><br> -->
					<td><div class="btn-group"><a href="?page=culinary" class="btn btn-primary pull-left"><i class="fa fa-chevron-left"></i> Kembali</a> </div>
					<div class="btn-group"><a href="?page=formeditspasialkul&id=<?php echo $id ?>" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Edit Data</a></div>
					</td>
				</div><!-- /.box-footer-->
            </div>


	<div class="col-lg-1 col-xs-1">
	</div>

	<div class="col-lg-3 col-xs-3" style="background-color:#f2f2f2">
		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Foto</h3>
			  <h4 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h4>
			</div>
			<div class="box-body">
					<?php $id=$_GET['id'] ?>
							<?php
							$querysearch="SELECT gallery_culinary FROM culinary_gallery where id='$id'";

							$hasil=pg_query($querysearch);
							 
							 while($baris = pg_fetch_array($hasil))
							 {
							 	?>
										<image src="../img/<?php echo $baris['gallery_culinary']; ?>" style="width:30%;">
									<?php
							 }
							?>
			</div>
			<br>
			<div class="box-footer">
				<div class="btn-group">
				</div>

					<form role="form" action="act/uploadphotokul.php" enctype="multipart/form-data" method="post">
					  <div class="box-body">
						
						<input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group">
						  <label for="file">Upload Foto</label>
						  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
						</div>
						<span style="color:red;">*Ukuran gambar maksimal 500kb</span>
					  </div><!-- /.box-body -->

					  <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
					  </div>
					</form>
			</div><!-- /.box-footer-->

			<br>
		</div>
	</div>

	<div class="col-lg-1 col-xs-1"></div>



</div>



</div>
<script>
	
</script>
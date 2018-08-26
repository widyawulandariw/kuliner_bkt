<div class="col-sm-12"> <!-- menampilkan form add facility-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update User</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                        <?php if (isset($_GET['id'])){
					$id=$_GET['id'];
          $period=$_GET['stewardship_period'];
					$sql = pg_query("SELECT stewardship_period,id, name, address, hp, role, username, password FROM admin where id='$id'");
					$data = pg_fetch_array($sql)							
						?>
        <form class="form-horizontal style-form" role="form" action="act/user_update.php" method="post">
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id']?>">
        <input type="text" class="form-control hidden" id="stewardship_period" name="stewardship_period" value="<?php echo $data['stewardship_period']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama">Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['name']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="periode">Stewardship Period</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="periode" value="<?php echo $data['stewardship_period']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="alamat">Address</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['address']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp">Contact</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="no_hp" value="<?php echo $data['hp']?>">
		  </div>
        </div>
    <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="role">Role</label>
		  <div class="col-sm-10">
          <select required name="role" class="form-control">
            <option value="A">Admin</option>
            <option value="P">Hotel's Admin</option>        
          </select>
		  </div>
    </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id">Hotel</label>
		  <div class="col-sm-10">
          <select  name="id" id="id" class="form-control">
		  <option value='0'>None</option>
             <?php
                                
              $mesjid=pg_query("select * from hotel ");
			  
			  while($mes = pg_fetch_assoc($mesjid))
              {
			  
			   if ($data[id]==$mes[id]){
				echo "<option value=\"$mes[id]\" selected>$mes[name]</option>";}
				else{
				echo"<option value=".$mes['id'].">".$mes['name']."</option>";}
			}             
              ?>                 
          </select>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>">
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="password">Password</label>
		  <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Dont forget to input password again">
		  </div>
        </div>  
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>  
</form>
<?php } ?>
                      </div>                   
                  </div>
                    </div>
                </section>
</div>
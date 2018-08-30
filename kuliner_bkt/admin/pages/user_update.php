<div class="col-sm-12"> <!-- menampilkan form add facility--> 
    <section class="panel"> 
    <div class="panel-body"> 
      <a class="btn btn-compose">Update User</a> 
    <div class="box-body"> 
              
    <div class="form-group"> 
    <?php if (isset($_GET['username'])) 
    { 
          $username=$_GET['username']; 
          $period=$_GET['stewardship_period']; 
          $sql = pg_query("SELECT stewardship_period, name, address, hp, role, username, password FROM admin where username='$username'"); 
          $data = pg_fetch_array($sql)               
            ?> 
    <form class="form-horizontal style-form" role="form" action="act/user_update.php" method="post"> 
    <input type="text" class="form-control hidden" id="username" name="username" value="<?php echo $data['username']?>"> 
    <input type="text" class="form-control hidden" id="stewardship_period" name="stewardship_period" value="<?php echo $data['stewardship_period']?>"> 
         
    <br> 
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
      <option <?php if($data['role']=='A') {echo "selected";}?> value="A">Admin</option>
      <option <?php if($data['role']=='P') {echo "selected";}?> value="P">Owner's Admin</option>      
    </select> 
      </div> 
    </div> 
     
    <div class="form-group"> 
    <label class="col-sm-2 col-sm-2 control-label" for="id">Admin of</label> 
     
    <div class="col-sm-10"> 
    <select  multiple id="id" name="aset" class="form-control"> 
       
      <?php                         
      $kuliner=pg_query("SELECT * from culinary_place where username is null or username = '$_GET[username]'"); 
      while($kul = pg_fetch_assoc($kuliner)) 
      { 
        if ($data['username']==$kul['username']) 
          { 
            echo "<option value='kuliner-$kul[id]' selected>$kul[name]</option>"; 
          } 
          else 
          { 
            echo"<option value='kuliner-$kul[id]'>".$kul['name']."</option>"; 
          } 
        }              
      ?> 
 
 
      <?php                         
      $souvenir=pg_query("SELECT * from souvenir"); 
      while($sou = pg_fetch_assoc($souvenir)) 
      { 
        if ($data['username']==$sou['username']) 
          { 
            echo "<option value='souvenir-$sou[id]' selected>$sou[name]</option>"; 
          } 
          else 
          { 
            echo"<option value='souvenir-$sou[id]'>".$sou['name']."</option>"; 
          } 
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
<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src="icon/home.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Local Transport (LT)</h5>

                  <li class="sub">
                      <a onclick="listAngkot();" style="cursor:pointer;background:none">List LT</a>
                  </li>

                  <li class="sub">
                      <a onclick="" style="cursor:pointer;background:none">LT Around You</a>
                      <ul class="sub">
                        <li style="margin-top:10px"><input id="inputradius" type="range" name="inputradius" data-highlight="true" min="1" max="10" value="1"></li>                             
                        <li><a onclick="angkot_sekitar_user();" style="cursor:pointer;background:none">Search</a></li>
                      </ul>                     
                  </li>

                  <li class="sub">
                      <a style="cursor:pointer;background:none">Search By Destination</a>
                      <ul class="sub">
                        <li style="margin-top:10px"><input id="input_jurusan" type="text" class="form-control"></li>                             
                        <li><a onclick="angkot_sekitar_destination(1)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                  </li>

                  <li class="sub">
                      <a style="cursor:pointer;background:none">Search By Track</a>
                      <ul class="sub">
                        <li style="margin-top:10px"><input id="input_track" type="text" class="form-control"></li>                             
                        <li><a onclick="angkot_sekitar_destination(2)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                  </li>

                  <li class="sub">
                      <a style="cursor:pointer;background:none">Search By Color</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                        <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_jenis">
                          <?php                      
                          include('../connect.php');    
                          $querysearch="SELECT id, color FROM angkot_color"; 
                          $hasil=pg_query($querysearch);

                            while($baris = pg_fetch_array($hasil)){
                                $id=$baris['id'];
                                $color=$baris['color'];
                                echo "<option value='$id'>$color</option>";
                            }
                          ?>
                        </select>
                        </li>                             
                        <li><a onclick="angkot_sekitar_destination(3)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                  </li>

                  <li class="sub">
                      <a onclick="hapus_Semua();menu_angkot_track()" style="cursor:pointer;background:none">LT Recommendations</a>
                  </li>

                  <li class="sub">
                      <a href="apps.apk" download>Download Android Apps</a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
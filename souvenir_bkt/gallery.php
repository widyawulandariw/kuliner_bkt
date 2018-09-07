<?php 
session_start();
 ?>
 <!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>1311521018</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    
    
    <!--  Slide -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
    </style>

    <script src="assets/js/chart-master/Chart.js"></script>

    <script src="../config_public.js"></script>
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"> </script>

    <!--LOADER-->
    <style>
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
  
  </head>

<body onload="init();detsou('<?php echo $_GET["idgallery"] ?>');">

  <section id="container" >
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>

      <!--logo start-->
      <a class="logo"><p><b>WEB</b><b style="font-size: 17px">GIS</b> - <b>S</b>ouvenir</p></a>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none"></div></li>
            <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          </ul>
        </div>
        <h4>
        
        <!-- <div class="top-menu">
          <ul class="nav pull-right" style="margin-top: 6px">
            <a href="admin/" class="logo1" title="Login" ><img src="image/login.png">
        <!-- <i class="fa fa-user"></i>
        <span>Login</span></a>
              </ul>
            </div></h4> --> -->
      </header>

      <aside>

          <div id="sidebar"  class="nav-collapse " >
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a href="#"><img src="assets/img/kuliner.png" class="img-circle" width="150" height="120"></a></p>
              <h5 class="centered">Hi,
              <?php 
              if ($_SESSION['C'] == true) {
                echo $_SESSION['username']; 
              }
              else{
                echo "Visitor";
              }
              
              ?>&nbsp!</h5>

              <li class="sub-menu">
                      <a class="active" href="index.php">
                          <i class="fa fa-hand-o-left"></i>
                          <span>Back</span>
                      </a>
                  </li>
        </ul>
          </div>
      </aside>

      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row">
          <div class="col-lg-12 main-chart"> 
           <div class="col-sm-12">
              <div class="col-sm-6"> <!-- information -->
                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Detail Informasi</b></h2>
                    </header>

                    <div class="panel-body">
                      <table id="detgal" class="table">
                        <tbody  style='vertical-align:top;'>
                          
                        </tbody>          
                      </table>

                      
                    </div>
                  </section>

                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Info</b></h2>
                    </header>

                    <?php 
                     require '../connect.php';
                      $id = $_GET["idgallery"];
                     // echo "ini $id";

                      if(strpos($id,"RM") !== false){
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id,"SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id, "IK") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"H") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"tw")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }
                        
                      $result = pg_query($sqlreview);
                    ?>
                    <table class="table">
                      <thead><th>Tanggal</th><th class="centered">Info</th></thead>
                    <?php  
                      while ($rows = pg_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info =$rows['id_informasi'];
                          echo "<tr><td>$tgl</td><td>$info</td><td></td></tr>";
                        }
                    

                       ?>               
                    
                  </table>

                    <div class="panel-body">
                      <!-- <table id="detgal" class="table">
                        <tbody  style='vertical-align:top;'>

                        <tr><td>Name :</td><td><textarea cols="30" rows="1"></textarea></td></tr>
                        <tr><td>Comment :</td><td><textarea cols="30" rows="5"></textarea></td></tr>
                        <tr><td><input type="submit" value="Post Comment"/></td><td></td></tr>
                          
                        </tbody>          
                      </table> -->

                      
                    </div>
                  </section>

                  <section class="panel">

                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize;"><b> Visitor's Reviews</b></h2>
                    </header>

                    <div class="panel-body">

                      <table id="detgal" class="table">

                      <form method="POST" action="insert_comment.php">
                          <tbody  style='vertical-align:top;'>
                          <input type="hidden" name="id" value="<?php echo $_GET['idgallery']; ?>">
                          <?php 
                          if ($_SESSION['C'] == true) 
                          {
                            echo "<tr><td>Name :</td><td><textarea cols='30' rows='1' name='nama'></textarea></td></tr>
                          <tr><td>Comment :</td><td><textarea cols='30' rows='5' name='comment'></textarea></td></tr>
                          <tr><td><input type='submit' value='Post Comment'/></td><td></td></tr>";
                          }
                          ?>
                            
                          </tbody>          
                      </table>
                      </form>

                      <?php 

                      require '../connect.php';
                      $id = $_GET['idgallery']; 

                      if (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * FROM review where id_kuliner = '$id'";
                      } elseif (strpos($id,"SO") !== false) {
                        $sqlreview = "SELECT * FROM review where id_souvenir = '$id'";
                      } elseif (strpos($id,"IK") !== false) {
                        $sqlreview = "SELECT * FROM review where id_ik = '$id'";
                      } elseif (strpos($id,"H") !== false) {
                        $sqlreview = "SELECT * FROM review where id_hotel = '$id'";
                      } elseif (strpos($id,"OW") !== false) {
                        $sqlreview = "SELECT * FROM review where id_ow = '$id'";
                      }


                      $result = pg_query($sqlreview);
                      ?>

                      <table class="table"> 
                      <?php 
                      while ($rows = pg_fetch_array($result))
                      {
                        $nama = $rows ['name'];
                        $komen = $rows['comment'];
                        echo "<tr><td>Name</td><td>:</td><td>$nama</td></tr><tr><td>Comment</td><td>:</td><td>$komen</td></tr>";
                      }

                      
                       ?>
                      </table>
                        




                      
                    </div>
                  </section>                 



            
              </div>

              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12"> <!-- gallery -->
                    <section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-compose">Gallery</a>
                            <div class="content" style="text-align:center;">
                            <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="250" data-resizemode="fit">  
                              
                            <?php
                            require '../connect.php';

                            $id = $_GET["idgallery"];
                            if (strpos($id,"H") !== false) {  //Hotel

                              $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_hotel']."'><img style='width:100%' src='../_foto/".$baris['gallery_hotel']."'></a>";
                                }
                              }
                    
                            } elseif (strpos($id,"tw") !== false) {  //Tourism

                              $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_tourism']."'><img style='width:100%' src='../_foto/".$baris['gallery_tourism']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"SO") !== false) {  //Souvenir

                              $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img style='width:100%' src='../_foto/".$baris['gallery_souvenir']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"RM") !== false) {  //Kuliner

                              $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_culinary']."'><img style='width:100%' src='../_foto/".$baris['gallery_culinary']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"M") !== false) {  //Worship

                              $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img style='width:100%' src='../_foto/".$baris['gallery_worship_place']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"IK") !== false) {  //Industry

                              $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_industry']."'><img style='width:100%' src='../_foto/".$baris['gallery_industry']."'></a>";
                                }
                              }

                            } elseif (strpos($id,"R") !== false) {  //Restoran

                              $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img style='width:100%' src='../_foto/".$baris['gallery_restaurant']."'></a>";
                                }
                              }

                            } else {  //Angkot

                              $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  
                              //echo "$querysearch";     
                              echo "<script language='javascript'>alert('$querysearch');</script>";   
                              $hasil=pg_query($querysearch);
                              while($baris = pg_fetch_assoc($hasil)){
                                if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                                  echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                }
                                else{
                                  echo "<a href='../_foto/".$baris['gallery_angkot']."'><img style='width:100%' src='../_foto/".$baris['gallery_angkot']."'></a>";
                                }
                              }

                            }
                        ?>
                                      
                            </div>
                            </div>
                        </div>
                    </section>
                    
                  </div>
                  <div class="col-sm-12"> <!-- peta -->
                    <div class="white-panel pns">

                      <header class="panel-heading" style="float:left">
                      <label style="color: black; margin-right:20px">Google Map with Location List</label>
                      <button type="button" onclick="posisisekarang()" class="btn btn-default " data-toggle="tooltip" id="posisinow" title="Posisi Saya" 
                    style="margin: 15px" style="margin-right: 7px;" ><i class="fa fa-location-arrow" > </i>
                      </button>

                       <button type="button" onclick="lokasimanual()" class="btn btn-default"  data-toggle="tooltip" id="posmanual" title="Posisi Manual" 
                              style="margin-right: 7px;"><i class="fa fa-map-marker" ></i>
                      </button>
                                            
                       <label id="tombol">
                       <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legenda" style="margin-right: 7px;"><i class="fa fa-eye"></i>
                       </a>
                       </label>
                              </header>
                              <div class="row">
                                 <div class="col-sm-6 col-xs-6"></div>
                               </div>                        
                               <div id="map" class="centered" style="height:260px">
                               </div>
                            </div>
                    
                    
                  </div>
                  
                </div>
                
              </div>
          
            </div>
          </div>
        </div>

        </section>
      
      </section>

      <!-- <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
            <div class="col-sm-6">
                        <div class="white-panel pns">

                          <header class="panel-heading" style="float:left">
                            <label style="color: black; margin-right:20px">Google Map with Location List</label>
                            <a class="btn btn-default" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" ><i class="fa fa-location-arrow" style="color:black;"></i></a>
                            <a class="btn btn-default" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:10px"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                          </header>
                          <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>                        
                           <div id="map" class="centered" style="height:260px">
                           </div>
                        </div>
            </div>


              <div class="col-sm-6" id="result">

                <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Gallery</a>
                        <div class="content" style="text-align:center;">
                        <div class="html5gallery" style="max-height:700px;overflow:auto;" data-skin="horizontal" data-width="500" data-height="400" data-
                        resizemode="fit">  
                        
                        <?php
                        require '../connect.php';

                        $id = $_GET["idgallery"];
                        if (strpos($id,"H") !== false) {  //Hotel

                          $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_hotel']."'><img style='width:100%' src='../_foto/".$baris['gallery_hotel']."'></a>";
                            }
                          }
                
                        } elseif (strpos($id,"tw") !== false) {  //Tourism

                          $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_tourism']."'><img style='width:100%' src='../_foto/".$baris['gallery_tourism']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"SO") !== false) {  //Souvenir

                          $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img style='width:100%' src='../_foto/".$baris['gallery_souvenir']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"RM") !== false) {  //Kuliner

                          $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_culinary']."'><img style='width:100%' src='../_foto/".$baris['gallery_culinary']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"M") !== false) {  //Worship

                          $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img style='width:100%' src='../_foto/".$baris['gallery_worship_place']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"IK") !== false) {  //Industry

                          $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_industry']."'><img style='width:100%' src='../_foto/".$baris['gallery_industry']."'></a>";
                            }
                          }

                        } elseif (strpos($id,"R") !== false) {  //Restoran

                          $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img style='width:100%' src='../_foto/".$baris['gallery_restaurant']."'></a>";
                            }
                          }

                        } else {  //Angkot

                          $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  
                          //echo "$querysearch";     
                          echo "<script language='javascript'>alert('$querysearch');</script>";   
                          $hasil=pg_query($querysearch);
                          while($baris = pg_fetch_assoc($hasil)){
                            if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                              echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='../_foto/".$baris['gallery_angkot']."'><img style='width:100%' src='../_foto/".$baris['gallery_angkot']."'></a>";
                            }
                          }

                        }
                    ?>
                                  
                        </div>
                        </div>
                    </div>
                </section>
              </div>
                      
          </div>
        </section>
         
      </section> -->

      <!-- <footer class="site-footer">
          <div class="text-center">
              1311521018 - Fitriany Chairunnisa
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="_map.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <script src="assets/js/advanced-form-components.js"></script>      
    <script>

var slideIndex = 1;
var server = 'http://localhost/html1/souvenir_bkt/'
//showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

<script>

    var map;
    var markersDua = [];
    var koordinat = 'null'
    var infoposisi = [];
    var markerposisi = [];
    var centerLokasi;
    var markerposisi = [];
    var centerBaru;
    var cekRadiusStatus = "off"; 
    var circles = [];
    var rad;
    var fotosrc = 'image/';
    var angkot = [];
    var directionsDisplay;
    var infoDua=[];
    var rute = [];
    var color = "";

   
    //Membuat Fungsi Saat Onload
    function init()
    {
      basemap();
      viewdigitcul();
      viewdigitkec();
    }

    function hapusrouteangkot() 
    {
      for (var i = 0; i < angkot.length; i++) 
      {
        angkot[i].setMap(null);
      }
    }


    //Menampilkan Detail Info Kuliner
    function detsou(id14433){  
      
      $('#info').empty();
      $('#tampilangkotsekitarik').hide();
      $("#hasilrute").hide();
      $('#hasilcaridetculi').empty();
      $('#hasilcaridetculi1').show();
      $('#hasildet').show();
      $('#hasilcaridet').empty();
      $('#hasilcaridet1').show();
       hapusInfo();
       clearroute2();
       clearroute();
       hapusrouteangkot();
       hapusMarkerTerdekat();
          console.log('aaa');
          
           $.ajax({ 
          url: server+'detsou.php?info='+id14433, data: "", dataType: 'json', success: function(rows)
            { 

             console.log(rows);
              $('#hasilcaridet').append("<tr><td colspan='2'><strong><tr><td><b> Place's Status </b></td><td>:</td><td>"+rows[0].status+"</td></tr><tr><td><b> Souvenir's Type </b></td><td>:</td><td>"+rows[0].type+"</td></tr><td colspan='2'><strong>Product</strong></td><td><strong>Price</strong></td></tr>");
               console.log('bb');
             for (var i in rows) 
              { 
                console.log('ddd');
                var row = rows[i];
                var id = row.id;
                var name = row.name;
                
                var address=row.address;
                var cp=row.cp;
                var owner=row.owner;
               
                var price = row.price;
                var status = row.status;
                var type = row.type;
                var product_souvenir = row.product_souvenir; 
                var dataproduct = row.dataproduct; 
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;
                centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
                marker = new google.maps.Marker
                ({
                  position: centerBaru,
                  icon:'assets/img/souv.png',
                  map: map,
                  animation: google.maps.Animation.DROP,
                });
                  console.log(latitude);
                  console.log(longitude);
                  console.log(id);
                  markersDua.push(marker);
                map.setCenter(centerBaru);
                map.setZoom(18); 

                    // $('#hasilcaridet').append("<tr><td colspan='2'> "+product_souvenir+"</td><td> "+price+"</td></tr>");
                    if(i==0){
                      $('#detgal').append("<tr><td>Nama</td><td>:</td><td> "+name+"</td></tr><br><tr><td>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td>Telepon</td><td>:</td><td> "+cp+"</td></tr><br><tr><td>Owner</td><td>:</td><td> "+owner+"</td></tr><br><tr><td>Place's Status</td><td>:</td><td> "+status+"</td></tr><br><tr><td>Type</td><td>:</td><td> "+type+"</td></tr><tr><td><b> Product </b></td><td></td><td><b> Price </b></td></tr>");
                    }
                    $('#detgal').append("<tr><td colspan='2'> "+dataproduct+"</td><td> "+price+"</td></tr>)");

                infowindow = new google.maps.InfoWindow({
                position: centerBaru,
                // content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+name+"</td></tr><br><tr><td><i class='fa fa-map-marker'></i>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td><i class='fa fa-phone'></i>Telepon</td><td>:</td><td> "+cp+"</td></tr><br><tr><td><i class='fa fa-clock-o'></i>Owner</td><td>:</td><td> "+owner+"</td></tr></table></span><br><input type='button' class='btn btn-success' value='Object Arround' onclick='tampil_sekitar(\""+latitude+"\",\""+longitude+"\",\""+name+"\")'<br>&nbsp&nbsp<input type='button' class='btn btn-success' value='Gallery' onclick='gallery(\""+id+"\")'<br>&nbsp&nbsp <input type='button' class='btn btn-success' value='Route' onclick='callRoute(centerLokasi,centerBaru);rutetampil()' />",  

                content: "<center><span style=color:black><b>Information</b><table><tr><td><i class='fa fa-home'></i>Nama</td><td>:</td><td> "+name+"</td></tr>",
                pixelOffset: new google.maps.Size(0, -33)
                });
              infoposisi.push(infowindow); 
              hapusInfo();
              infowindow.open(map);
                
              }  
            }
          }); 
    }


    //Menampilkan Detail Info Kuliner
    // function detsousou(id144){  
      
    //    $('#info').empty();
    //    $('#tampilangkotsekitarik').hide();
    //    $("#hasilrute").hide();
    //    $('#hasilcaridetculi').empty();
    //    $('#hasilcaridetculi1').show();
    //    $('#hasildet').show();
    //    $('#hasilcaridet').empty();
    //    $('#hasilcaridet1').show();
    //    hapusInfo();
    //    hapusrouteangkot();
    //    clearroute2();
    //    clearroute();
    //    hapusMarkerTerdekat();
    //        $.ajax({ 
    //       url: server+'detailinfosou.php?info='+id144, data: "", dataType: 'json', success: function(rows)
    //         { 
    //          for (var i in rows) 
    //           { 
    //             console.log('ddd');
    //             var row = rows[i];
    //             var id = row.id;
    //             //var namaa = row.name;
    //             var nama = row.nama;
    //             var status = row.status;
    //             var address=row.address;
    //             var cp=row.cp;
    //             var owner=row.owner;
    //             var price = row.price;
    //             var status = row.status;
    //             var type = row.type;
    //             var product_souvenir = row.product_souvenir; 
    //             var latitude  = row.latitude; ;
    //             var longitude = row.longitude ;
    //             centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
    //             //markersDua.push(marker);
    //             marker = new google.maps.Marker
    //             ({
    //               position: centerBaru,
    //               icon: 'assets/img/souv.png',
    //               map: map,
    //               animation: google.maps.Animation.DROP,
    //             });
    //             console.log(latitude);
    //             console.log(longitude);
    //             map.setCenter(centerBaru);
    //             map.setZoom(18); 
    //               $('#hasilcaridet').append("<tr><td><b> Place's Status </b></td><td>:</td><td> "+status+"</td></tr>");
    //               $('#hasilcaridet').append("<tr><td><b> Souvenir's Type </b></td><td>:</td><td> "+nama+"</td></tr>");
    //               // $('#detgal').append("<tr><td>Nama</td><td>:</td><td> "+name+"</td></tr><br><tr><td>Alamat</td><td>:</td><td> "+address+"</td></tr><br><tr><td>Telepon</td><td>:</td><td> "+cp+"</td></tr><br><tr><td>Owner</td><td>:</td><td> "+owner+"</td></tr><br><tr><td>Place's Status</td><td>:</td><td> "+status+"</td></tr><br><tr><td>Type</td><td>:</td><td> "+type+"</td></tr><tr><td><b> Product </b></td><td></td><td><b> Price </b></td></tr>");

                    

    //             if (address==null)
    //                     {
    //                       address="tidak ada";
    //                     } 
    //           }  
    //           // detsou(id144);
    //         }
    //       }); 
    // }


    //Mmebuat fungsi menampilkan Peta Google Map
    function basemap() 
    {
      map = new google.maps.Map(document.getElementById('map'), 
      {
        zoom: 13,
        center: new google.maps.LatLng(-0.2986721,100.3764663),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
    }


    //Membuat fungsi menampilkan digitasi kuliner
    function viewdigitcul()
    {
      cull = new google.maps.Data();
      cull.loadGeoJson(server+'culinary.php');
      cull.setStyle(function(feature)
      {
        return({
                fillColor: '#f75d5d',
                strokeColor: '#f75d5d ',
                strokeWeight: 2,
                fillOpacity: 0.5
              });          
      }
      );
      cull.setMap(map);
    }


    //Membuat Fungsi Menampilkan Digitasi Kecamatan (Batas Kecamatan Bukittinggi)
    function viewdigitkec()
    {
      ab = new google.maps.Data();
      ab.loadGeoJson(server+'subdistrict_boundary.php');
      ab.setStyle(function(feature)
      {   
         var gid = feature.getProperty('id');
         console.log("gid="+gid);
         color = '#ff3300';
         console.log(color); 
          if (gid == 'K001'){ color = '#ff3300'; 
            console.log(color); 
            return({
              fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            }); 
        }
          else if(gid == 'K002'){ color = '#ffd777'; 
            return({
            fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            });
        }
          else if(gid == 'K003'){ color = '#ec87ec'; 
            return({
            fillColor:color,
              strokeWeight:2.0,
              strokeColor:'black',
              fillOpacity:0.2,
              clickable: false
            });

        }
                  
      }
      );
      ab.setMap(map);
    }

//Membuat Fungsi Menampilkan Seluruh Souvenir 
function viewsou()
{
  hapusawal();
  $.ajax
  ({ 
    url: server+'viewsou.php', data: "", dataType: 'json', success: function(rows) 
    { 
      if(rows==null)
      {
        alert('Data Did Not Exist!');
      }
      else
      {
        $('#hasilcari').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
        console.log("rownya");
        console.log(rows);
        for (var i in rows) 
        { 
          var row = rows[i];
          var id = row.id;
          var name = row.name;
          var address=row.address;
          var lat=row.lat;
          var lon = row.lng;
          var tabel = row.tabel;
          console.log(name);
          centerBaru = new google.maps.LatLng(lat, lon);
          map.setCenter(centerBaru);
          map.setZoom(13); 
          clickMarker(centerBaru, id); 
          // var marker = new google.maps.Marker
          // ({
          //   position: centerBaru,              
          //   icon:'assets/img/souv.png',
          //   animation: google.maps.Animation.DROP,
          //   map: map
          // });
          // markersDua.push(marker);
          map.setCenter(centerBaru);
          if(tabel == 'sou'){
           $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsou(\""+id+"\");detsousou(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='souangkot(\""+id+"\")'></a></td></tr>");
            
          } else {
           $('#hasilcari').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detsouxx(\""+id+"\");'>Show</a></td><td><a role='button' class='btn btn-danger fa fa-taxi' onclick='ikangkot(\""+id+"\")'></a></td></tr>");
            
          }

        }
      } 
      $('#hasilpencarian').append("<h5 class='box-title' id='hasilpencarian'>Result :</h5>"+rows.length);
    }
  });           
}


    function hapusawal()
    {
      init();
      hapusMarkerTerdekat();
      hapusRadius();
      clearroute2();
      clearangkot();
      clearroute();
      hapusInfo();
      $("#nearbyik").hide();
      $("#hasilrute").hide();
      $("#tampilangkotsekitarik").hide();
      $("#selectkulll").hide();
      $("#selectfacility").hide();
      $('#hasildet').hide();
      $('#hasilcari').empty();
      $('#hasilpencarian').empty();
      $("#filterik").hide();
      $('#hasilik').show();
      $('#hasilcari1').show();
      $('#hasilcari').empty();
      $("#hasilculi").hide();
      $("#hasilsouv").hide();
      $("#hasilindustry").hide();
      $("#hasilobj").hide();
      $("#hasilhotel").hide();
      $("#hasilmosque").hide();
      $("#hasilrestaurant").hide();
    }


    //Membuat Fungsi Hapus Market Terdekat
    function hapusMarkerTerdekat() 
    {
      for (var i = 0; i < markersDua.length; i++) 
      {
        markersDua[i].setMap(null);
      }
    }


    //Fungsi Hapus Radius
    function hapusRadius()
    {
      for(var i=0;i<circles.length;i++)
      {
        circles[i].setMap(null);
      }
      circles=[];
      cekRadiusStatus = 'off';
    }


    function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#rute").remove();
    }     

    }


    function clearangkot(){
          for (i in angkot){
              angkot[i].setMap(null);
            } 
            angkot=[]; 
          }


    function clearroute(){
          for (i in rute){
            rute[i].setMap(null);
          } 
          rute=[]; 
        }

    //Menghapus Info
    function hapusInfo() 
    {
      for (var i = 0; i < infoposisi.length; i++) 
        {
          infoposisi[i].setMap(null);
        }
    }

    function clickMarker(centerBaru, id)
    {
      
      var marker = new google.maps.Marker
        ({
          icon: "assets/img/souv.png",
          position: centerBaru,
          map: map
        });
        markersDua.push(marker);
        
        google.maps.event.addListener(marker, "click", function(){
            detsou1(id);
            //detsousou1(id);
           
          });

    }




    </script>
  </body>
</html>

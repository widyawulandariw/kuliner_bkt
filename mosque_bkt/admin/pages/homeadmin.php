<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a href="?page=addmosque" title="Add Mosque" class="btn btn-compose"><i class="fa fa-plus"></i>List Mosque</a>
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       
                        $sql = pg_query("SELECT * FROM worship_place");
                        while($data =  pg_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['name'];
                        $alamat = $data['address'];
                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td><div class="btn-group">
						<a href="?page=detail&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-list"></i> Detail</a>
						<a href="act/delworship.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
         
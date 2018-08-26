<div class="col-sm-12">  <!-- menampilkan fasilitas-->
    <section class="panel">
        
        <div class="panel-body">
        <a href="?page=user_add" class="btn btn-compose" title="Add User"><i class="fa fa-plus"></i>List User</a>
        <div class="box-body">
            

            <div class="form-group">
            <table id="dataTableExample2" class="table table-hover table-bordered table-striped">
            <br>
            <thead>
            <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Periode</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
            $sql = pg_query("SELECT id, name , stewardship_period, username from admin");
                while($data =  pg_fetch_array($sql)){
                    $id = $data['id'];
                    $username = $data['username'];
                    $nama = $data['name'];
                    $periode = $data['stewardship_period'];          
            ?>
                            
            <tr>
            <td><?php echo "$username"; ?></td>
            <td><?php echo "$nama"; ?></td>
            <td><?php echo "$periode"; ?></td>
            <td>

            <div class="btn-group">
            <a href="?page=user_update&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Update'><i class="fa fa-edit"></i>Update</a>
            
            <a href="act/user_delete.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>

                                    </div>
                                </td>
                            </tr>
            <?php } 
            ?>
                        </tbody>
                    </table> 
                </div>                   
            </div>
        </div>
    </section>
</div>
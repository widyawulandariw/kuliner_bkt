<div class="col-sm-12"> <!-- menampilkan form add facility-->
        <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add Facility</a>
                        <div class="box-body" >

        <form role="form" action="act/insertfas.php" method="post">
          <a class="btn btn-success btn-sm" onclick="add()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a>
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
          <div class="form-group" style="clear:both" id="l_form">
            <label for="nama_fasilitas">Facility</label>
            <input type="text" class="form-control" name="fasilitas[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
        </form>
                  </div>
                    </div>
                </section>
                 </div>

<section class="content-header">
    <h1> Laporan 
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
        <li class="active"><?= $judul ?></li>
    </ol>
</section>

<section class="content">
     <div class="row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul ?></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-4">
                  <form action="<?= site_url('laporan/lap_tgl')?>" method="post">
                    <div class="form-group">
                        <label>From :</label>
                        <input type="date" name="dari" class="form-control">
                    </div>
                </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>To:</label>
                        <input type="date" name="sampai" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-lg btn-primary">Cetak Laporan</button>
                    </div>
                </div>
                
                
                </form>
            </div>
          </div>
        </div>
      </div>
      

      <!-- /.container-fluid -->
    </section>

    <section class="content">
     <div class="row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $judul ?></h3>
            </div>
            <div class="box-body">
                <div class="col-sm-4">
                  <form action="<?= site_url('laporan/lap_barber')?>" method="post">
                    <div class="form-group">
                        <label>From :</label>
                        <input type="date" name="dari" class="form-control">
                    </div>
                </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>To:</label>
                        <input type="date" name="sampai" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Barber:</label>
                        <select name="barber_id" class="form-control select2">
                            <option value="">Select Barber</option>
                            <?php foreach ($employees as $employee): ?>
                                <option value="<?= $employee->employee_id ?>"><?= $employee->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-lg btn-primary">Cetak Laporan</button>
                    </div>
                </div>
                
                
                </form>
            </div>
          </div>
        </div>
      </div>
      

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
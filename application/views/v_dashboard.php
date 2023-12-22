
<section class="content-header">
	<h1> Dashboard	
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<section class="content">
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number"> <?= $this->fungsi->count_sales() ?></span>
              <!-- <small>%</small> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-group"></i></span>
            
            <div class="info-box-content">
              <span class="info-box-text">Customers</span>
              <span class="info-box-number"><?= $this->fungsi->count_customer()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        
        <!-- /.col -->
        <?php if($this->fungsi->user_login()->level == 1) {?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Employee</span>
              <span class="info-box-number"><?= $this->fungsi->count_employee() ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Services</span>
              <span class="info-box-number"><?= $this->fungsi->count_service()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php } ?>
        <!-- /.col -->
      </div>
      

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
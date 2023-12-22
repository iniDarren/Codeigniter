
<section class="content-header">
	<h1> Customer
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Customer/<?=ucfirst($page)?></li>
	</ol>
</section>

<!-- Main Content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <?=ucfirst($page)?> Customer</h3>
            <div class="pull-right">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo">  BACK </i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php // echo  validation_errors()?>
                    <form action="<?= site_url('customer/process')?>" method="post">
                        <div class="form-group">
                            <label for="">Customer Name *</label>
                            <input type="hidden" name="id" value="<?= $row->customer_id?>">
                            <input type="text" name="cus_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Customer Phone Number  *</label>
                            <input type="text" name="phone" value="<?=$row->phone?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="">Address *</label>
                            <textarea name="address" class="form-control" required><?=$row->address ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name=<?=$page?> class="btn btn-success btn-flat">Save</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
    </section>
</div>
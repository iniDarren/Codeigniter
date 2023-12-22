
<section class="content-header">
	<h1> Service	
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Service/<?=ucfirst($page)?></li>
	</ol>
</section>

<!-- Main Content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <?=ucfirst($page)?> Service</h3>
            <div class="pull-right">
                <a href="<?=site_url('service')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo">  BACK </i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('service/process')?>" method="post">
                        <div class="form-group">
                            <label for="">Service Name *</label>
                            <input type="hidden" name="id" value="<?= $row->service_id?>">
                            <input type="text" name="service_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Price  *</label>
                            <input type="text" name="price" value="<?=$row->price?>" class="form-control" required >
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
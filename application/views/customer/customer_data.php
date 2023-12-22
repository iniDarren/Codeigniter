
<section class="content-header">
	<h1> Customer	
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Customer/Data</li>
	</ol>
</section>

<!-- Main Content -->
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <?= $judul ?></h3>
            <div class="pull-right">
                <a href="<?=site_url('customer/add_customer')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus">  Create </i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($row->result() as $key => $cdata) {?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $cdata->customer_id ?></td>
                        <td><?= $cdata->name ?></td>
                        <td><?= $cdata->phone ?></td>
                        <td><?= $cdata->address ?></td>
                        <td class="text-center" width="180px" >
                            <a href="<?=site_url('customer/edit/'.$cdata->customer_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil">  EDIT </i>
                            </a>    

                            <a href="<?=site_url('customer/del/'.$cdata->customer_id)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash">  DELETE </i>
                            </a>
                            
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>

        </div>

    </div>
</section>
</div>
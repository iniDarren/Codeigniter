
<section class="content-header">
	<h1> Employee	
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Employee/Data</li>
	</ol>
</section>

<!-- Main Content -->
<section class="content">
<?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <?= $judul ?></h3>
            <div class="pull-right">
                <a href="<?=site_url('employee/add_employee')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus">  Create </i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($row->result() as $key => $userdata) {?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $userdata->employee_id ?></td>
                        <td><?= $userdata->name ?></td>
                        <td><?= $userdata->phone ?></td>
                        <td><?= $userdata->address ?></td>
                        <td><?= $userdata->level ==1 ? "Admin" : "Kasir"?></td>
                        <td class="text-center" width="180px" >
                            <a href="<?=site_url('employee/edit/'.$userdata->employee_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil">  EDIT </i>
                            </a>
                            <form action="<?=site_url('employee/del')?>" method="post">
                                <input type="hidden" name="employee_id" value="<?=$userdata->employee_id ?>">
                                <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash">Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>

        </div>

    </div>
      <!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
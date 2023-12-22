
<section class="content-header">
	<h1> Employee	
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
		<li class="active">Employee/<?= $judul ?></li>
	</ol>
</section>

<!-- Main Content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Edit Employee</h3>
            <div class="pull-right">
                <a href="<?=site_url('employee')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo">  BACK </i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php // echo  validation_errors()?>
                    <form action="" method="post">
                        <div class="form-group <?=form_error('name') ? 'has-error' : null ?>">
                            <label for="">Name *</label>
                            <input type="hidden" name="employee_id" value="<?= $row->employee_id ?>">
                            <input type="text" name="name" value="<?= $this->input->post('name') ?? $row->name ?>" class="form-control" >
                            <?=form_error('name')?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error' : null ?>" >
                            <label for="">Password </label>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control" >
                            <?=form_error('password')?> 
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>" >
                            <label for="">Password Confirmation </label>
                            <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control" >
                            <?=form_error('passconf')?>
                        </div>
                        <div class="form-group <?=form_error('phone') ? 'has-error' : null ?>">
                            <label for="">Phone *</label>
                            <input type="text" name="phone" value="<?= $this->input->post('phone') ?? $row->phone ?>" class="form-control" >
                            <?=form_error('phone')?>
                        </div>
                        <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                            <label for="">Address *</label>
                            <textarea name="address" class="form-control" ><?= $this->input->post('phone') ?? $row->address ?></textarea>
                            <?=form_error('address')?>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                        <label >Level *</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ?? $row->level ?>
                                <option value="1"  >Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Barber</option>
                            </select>
                            <?=form_error('level')?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Save</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
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

<section class="content-header">
    <h1> Sales    
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
        <li class="active">Sales/Data</li>
    </ol>
</section>

<!-- Main Content -->
<section class="content">
  <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <?= $judul ?></h3>
            <div class="pull-right">
                <a href="<?=site_url('sales/form')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus">  Create </i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                  <th>No</th>
                  <th>Invoice No</th>
                  <th>Invoice Date</th>
                  <th>Customer Name</th>
                  <th>Employee Name</th>
                  <th>Service</th>
                  <th>Discount</th>
                  <th>Sub Total</th>
                  <th>Total Price</th>
                  <th>Cash</th>
                  <th>Changed</th>
                  <th>Created By</th>
                  <th>Created At</th>
                  <th>Note</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($row->result() as $key => $sdata) {?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $sdata->invoice_num ?></td>
                        <td><?= $sdata->invoice_date ?></td>
                        <td><?= $sdata->cus_name ?></td>
                        <td><?= $sdata->emp_name ?></td>
                        <td><?= $sdata->svc_name ?></td>
                        <td><?= $sdata->discount ?></td>
                        <td><?= $sdata->sub_total ?></td>
                        <td><?= $sdata->total_price ?></td>
                        <td><?= $sdata->cash ?></td>
                        <td><?= $sdata->changed ?></td>
                        <td><?= $sdata->created_by_name ?></td>
                        <td><?= $sdata->created_date ?></td>
                        <td><?= $sdata->note ?></td>
                        <td><?= $sdata->updated_date ?></td>

                        <td class="text-center" width="180px" >
                            <!-- <a href="<?=site_url('sales/edit/'.$sdata->sales_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil">  EDIT </i>
                            </a>   -->  

                            <a href="<?=site_url('sales/del/'.$sdata->sales_id)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
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
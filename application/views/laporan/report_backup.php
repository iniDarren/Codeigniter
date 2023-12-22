<section class="content-header">
    <h1><?= $judul ?>
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
        <li class="active"><?= $judul ?></li>
    </ol>
</section>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> <?= $judul ?>
                <small class="pull-right">Tanggal: <?= $dari ?> sampai <?= $sampai ?></small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Invoice Date</th>
                    <th>Nomor Invoice</th>
                    <th>Nama Customer</th>
                    <th>Nama Barber</th>
                    <th>Keterangan</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $grand_total = 0;
                $isDebit = true; // Flag to determine if the current row is for Debit or Kredit
                foreach ($laporan as $key => $data) {
                    $grand_total += $data->total_price; // Add each total_price to grand_total
                    ?>
                    <tr>
                        <td><?= $data->invoice_date ?></td>
                        <td><?= $data->invoice_num ?></td>
                        <td><?= $data->cus_name ?></td>
                        <td><?= $data->emp_name ?></td>
                        <td>Piutang Dagang</td>

                        <td><?= $isDebit ? $data->total_price : '' ?></td>
                        <td><?= !$isDebit ? $data->total_price : '' ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Penjualan</td>
                      <td></td>
                      <td></td>

                    </tr>
                    <?php
                    // Toggle the flag for the next iteration
                    $isDebit = !$isDebit;
                } ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="1" rowspan="1" style="padding: 25px;"><h3>Total :</h3></td>
                    <td colspan="2" ><h3>Rp. <?= number_format($grand_total, 0) ?></h3></td>
                </tr>

            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
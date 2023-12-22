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
            <table class="table table-striped" id="print-table">
                <thead>
                    <tr>
                        <th>Tanggal Invoice</th>
                        <th>Nomor Invoice</th>
                        <th>Nama Customer</th>
                        <th>Nama Barber</th>
                        <th>Keterangan</th>
                        <th class="text-right">Debit</th>
                        <th class="text-right">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $grand_total = 0;

                    foreach ($laporan as $key => $data) {
                        $grand_total += $data->total_price; 
                        ?>
                        <tr>
                            <td><?= $data->invoice_date ?></td>
                            <td><?= $data->invoice_num ?></td>
                            <td><?= $data->cus_name ?></td>
                            <td><?= $data->emp_name ?></td>
                            <td>Piutang Dagang</td>
                            <td class="text-right"></td>
                            <td class="text-right">Rp. <?= number_format($data->total_price, 0) ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Penjualan</td>
                            <td class="text-right">Rp. <?= number_format($data->total_price, 0) ?></td>
                            <td class="text-right"></td>
                        </tr>
                        <?php

                    } ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="padding: 10px;"><h3>Grand Total :</h3></td>
                    <td class="text-right"><h3>Rp. <?= number_format($grand_total, 0) ?></h3></td>
                    <td class="text-right"><h3>Rp. <?= number_format($grand_total, 0) ?></h3></td>
                </tr>

            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a class="btn btn-default" onclick="printTable()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</section>
<!-- /.content -->
</div>

<script>
    function printTable() {
        var printContents = document.getElementById("print-table").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
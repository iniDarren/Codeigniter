
<section class="content-header">
    <h1> Sales   
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
        <li class="active"><?= $judul ?></li>
    </ol>
</section>

<!-- Main Content -->
<section class="content">
<div class="row">
    <div class="col-lg-4">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top">
                            <label for="date">Date</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" id="date" value="<?= date('Y-m-d')?>" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <label for="employee">Barber</label>
                        </td>
                        <td>
                            <div>
                                <select id="employee" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($employee as $emp => $value) {
                                        echo '<option value ="'.$value->employee_id.'">'.$value->name.'</option>';  
                                    } ?>
                                </select>
                            </div><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <label for="customer">Customer</label>
                        </td>
                        <td>
                            <div>
                                <select id="customer" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($customer as $cust => $value) {
                                        echo '<option value ="'.$value->customer_id.'">'.$value->name.'</option>';  
                                    } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box box-weight">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top; width:30%">
                            <label for="service">Service</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="hidden" id="service_id">
                                <input type="hidden" id="price">
                                <input type="text" id="service_name" class="form-control" autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div>
                                <button type="button" id="add_cart" class="btn btn-primary">
                                    <i class="fa fa-cart-plus"></i> Add
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box box-widget">
            <div class="box-body">
                <div align="right">
                    <h4>Invoice <b><span id="invoice"><?= $invoice_num ?></span></b></h4>
                    <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th width="10%">Discount Item</th>
                                <th width="15%">Total</th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody id="cart-table">
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top; width:30%">
                            <label for="cash">Cash </label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="cash" value="0" min="0" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <label for="change">Change</label>
                        </td>
                        <td>
                            <div>
                                <input type="number" id="change" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="box box-widget">
            <div class="box-body">
                <table width="100%">
                    <tr>
                        <td style="vertical-align: top">
                            <label for="note">Note</label>
                        </td>
                        <td>
                            <div>
                                <textarea id="note"  rows="3" class="form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div>
            <button id="cancel_payment" class="btn btn-flat btn-warning">
                <i class="fa fa-refresh"></i> Cancel
            </button><br><br>
            <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                <i class="fa fa-paper-plane-o"></i> Process Payment
            </button>
        </div>
    </div>
</div>

</div>
</section>
</div>
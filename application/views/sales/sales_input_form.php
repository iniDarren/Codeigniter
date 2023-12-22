
    <div class="col-8">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="invoice_num">Invoice</label>
                            </td>
                            <td>
                                <div class="form-group">
                                <input type="text" name="invoice_num" id="invoice_num" value="<?php echo $invoice_num; ?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="invoice_date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="invoice_date"id="invoice_date" value="<?= date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="employee">Barber</label>
                            </td>
                            <td>
                                <div>
                                    <select id="employee" class="form-control select2" name="employee" required>
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
                                    <select id="customer" class="form-control select2" name="customer" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach($customer as $cust => $value) {
                                            echo '<option value ="'.$value->customer_id.'">'.$value->name.'</option>';  
                                        } ?>
                                    </select>
                                </div><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="service">Service</label>
                            </td>
                            <td>
                                <div>
                                    <select id="service" class="form-control" name="service" onchange="loadharga(id)" required>
                                        <option value="">--Pilih--</option>
                                        <?php foreach($service as $serv => $value) {
                                            echo '<option value ="'.$value->service_id.'">'.$value->name.'</option>';  
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="sales_view_cart">
        <div class="col-8">
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
                                    <input type="number" id="discount" onchange="total()" value="" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="grand_total" id="grand_total" class="form-control" readonly>
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
                                    <input type="number" id="cash" onchange="kembalian()" value="" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div>
                                    <input type="number" id="change"  class="form-control" readonly>
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
                <button type="button" id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Process Payment
                </button>
            </div>
        </div>
    </div>
        </div>


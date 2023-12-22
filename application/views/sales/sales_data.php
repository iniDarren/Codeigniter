
<section class="content-header">
    <h1> Sales   
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashbaord"></i></a></li>
        <li class="active">Sales/<?= $judul ?></li>
    </ol>
</section>

<!-- Main Content -->
<section class="content">
<div class="row">
    <div class="box-header">
            <h3 class="box-title"> <?= $judul ?> Sales</h3>
            
        </div>
    <?php $this->view('sales/sales_input_form')?>    

</div>
</section>
</div>


<script>
    function loadharga(id) {
        var ide = document.getElementById('service') ;
        $.ajax({
            url:'<?php echo base_url(); ?>sales/get_price/'+ ide.value,
            success: function(r) {
               if(r){
                $('#sales_view_cart').html(r);
               }else {
                console.log('data tidak terpanggil');
               }
            }
        });
    }

</script>
<script>

    function total() {
        let sub_total = document.getElementById('sub_total').value;
        let discount = document.getElementById('discount').value;
        let total = document.getElementById('grand_total');
        discount = discount === '' ? 0 : discount;
        total.value = parseInt(sub_total) - parseInt(discount);
    }

        function kembalian () {
        let cash = document.getElementById('cash').value;
        let total = document.getElementById('grand_total').value;
        let change = document.getElementById('change');
        change.value = parseInt(cash) - parseInt(total);
    }

    $(document).on('click', '#process_payment', function() {
            let invoice_num = $('#invoice_num').val();
            let invoice_date = $('#invoice_date').val();
            let employee = $('#employee').val();
            let customer = $('#customer').val();
            let service = $('#service').val();
            let sub_total = $('#sub_total').val();
            let discount = $('#discount').val();
            let total = $('#grand_total').val();
            let cash = $('#cash').val();
            let change = $('#change').val();
            let note = $('#note').val();
            if(cash == '') {
                alert('Belum ada Pembayaran!');
                $('#bayar').focus();
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('sales/sales_add')?>',
                    dataType: 'json',
                    data: {
                        'invoice_num': invoice_num,
                        'invoice_date': invoice_date,
                        'employee_id': employee,
                        'customer_id' : customer ,
                        'service_id' : service,
                        'sub_total' : sub_total,
                        'discount' : discount,
                        'total_price' : total,
                        'cash' : cash,
                        'change' : change,
                        'note' : note,

                    },
                    success: function(result) {
                        if (result.success == true) {
                            alert('Proses Transaksi Berhasil Disimpan..');
                            window.location.href = '<?php echo site_url('sales') ?>'
                        }
                        window.location.href = '<?php echo site_url('sales') ?>'
                    }
                })  
            }
        })
</script>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_m extends CI_Model {

    public function  invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice_num,8,3)) AS invoice_no 
                FROM sales 
                WHERE MID(invoice_num,4,4) = DATE_FORMAT(CURDATE(), '%y%m')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row-> invoice_no) + 1;
            $no = sprintf("%'.03d", $n);
        }else {
            $no = "001";
        }
        $invoice_num = "INV".date('ym').$no;
        return $invoice_num;
    }

    public function get($id = null)
    {
        $this->db->select('sales.*, customer.name as cus_name, 
            employee.name as emp_name, created_by_employee.name as created_by_name, service.name as svc_name');
        $this->db->from('sales');
        $this->db->join('customer', 'customer.customer_id = sales.customer_id');
        $this->db->join('employee', 'employee.employee_id = sales.employee_id');
        $this->db->join('employee as created_by_employee', 'created_by_employee.employee_id = sales.created_by', 'left');

        $this->db->join('service', 'service.service_id = sales.service_id');

        if ($id != null) {
            $this->db->where('sales_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
   
    
    public function add($customer_id,$employee_id, $service_id, $invoice_num, $invoice_date, $discount,$total_price,$cash,$changed,$created_by,$sub_total,$note)  
    {
        $params = [
            'invoice_num'  => $invoice_num,
            'invoice_date' => $invoice_date,
            'customer_id' => $customer_id,
            'service_id' => $service_id,
            'employee_id' => $employee_id,
            'discount' => $discount,
            'total_price' => $total_price,
            'sub_total' => $sub_total,
            'cash' => $cash,
            'changed' => $changed,
            'created_by' => $created_by,
            'note' => $note
        ];
        $this->db->insert('sales', $params);
        
    }

    public function add_sales() {
        $sdata = [
        'invoice_num' => $this->input->post('invoice_num'),
        'invoice_date' => $this->input->post('invoice_date'),
        'customer_id' => $this->input->post('customer_id'),
		'employee_id' => $this->input->post('employee_id'),
		'service_id' => $this->input->post('service_id'),
		'discount' => $this->input->post('discount'),
		'sub_total' => $this->input->post('sub_total'),
		'total_price' => $this->input->post('total_price'),
		'cash' => $this->input->post('cash'),
		'changed' => $this->input->post('change'),
		'created_by' => $this->fungsi->user_login()->employee_id,
        'note' => $this->input->post('note'),
        ];
        
        $this->db->insert('sales', $sdata);
    }
    public function del($id)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete('sales');
    }
    
}

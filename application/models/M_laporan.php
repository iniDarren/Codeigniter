<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function lap_tgl($dari, $sampai)
    {
        $this->db->select('sales.*, customer.name as cus_name, employee.name as emp_name, service.name as svc_name');
        $this->db->from('sales');
        $this->db->join('customer', 'customer.customer_id = sales.customer_id');
        $this->db->join('employee', 'employee.employee_id = sales.employee_id');
        $this->db->join('service', 'service.service_id = sales.service_id');
        $this->db->where('invoice_date >=', $dari);
        $this->db->where('invoice_date <=', $sampai);
        return $this->db->get()->result();
    }

    public function get ($id=null)
    {
        $this->db->from('employee');
        if($id != null) {
            $this->db->where('employee_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function lap_barber($dari, $sampai, $barber_id = null)
    {
        $this->db->select('sales.*, customer.name as cus_name, employee.name as emp_name, service.name as svc_name');
        $this->db->from('sales');
        $this->db->join('customer', 'customer.customer_id = sales.customer_id');
        $this->db->join('employee', 'employee.employee_id = sales.employee_id');
        $this->db->join('service', 'service.service_id = sales.service_id');
        $this->db->where('invoice_date >=', $dari);
        $this->db->where('invoice_date <=', $sampai);

        // Additional condition for barber selection
        if ($barber_id !== null) {
            $this->db->where('employee.employee_id', $barber_id);
        }

        return $this->db->get()->result();
    }
    
}

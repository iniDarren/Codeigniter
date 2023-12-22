<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends CI_Model {

    public function get ($id=null)
    {
        $this->db->from('service');
        if($id != null) {
            $this->db->where('service_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
	{
		$this->db->where('service_id', $id);
        $this->db->delete('service');
	}

    public function add($post)
    {
        $params = [
            'name' => $post['service_name'],
            'price' => $post['price']
        ];
        $this->db->insert('service', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['service_name'],
            'price' => $post['price'],
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('service_id', $post['id']);
        $this->db->update('service', $params);

    }

    public function get_service_price($service_id) {
        $this->db->select('price');
        $this->db->where('service_id', $service_id);
        $query =$this->db->get('service');
        
        if($query->num_rows() > 0) {
            $row = $query -> row();
            return $row->price;
        } else {
            return null;
        }

    }
}

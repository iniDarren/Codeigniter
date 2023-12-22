<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login ($post) 
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('name', $post['name']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
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

    public function add($post)
    {
        $params ['name'] = $post [ 'name' ];
        $params ['password'] =  sha1($post ['password']);
        $params ['phone'] = $post['phone'];
        $params ['address'] = $post['address'];
        $params ['level'] = $post['level'];
        $this->db->insert('employee', $params);
        
    }

    public function del($id)
	{
		$this->db->where('employee_id', $id);
        $this->db->delete('employee');
	}

    public function edit($post)
    {
        $params ['name'] = $post [ 'name' ];
        if(!empty($post['password'])){
            $params ['password'] =  sha1($post ['password']);    
        }
        $params ['phone'] = $post['phone'];
        $params ['address'] = $post['address'];
        $params ['level'] = $post['level'];
        $this->db->where('employee_id', $post['employee_id']);
        $this->db->update('employee', $params);
        
    }
}
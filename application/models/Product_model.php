<?php
class Product_model extends CI_Model {
    public function getProducts(){
        $this->db->order_by('id');
        $this->db->where('status', 1);
        $query = $this->db->get('product');
        return $query->result();
    }
}
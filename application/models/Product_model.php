<?php
class Product_model extends CI_Model {

    public function getProducts(){
        $this->db->order_by('id');
        $this->db->where('status', 1);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function getProductById($id){
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function createProduct($form_data){
        $this->db->insert('product', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateProduct($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('product', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteProduct($id){
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->update('product');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
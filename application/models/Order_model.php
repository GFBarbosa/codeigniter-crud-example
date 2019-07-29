<?php
class Order_model extends CI_Model {

    public function getOrders(){
        $this->db->order_by('id');
        $this->db->where('status', 1);
        $query = $this->db->get('order');
        return $query->result();
    }

    public function getOrderById($id){
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('order');
        return $query->result();
    }

    public function createOrder($form_data){
        $this->db->insert('order', $form_data);
        return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
    }

    public function makeProductOrderReference($reference_data){
        $this->db->insert('product_order', $reference_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateOrder($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('order', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteOrder($id){
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->update('order');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
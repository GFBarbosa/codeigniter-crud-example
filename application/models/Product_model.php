<?php
class Product_model extends CI_Model {

    public function getProducts(){
        $this->db->order_by('id');
        $this->db->where('status', 1);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function getProductsByOrderId($id){
        $this->db->join('product_order', 'product_order.product_id = product.id');
        $this->db->join('order', 'product_order.order_id = order.id');
        $this->db->select('product.nome, product.sku, product.preco, product_order.product_qtd');
        $this->db->order_by('product.id');
        $this->db->where('product_order.order_id', $id);
        $this->db->where('order.status', 1);
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
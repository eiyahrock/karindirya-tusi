<?php
class Products_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getAllProducts(){
        $query = $this->db->get('tblproducts');
        $result = $query->result();
        return $result;
    }
    public function saveProduct($data){
        $this->db->insert('tblproducts', $data);
    }
    public function getProduct($id){
        $this->load->database();
        $query = $this->db->get_where('tblproducts' , array('prod_id' => $id));

        $product = $query->row();
        return $product;
    }
    public function editProduct($id, $data){
        $this->load->database();
        $this->db->where('prod_id', $id);
        $this->db->update('tblproducts', $data);
    }
    public function deleteProduct($id){
        $this->load->database();
        $this->db->where('prod_id', $id);
        $this->db->delete('tblproducts');
    }
    
}
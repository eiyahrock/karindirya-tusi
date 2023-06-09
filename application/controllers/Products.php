<?php
class Products extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper(array('form', 'url'));
        $data['title'] = 'Add Product';
        $this->load->view('include/header_view', $data);
        $this->load->view('add_product_view');
        $this->load->view('include/footer_view');
        $this->load->helper(array('form', 'url'));

    }
    public function processAddProduct(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->form_validation->set_rules('prod_name', 'Product Name', 'required|is_unique[tblproducts.prod_name]', 'required|is_unique[tblproducts.prod_name]', array('is_unique' => 'Product name already exist'));
        $this->form_validation->set_rules('prod_description', 'Product description', 'required');
        $this->form_validation->set_rules('prod_price', 'Product Price', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else{
            $data = array(
                'prod_name' => $this->input->post('prod_name'),
                'prod_description' => $this->input->post('prod_description'),
                'prod_price' => $this->input->post('prod_price')
            );
            $this->load->model('Products_model');
            $this->Products_model->saveProduct($data);
            redirect('home/view_products');
        }
    }

    public function editProduct($id){

        $this->load->helper(array('form', 'url'));
        $data['title'] = 'Edit Product';
        $this->load->model('Products_model');
        $data['product'] = $this->Products_model->getProduct($id);
        $data['edit'] = true;
        $this->load->view('include/header_view', $data);
        $this->load->view('edit_product_view' , $data);
        $this->load->view('include/footer_view');

    }
    public function processEditProduct($id){

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->form_validation->set_rules('prod_name', 'Product Name', 'required');
        $this->form_validation->set_rules('prod_description', 'Product description', 'required');
        $this->form_validation->set_rules('prod_price', 'Product Price', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE){
            $this->editProduct($id);
        } else{
            $data = array(
                'prod_name' => $this->input->post('prod_name'),
                'prod_description' => $this->input->post('prod_description'),
                'prod_price' => $this->input->post('prod_price')
            );
            $this->load->model('Products_model');
            $this->Products_model->editProduct($id, $data);
            redirect('home/view_products');
        }
    }
    public function viewProduct($id){

        $this->load->helper(array('form', 'url'));
        $data['title'] = 'Edit Product';
        $this->load->model('Products_model');
        $data['product'] = $this->Products_model->getProduct($id);
        $data['edit'] = false;
        $this->load->view('include/header_view', $data);
        $this->load->view('edit_product_view' , $data);
        $this->load->view('include/footer_view');
    }   
    public function processDelete($id){

        $this->load->helper('url');
        $this->load->model('Products_model');
        $this->Products_model->deleteProduct($id);
        redirect('home/view_products');
    }
}
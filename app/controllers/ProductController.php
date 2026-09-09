<?php
class ProductController extends Controller
{
        public function __construct()
    {
        parent::__construct();

        $this->call->model('ProductModel');
        $this->call->library('session');
    }

        public function index()
    {
        $data['products'] = $this->ProductModel->get_all_products();
        $data['username'] = $this->session->userdata('username');

        $this->call->view('products/index', $data);
    }

        public function create()
    {
        if ($this->io->method() == 'post') {
            $this->ProductModel->create_product([
                'product_name' => filter_io('string', $this->io->post('product_name')),
                'description'  => filter_io('string', $this->io->post('description')),
                'price'        => filter_io('float', $this->io->post('price')),
                'quantity'     => filter_io('int', $this->io->post('quantity')),
                'created_at'   => date('Y-m-d H:i:s'),
            ]);

            redirect('products');
        } else {
            $data['username'] = $this->session->userdata('username');

            $this->call->view('products/create', $data);
        }
    }

        public function edit($id)
    {
        if ($this->io->method() == 'post') {
            $this->ProductModel->update_product($id, [
                'product_name' => filter_io('string', $this->io->post('product_name')),
                'description'  => filter_io('string', $this->io->post('description')),
                'price'        => filter_io('float', $this->io->post('price')),
                'quantity'     => filter_io('int', $this->io->post('quantity')),
            ]);

            redirect('products');
        } else {
            $data['product'] = $this->ProductModel->get_product($id);
            $data['username'] = $this->session->userdata('username');

            $this->call->view('products/edit', $data);
        }
    }

    public function delete($id)
    {
        $this->ProductModel->delete_product($id);
        redirect('products');
    }
}
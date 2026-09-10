<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

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
        $data['role'] = $this->session->userdata('role');

        $this->call->view('products/index', $data);
    }

   private function require_admin()
{
    $role = strtolower(trim((string) $this->session->userdata('role')));

    if ($role !== 'admin') {
        redirect('products');
        exit;
    }
}

    public function create()
    {
        $this->require_admin();

        if ($this->io->method() === 'post') {
            $data = [
                'product_name' => filter_io('string', $this->io->post('product_name')),
                'description'  => filter_io('string', $this->io->post('description')),
                'price'        => filter_io('float', $this->io->post('price')),
                'quantity'     => filter_io('int', $this->io->post('quantity'))
            ];

            $this->ProductModel->add_product($data);

            redirect('products');
            exit;
        }

        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');

        $this->call->view('products/create', $data);
    }

    public function edit($id)
    {
        $this->require_admin();

        if ($this->io->method() == 'post') {

            $this->ProductModel->update_product($id, [
                'product_name' => filter_io(
                    'string',
                    $this->io->post('product_name')
                ),

                'description' => filter_io(
                    'string',
                    $this->io->post('description')
                ),

                'price' => filter_io(
                    'float',
                    $this->io->post('price')
                ),

                'quantity' => filter_io(
                    'int',
                    $this->io->post('quantity')
                )
            ]);

            redirect('products');

        } else {

            $data['product'] = $this->ProductModel->get_product($id);
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->session->userdata('role');

            $this->call->view(
                'products/edit',
                $data
            );
        }
    }

    public function delete($id)
    {
        $this->require_admin();

        $this->ProductModel->delete_product($id);

        redirect('products');
    }
}
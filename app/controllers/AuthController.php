<?php

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('auth');
    }

    public function login()
    {
        if ($this->io->method() == 'post') {

            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->auth->login($username, $password)) {
                redirect('products');
            }

            $data['error'] = 'Invalid username or password.';
            $this->call->view('auth/login', $data);

        } else {
            $this->call->view('auth/login');
        }
    }

    public function signup()
    {
        if ($this->io->method() == 'post') {

            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');
            $confirm_password = $this->io->post('confirm_password');

            if ($username == '' || $password == '') {
                $data['error'] = 'Username and password are required.';
                $this->call->view('auth/signup', $data);
                return;
            }

            if ($password !== $confirm_password) {
                $data['error'] = 'Passwords do not match.';
                $this->call->view('auth/signup', $data);
                return;
            }

            $this->call->database();

            $existing = $this->db
                ->table('users')
                ->where('username', $username)
                ->get();

            if ($existing) {
                $data['error'] = 'Username already exists.';
                $this->call->view('auth/signup', $data);
                return;
            }

            $this->db
                ->table('users')
                ->insert([
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);

            redirect('auth/login');

        } else {
            $this->call->view('auth/signup');
        }
    }

    public function logout()
    {
        $this->auth->logout();
        redirect('auth/login');
    }
}
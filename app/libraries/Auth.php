<?php

class Auth
{
    protected $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
    }

    public function login($username, $password)
    {
        $user = $this->_lava->db
            ->table('users')
            ->where('username', $username)
            ->get();

        if ($user && password_verify($password, $user['password'])) {

            $this->_lava->session->set_userdata([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'logged_in' => true
            ]);

            return true;
        }

        return false;
    }

    public function is_logged_in()
    {
        return (bool) $this->_lava->session->userdata('logged_in');
    }

    public function logout()
    {
        $this->_lava->session->unset_userdata([
            'user_id',
            'username',
            'logged_in'
        ]);
    }
}
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('auth/login');
        }

        return $next();
    }
}
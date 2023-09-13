<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'account';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'name', 'role'];

    public function login($username, $password)
    {
        return $this->first(['username' => $username, 'password' => $password]);
    }
}

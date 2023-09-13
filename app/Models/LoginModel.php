<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'account';
    protected $primaryKey       = 'username';
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password'];
}

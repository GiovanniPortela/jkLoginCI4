<?php
namespace Vendor\jkLoginCI4\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}

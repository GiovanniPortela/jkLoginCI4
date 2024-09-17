<?php
namespace Vendor\jkLoginCI4\Controllers;

use CodeIgniter\Controller;
use Vendor\MyLoginPackage\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('Vendor\MyLoginPackage\Views\login_view');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('isLoggedIn', true);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

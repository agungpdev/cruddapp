<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
  protected $loginModel;
  public function __construct()
  {
    $this->loginModel = new LoginModel();
  }

  public function index(): string
  {
    $data = ["title" => "POS | APP"];
    return view('login', $data);
  }

  public function login()
  {
    $validation = \Config\Services::validation();
    $validate = $this->validate([
      'username' => [
        'rules' => 'required',
        'label' => 'username',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'password' => [
        'rules' => 'required|min_length[8]',
        'label' => 'password',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'min_length' => '{field} minimal 8 karakter'
        ]
      ]
    ]);
    if (!$validate) {
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(site_url());
    } else {
      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');
      $check = $this->loginModel->login($username, $password);
      if ($check) {
        session()->set('username', $check['username']);
        session()->set('name', $check['name']);
        return redirect()->to(site_url() . "/dashboard/index");
      } else {
        session()->setFlashdata('login', 'gagal login');
        return redirect()->to(site_url());
      }
    }
  }
}
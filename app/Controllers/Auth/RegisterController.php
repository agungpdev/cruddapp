<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class RegisterController extends BaseController
{
  protected $authModel;

  public function __construct()
  {
    $this->authModel = new AuthModel();
  }

  public function index(): string
  {
    $data = ["title" => "CRUD | APP"];
    return view('register', $data);
  }
  public function create_account()
  {
    $validation = \Config\Services::validation();
    $validate = $this->validate([
      'name' => [
        'rules' => 'required|min_length[4]',
        'label' => 'nama',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'min_length' => '{field} minimal 4 karakater'
        ]
      ],
      'username' => [
        'rules' => 'required|is_unique[account.username]',
        'label' => 'username',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
          'is_unique' => '{field} sudah ada'
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
      return redirect()->to(site_url() . 'create-account');
    } else {
      $haspass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
      $data = [
        'username' => $this->request->getVar('username'),
        'password' => $haspass,
        'name' => $this->request->getVar('name'),
        'role' => 'Admin',
      ];
      // dd($data);
      $this->authModel->save($data);
      return redirect()->with('success', 'berhasil mendaftar')->to(site_url());
    }
  }
}

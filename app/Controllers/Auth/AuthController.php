<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $data = ["title" => "POS | APP"];
        return view('auth/login', $data);
    }

    public function signup()
    {
        $data = ["title" => "CRUD | APP"];
        return view('auth/register', $data);
    }

    public function create_account()
    {
        if (!$this->request->isAJAX()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            exit();
        } else {
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
                $res = [
                    'error' => [
                        'error_name' => $validation->getError('name'),
                        'error_username' => $validation->getError('username'),
                        'error_password' => $validation->getError('password'),
                    ],
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($res);
            } else {
                $haspass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password' => $haspass,
                    'name' => $this->request->getVar('name'),
                    'role' => 'Admin',
                ];
                // dd($data);
                if ($this->authModel->save($data)) {
                    $res = ['url' => site_url(), 'status' => 'success', 'message' => 'Berhasil mendaftar'];
                    return $this->response->setJSON($res);
                }
            }
        }
    }

    public function login()
    {
        if (!$this->request->isAJAX()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            exit();
        } else {
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
                $res = [
                    'error' => [
                        'error_username' => $validation->getError('username'),
                        'error_password' => $validation->getError('password'),
                    ],
                    'token' => csrf_hash()
                ];
                return $this->response->setJSON($res);
            } else {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $check = $this->authModel->login($username, $password);
                $passverif = password_verify($password, $check['password']);
                if (!$passverif) {
                    $res = [
                        'token' => csrf_hash(),
                        'status' => 'error',
                        'message' => 'username or password incorrect!',
                    ];
                    return $this->response->setJSON($res);
                } else {
                    if ($check['role'] == 'Admin') {
                        session()->set('admin', $check['username']);
                        session()->set('name', $check['name']);
                        session()->set('role', $check['role']);
                        $res = ['url' => site_url() . "dashboard/index"];
                        return $this->response->setJSON($res);
                    } else {
                        session()->set('author', $check['username']);
                        session()->set('name', $check['name']);
                        session()->set('role', $check['role']);
                        $res = ['url' => site_url() . "dashboard/author"];
                        return $this->response->setJSON($res);
                    }
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url());
    }
}

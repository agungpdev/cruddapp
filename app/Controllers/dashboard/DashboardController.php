<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PostModel;

class DashboardController extends BaseController
{

  protected $postModel;

  public function __construct()
  {
    $this->postModel = new PostModel();
  }

  public function index(): string
  {
    $data = [
      "title" => "CRUD | APP",
      'posts' => $this->postModel->findAll()
    ];
    return view('dashboard/v-dashboard', $data);
  }

  public function store_post()
  {
    if (!$this->request->isAJAX()) {
      exit('404 No Found');
    } else {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
        'title' => [
          'rules' => 'required',
          'label' => 'judul',
          'errors' => [
            'required' => '{field} tidak boleh kosong',
          ]
        ],
        'date' => [
          'rules' => 'required',
          'label' => 'tanggal',
          'errors' => [
            'required' => '{field} tidak boleh kosong',

          ]
        ],
        'description' => [
          'rules' => 'required|min_length[10]',
          'label' => 'deskripsi',
          'errors' => [
            'required' => '{field} tidak boleh kosong',
            'min_length' => '{field} minimal 10 karakter'
          ]
        ],

      ]);
      if (!$validate) {
        $res = [
          'error' => [
            'error_title' => $validation->getError('title'),
            'error_date' => $validation->getError('date'),
            'error_description' => $validation->getError('description'),
          ],
          'token' => csrf_hash()
        ];
        return $this->response->setJSON($res);
      } else {
        $data = [
          'title' => $this->request->getVar('title'),
          'content' => $this->request->getVar('description'),
          'date' => $this->request->getVar('date'),
          'username' => $this->request->getVar('username'),
        ];
        if ($this->postModel->save($data)) {
          $res = [
            'status' => 'success',
            'message' => 'Berhasil disimpan',
            'token' => csrf_hash()
          ];
          return $this->response->setJSON($res);
        } else {
          $res = [
            'status' => 'error',
            'message' => 'Something wrong!',
            'token' => csrf_hash()
          ];
          return $this->response->setJSON($res);
        }
      }
    }
  }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $userModel;
    protected $profilModel;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel;
        $this->profilModel =  new \App\Models\ProfilModel;
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->userModel->get(),
        ];

        return view('user/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah User',
            'profil' => $this->profilModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('user/new', $data);
    }

    public function create()
    {
        $rules = [
            'id_profil' => ['label' => 'profil', 'rules' => 'required'],
            'username' => ['label' => 'username', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required|min_length[8]|matches[passwordkonfirmasi]'],
            'passwordkonfirmasi' => ['label' => 'passwordkonfirmasi', 'rules' => 'required|min_length[8]|matches[password]'],
            'nama' => ['label' => 'nama', 'rules' => 'required'],
            'aktif' => ['label' => 'aktif', 'rules' => 'required'],
            'foto' => ['label' => 'foto', 'rules' => 'max_size[foto,500]|mime_in[foto,image/png,image/jpeg,image/jpg]|is_image[foto]'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            redirect()->back()->withInput();
        }

        $data = [
            'id_profil' => $this->request->getVar('id_profil'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'foto' => upload($this->request->getFile('foto'), null, 'assets/img'),
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Ubah user',
            'menu' => $this->userModel->getMenuUtama(),
            'user' => $this->userModel->getId($id_user),
            'validation' => \Config\Services::validation(),
        ];

        return view('user/edit', $data);
    }

    public function update($id_user)
    {
        $rules = [
            'menu' => ['label' => 'menu', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
            'dropdown' => ['label' => 'dropdown', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
            'aktif' => ['label' => 'aktif', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal diubah');
            redirect()->back()->withInput();
        }

        $icon = $this->request->getVar('icon');

        $data = [
            'menu' => $this->request->getVar('menu'),
            'url' => $this->request->getVar('url'),
            'icon' => $icon ? $icon : 'bi bi-circle',
            'dropdown' => $this->request->getVar('dropdown'),
            'urutan' => $this->request->getVar('urutan'),
            'aktif' => $this->request->getVar('aktif'),
            'id_user' => $id_user
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/user');
    }

    public function delete($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/user');
    }
}

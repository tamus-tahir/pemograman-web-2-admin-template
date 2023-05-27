<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel =  new \App\Models\ProfilModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->profilModel->get(),
        ];

        return view('profil/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah profil',
            'menu' => $this->profilModel->getMenuUtama(),
            'validation' => \Config\Services::validation(),
        ];

        return view('profil/new', $data);
    }

    public function create()
    {
        $rules = [
            'profil' => ['label' => 'profil', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            redirect()->back()->withInput();
        }

        $data = [
            'profil' => $this->request->getVar('profil')
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/profil');
    }

    public function edit($id_profil)
    {
        $data = [
            'title' => 'Ubah profil',
            'menu' => $this->profilModel->getMenuUtama(),
            'profil' => $this->profilModel->getId($id_profil),
            'validation' => \Config\Services::validation(),
        ];

        return view('profil/edit', $data);
    }

    public function update($id_profil)
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
            'id_profil' => $id_profil
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/profil');
    }

    public function delete($id_profil)
    {
        $this->profilModel->delete($id_profil);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/profil');
    }
}

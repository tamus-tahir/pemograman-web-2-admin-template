<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Navigasi extends BaseController
{
    protected $navigasiModel;

    public function __construct()
    {
        $this->navigasiModel =  new \App\Models\NavigasiModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Navigasi',
            'navigasi' => $this->navigasiModel->get(),
        ];

        return view('navigasi/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Navigasi',
            'menu' => $this->navigasiModel->getMenuUtama(),
            'validation' => \Config\Services::validation(),
        ];

        return view('navigasi/new', $data);
    }

    public function create()
    {
        $rules = [
            'menu' => ['label' => 'menu', 'rules' => 'required'],
            'url' => ['label' => 'url', 'rules' => 'required'],
            'dropdown' => ['label' => 'dropdown', 'rules' => 'required'],
            'urutan' => ['label' => 'urutan', 'rules' => 'required'],
            'aktif' => ['label' => 'aktif', 'rules' => 'required'],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
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
        ];

        $this->navigasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/navigasi');
    }
}

<?php

namespace App\Controllers;

use App\Models\IkanModel;
use \Hermawan\DataTables\DataTable;


class Ikan extends BaseController
{


    public function index()
    {
        return view('ikan/index');
    }

    public function ajax_ikan()
    {
        $ikanModel = new IkanModel();
        $ikanModel->select('id_ikan,nama_ikan,created_at');

        return DataTable::of($ikanModel)
            ->addNumbering()
            ->format('nama_ikan', function ($row) {
                return '<a href="javascript: void(0);" class="text-dark fw-medium">' . $row . '</a>';
            })
            ->add('action', function ($row) {
                $edit = base_url("ikan/edit") . '/' . $row->id_ikan;
                $hapus = base_url("ikan/delete") . '/' . $row->id_ikan;
                return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="' . $edit . '">Edit</a></li>
                    <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus</a></li>
                </ul>
            </div>';
            })
            ->hide('id_ikan')
            ->toJson();
    }

    public function add()
    {
        return view('ikan/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nama_ikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ikan Harus diisi'
                ]
            ],
            'nama_ikan' => [
                'rules' => 'is_unique[data_ikan.nama_ikan]',
                'errors' => [
                    'is_unique' => 'Nama Ikan Sudah Ada, Mohon gunakan nama lain.'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $ikans = new IkanModel();
        $ikans->insert([
            'nama_ikan' => $this->request->getVar('nama_ikan')
        ]);
        session()->setFlashdata('message', 'Data Jenis Ikan Berhasil Ditambahkan');
        return redirect()->to('/ikan');
    }

    function edit($id)
    {
        $ikanModel = new IkanModel();
        $data = array(
            'ikan' => $ikanModel->find($id)
        );
        return view('ikan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_ikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ikan Harus diisi'
                ]
            ],
            'nama_ikan' => [
                'rules' => 'is_unique[data_ikan.nama_ikan]',
                'errors' => [
                    'is_unique' => 'Nama Ikan Sudah Ada, Mohon gunakan nama lain.'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $ikans = new IkanModel();
        $ikans->update($id, [
            'nama_ikan' => $this->request->getVar('nama_ikan')
        ]);
        session()->setFlashdata('message', 'Update Data Jenis Ikan Berhasil');
        return redirect()->to('/ikan');
    }

    function delete($id)
    {
        $ikans = new IkanModel();
        $dataIkan = $ikans->find($id);
        if (empty($dataIkan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kapal Tidak ditemukan !');
        }
        $ikans->delete($id);
        session()->setFlashdata('message', 'Data Jenis Ikan Berhasil Dihapus');
        return redirect()->to('/ikan');
    }
}

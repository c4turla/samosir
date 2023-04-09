<?php

namespace App\Controllers;
use App\Models\TangkahanModel;
use \Hermawan\DataTables\DataTable;

class Tangkahan extends BaseController
{

    public function index()
    {
        //$data['tangkahan'] = $this->tangkahans->findAll();
        return view('tangkahan/index');
    }

    public function ajax_tangkahan()
    {
        $tangkahanModel = new TangkahanModel();
        $tangkahanModel->select('id_tangkahan,nama,alamat,jarak,lat,long');

        return DataTable::of($tangkahanModel)
            ->addNumbering()
            ->format('nama', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('jarak', function ($row) {
                return ''.$row.' M';
            })
            ->add('action', function ($row) {
                $edit = base_url("tangkahan/edit") . '/' . $row->id_tangkahan;
                $hapus = base_url("tangkahan/delete") . '/' . $row->id_tangkahan;
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
            ->hide('id_tangkahan')
            ->toJson();
    }


    public function add()
    {
        return view('tangkahan/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[data_tangkahan.nama]',
                'errors' => [
                    'required' => 'Nama Tangkahan Harus diisi',
                    'is_unique' => 'Nama Dermaga/Tangkahan Sudah Ada'
                ]
            ] 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $tangkahans = new TangkahanModel();
        $tangkahans->insert([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jarak' => $this->request->getVar('jarak'),
            'lat' => $this->request->getVar('lat'),
            'long' => $this->request->getVar('long')
        ]);
        session()->setFlashdata('message', 'Data Dermaga Berhasil Ditambahkan');
        return redirect()->to('/tangkahan');
    }

    function edit($id)
    {
        $tangkahanModel = new TangkahanModel();
        $data = array(
            'tangkahan' => $tangkahanModel->find($id)
        );
        return view('tangkahan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ikan Harus diisi'
                ]
            ]
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $tangkahans = new TangkahanModel();
        $tangkahans->update($id, [
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jarak' => $this->request->getVar('jarak'),
            'lat' => $this->request->getVar('lat'),
            'long' => $this->request->getVar('long')
        ]);
        session()->setFlashdata('message', 'Update Data Dermaga Berhasil');
        return redirect()->to('/tangkahan');
    }

    function delete($id)
    {
        $tangkahans = new TangkahanModel();
        $dataTangkahan = $tangkahans->find($id);
        if (empty($dataTangkahan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kapal Tidak ditemukan !');
        }
        $tangkahans->delete($id);
        session()->setFlashdata('message', 'Data Dermaga Berhasil Dihapus');
        return redirect()->to('/tangkahan');
    }


}

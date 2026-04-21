<?php

namespace App\Controllers;
use App\Models\TangkahanModel;

class Tangkahan extends BaseController
{
    function __construct()
    {
        $this->tangkahans = new TangkahanModel();
    }
    public function index()
    {
        $data['tangkahan'] = $this->tangkahans->findAll();
        return view('tangkahan/index',$data);
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
 
        $this->tangkahans->insert([
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
 
        $this->tangkahans->update($id, [
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
        $dataTangkahan = $this->tangkahans->find($id);
        if (empty($dataTangkahan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kapal Tidak ditemukan !');
        }
        $this->tangkahans->delete($id);
        session()->setFlashdata('message', 'Data Dermaga Berhasil Dihapus');
        return redirect()->to('/tangkahan');
    }


}

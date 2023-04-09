<?php

namespace App\Controllers;
use App\Models\KeberangkatanModel;
use App\Controllers\BaseController;

class Keberangkatan extends BaseController
{
    function __construct()
    {
        $this->keberangkatans = new KeberangkatanModel();
    }

    public function index()
    {
        $data['keberangkatan'] = $this->keberangkatans->getKeberangkatan()->getResult();;
        return view('keberangkatan/index',$data);
    }

    public function add()
    {
        $data['kapal'] = $this->keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $this->keberangkatans->getDermaga()->getResult();;
        return view('keberangkatan/create',$data);
    }

    public function store()
    {
        if (!$this->validate([
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus dipilih'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Harus diisi'
                ]
            ],
            'dermaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dermaga Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->keberangkatans->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'abk' => $this->request->getVar('abk'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'es' => $this->request->getVar('es'),
            'air' => $this->request->getVar('air'),
            'solar' => $this->request->getVar('solar'),
            'oli' => $this->request->getVar('oli'),
            'bensin' => $this->request->getVar('bensin'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_approval' => 1,
            'approve_by' => $this->request->getVar('approve_by'),
            'input_by' => $this->request->getVar('approve_by'),
            'status' => $this->request->getVar('status')
        ]);
 
        session()->setFlashdata('message', 'Tambah Data Keberangkatan Berhasil');
        return redirect()->to('/keberangkatan');
    }

    function edit($id)
    {
        $keberangkatanModel = new keberangkatanModel();
        $data = array(
            'keberangkatan' => $keberangkatanModel->find($id)
        );
        $data['kapal'] = $this->keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $this->keberangkatans->getDermaga()->getResult();;
        return view('keberangkatan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->keberangkatans->update($id, [
            'id_kapal' => $this->request->getVar('id_kapal'),
            'tujuan' => $this->request->getVar('tujuan'),
            'abk' => $this->request->getVar('abk'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'es' => $this->request->getVar('es'),
            'air' => $this->request->getVar('air'),
            'solar' => $this->request->getVar('solar'),
            'oli' => $this->request->getVar('oli'),
            'bensin' => $this->request->getVar('bensin'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_approval' => 1,
            'approve_by' => $this->request->getVar('approve_by'),
            'input_by' => $this->request->getVar('approve_by'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Update Data Keberangkatan Berhasil');
        return redirect()->to('/keberangkatan');
    }

    public function approve($id)
    { 
        $this->keberangkatans->update($id, [
            'approve_by' => $this->request->getVar('approve_by'),
            'status_approval' => 1
        ]);
        session()->setFlashdata('message', 'Approve Data Keberangkatan Berhasil');
        return redirect()->to('/keberangkatan');
    }

    function delete($id)
    {
        $dataKeberangkatan = $this->keberangkatans->find($id);
        if (empty($dataKeberangkatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kedatangan Tidak ditemukan !');
        }
        $this->keberangkatans->delete($id);
        session()->setFlashdata('message', 'Data Keberangkatan Berhasil Dihapus');
        return redirect()->to('/keberangkatan');
    }
}

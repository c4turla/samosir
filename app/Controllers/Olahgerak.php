<?php

namespace App\Controllers;
use App\Models\OlahgerakModel;
use App\Models\KedatanganModel;

class Olahgerak extends BaseController
{
    function __construct()
    {
        $this->olahs = new OlahgerakModel();
        $this->kedatangans = new KedatanganModel();
    }
    public function index()
    {
        $data['olahgerak'] = $this->olahs->getOlahgerak()->getResult();;;
        return view('olah/index', $data);
    }

    public function add()
    {
        $data['kapal'] = $this->olahs->getPilihKapal()->getResultArray();;
        $data['dermaga'] = $this->kedatangans->getDermaga()->getResult();;
        return view('olah/create',$data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus dipilih'
                ]
            ],
            'dermaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Dermaga Harus Diisi.'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->olahs->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'id_kedatangan' => $this->request->getVar('id_kedatangan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status'),
            'update_by' => $this->request->getVar('approve_by'),
            'input_by' => $this->request->getVar('input_by')
        ]);
        $this->kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Data Olah Gerak Berhasil Ditambahkan');
        return redirect()->to('/olahgerak');
    }

    function edit($id)
    {
        $olahgerakModel = new OlahgerakModel();
        $data = array(
            'olahgerak' => $olahgerakModel->find($id)
        );
        $data['kapal'] = $this->kedatangans->getKapal()->getResult();;
        $data['tangkahan'] = $this->kedatangans->getDermaga()->getResult();;
        return view('olah/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Harus di pilih'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->olahs->update($id, [
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status')
        ]);
        $this->kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Update Data Olah Gerak Berhasil');
        return redirect()->to('/olahgerak');
    }


}

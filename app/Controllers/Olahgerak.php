<?php

namespace App\Controllers;
use App\Models\OlahgerakModel;
use App\Models\KedatanganModel;
use \Hermawan\DataTables\DataTable;

class Olahgerak extends BaseController
{

    public function index()
    {
        $olahs = new OlahgerakModel();
        $data['olahgerak'] = $olahs->getOlahgerak()->getResult();;;
        return view('olah/index', $data);
    }

    public function ajax_olahgerak()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_olah_gerak b')
                ->select('b.id_olah_gerak, a.nama_kapal, b.tanggal, b.jam, c.nama, b.status')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'c.id_tangkahan=b.dermaga')
                ->orderBy('id_olah_gerak');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->add('action', function ($row) {
                $edit = base_url("olah/edit") . '/' . $row->id_olah_gerak;
                return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="' . $edit . '">Edit</a></li>
                </ul>
            </div>';
            })
            ->hide('id_olah_gerak')
            ->toJson();
    }

    public function add()
    {
        $olahs = new OlahgerakModel();
        $kedatangans = new KedatanganModel();
        $data['kapal'] = $olahs->getPilihKapal()->getResultArray();;
        $data['dermaga'] = $kedatangans->getDermaga()->getResult();;
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
        $olahs = new OlahgerakModel();
        $kedatangans = new KedatanganModel();
        $olahs->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'id_kedatangan' => $this->request->getVar('id_kedatangan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status'),
            'update_by' => $this->request->getVar('approve_by'),
            'input_by' => $this->request->getVar('input_by')
        ]);
        $kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
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
        $kedatangans = new KedatanganModel();
        $data = array(
            'olahgerak' => $olahgerakModel->find($id)
        );
        $data['kapal'] = $kedatangans->getKapal()->getResult();;
        $data['tangkahan'] = $kedatangans->getDermaga()->getResult();;
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
        $kedatangans = new KedatanganModel();
        $olahs = new OlahgerakModel();
        $olahs->update($id, [
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status')
        ]);
        $kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Update Data Olah Gerak Berhasil');
        return redirect()->to('/olahgerak');
    }


}

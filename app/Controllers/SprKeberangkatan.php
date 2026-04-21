<?php

namespace App\Controllers;

use App\Models\SprModel;
use App\Models\KapalModel;
use \Hermawan\DataTables\DataTable;

class SprKeberangkatan extends BaseController
{
    public function index()
    {
        return view('sprkeberangkatan/index');
    }

    public function index_approve()
    {
        return view('sprkeberangkatan/index_approve');
    }

    public function ajax_spr()
    {
        $sprModel = new SprModel();
        $sprModel->select('spr_keberangkatan.id_spr, data_kapal.nama_kapal, spr_keberangkatan.nama_nakhoda, spr_keberangkatan.nama_pemohon, spr_keberangkatan.rencana_berangkat_tgl, spr_keberangkatan.status_spr')
            ->join('data_kapal', 'spr_keberangkatan.id_kapal = data_kapal.id')
            ->orderBy('id_spr DESC');

        return DataTable::of($sprModel)
            ->addNumbering()
            ->format('status_spr', function ($row) {
                if ($row == 0) {
                    return '<div class="badge badge-soft-warning font-size-12">Menunggu Approval</div>';
                } else {
                    return '<div class="badge badge-soft-primary font-size-12">Status Approval</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("sprkeberangkatan/edit") . '/' . $row->id_spr;
                $hapus = base_url("sprkeberangkatan/delete") . '/' . $row->id_spr;
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
            ->hide('id_spr')
            ->toJson();
    }

    public function ajax_spr_approve()
    {
        $sprModel = new SprModel();
        $sprModel->select('spr_keberangkatan.id_spr, data_kapal.nama_kapal, spr_keberangkatan.nama_nakhoda, spr_keberangkatan.nama_pemohon, spr_keberangkatan.rencana_berangkat_tgl, spr_keberangkatan.status_spr')
            ->join('data_kapal', 'spr_keberangkatan.id_kapal = data_kapal.id')
            ->orderBy('id_spr DESC');

        return DataTable::of($sprModel)
            ->addNumbering()
            ->format('status_spr', function ($row) {
                if ($row == 0) {
                    return '<div class="badge badge-soft-warning font-size-12">Menunggu Approval</div>';
                } else {
                    return '<div class="badge badge-soft-primary font-size-12">Status Approval</div>';
                }
            })
            ->add('action', function ($row) {
                $approve = base_url("sprkeberangkatan/approve") . '/' . $row->id_spr;
                $status = $row->status_spr;
                if ($status == 0) {
                    return '<a href="' . $approve . '" class="btn btn-soft-success btn-sm"><i class="bx bx-check-circle me-1"></i> Approval</a>';
                } else {
                    return '<span class="text-success"><i class="bx bx-check-double"></i> Approved</span>';
                }
            })
            ->hide('id_spr')
            ->toJson();
    }

    public function add()
    {
        $kapalModel = new KapalModel();
        $data = [
            'list_kapal' => $kapalModel->findAll()
        ];
        return view('sprkeberangkatan/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'id_kapal' => 'required',
            'nama_nakhoda' => 'required',
            'rencana_berangkat_tgl' => 'required'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $sprModel = new SprModel();
        $sprModel->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'merk_kekuatan_mesin' => $this->request->getVar('merk_kekuatan_mesin'),
            'muatan_bbm' => $this->request->getVar('muatan_bbm'),
            'muatan_air' => $this->request->getVar('muatan_air'),
            'muatan_es' => $this->request->getVar('muatan_es'),
            'checkpoint_tgl_masuk' => $this->request->getVar('checkpoint_tgl_masuk'),
            'checkpoint_no_stbl_kedatangan' => $this->request->getVar('checkpoint_no_stbl_kedatangan'),
            'checkpoint_tgl_keluar' => $this->request->getVar('checkpoint_tgl_keluar'),
            'checkpoint_no_stbl_keluar' => $this->request->getVar('checkpoint_no_stbl_keluar'),
            'checkfisik_tgl_masuk' => $this->request->getVar('checkfisik_tgl_masuk'),
            'checkfisik_no_stbl_kedatangan' => $this->request->getVar('checkfisik_no_stbl_kedatangan'),
            'checkfisik_tgl_keluar' => $this->request->getVar('checkfisik_tgl_keluar'),
            'checkfisik_no_stbl_keluar' => $this->request->getVar('checkfisik_no_stbl_keluar'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'rencana_berangkat_jam' => $this->request->getVar('rencana_berangkat_jam'),
            'rencana_berangkat_tgl' => $this->request->getVar('rencana_berangkat_tgl'),
            'status_spr' => 0,
            'nama_pemohon' => $this->request->getVar('nama_pemohon'),
            'input_by' => session()->get('id')
        ]);

        session()->setFlashdata('message', 'SPR Keberangkatan Berhasil Dibuat');
        return redirect()->to('/sprkeberangkatan');
    }

    public function edit($id)
    {
        $sprModel = new SprModel();
        $kapalModel = new KapalModel();
        $data = [
            'spr' => $sprModel->find($id),
            'list_kapal' => $kapalModel->findAll()
        ];
        return view('sprkeberangkatan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_kapal' => 'required',
            'nama_nakhoda' => 'required',
            'rencana_berangkat_tgl' => 'required'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $sprModel = new SprModel();
        $sprModel->update($id, [
            'id_kapal' => $this->request->getVar('id_kapal'),
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'merk_kekuatan_mesin' => $this->request->getVar('merk_kekuatan_mesin'),
            'muatan_bbm' => $this->request->getVar('muatan_bbm'),
            'muatan_air' => $this->request->getVar('muatan_air'),
            'muatan_es' => $this->request->getVar('muatan_es'),
            'checkpoint_tgl_masuk' => $this->request->getVar('checkpoint_tgl_masuk'),
            'checkpoint_no_stbl_kedatangan' => $this->request->getVar('checkpoint_no_stbl_kedatangan'),
            'checkpoint_tgl_keluar' => $this->request->getVar('checkpoint_tgl_keluar'),
            'checkpoint_no_stbl_keluar' => $this->request->getVar('checkpoint_no_stbl_keluar'),
            'checkfisik_tgl_masuk' => $this->request->getVar('checkfisik_tgl_masuk'),
            'checkfisik_no_stbl_kedatangan' => $this->request->getVar('checkfisik_no_stbl_kedatangan'),
            'checkfisik_tgl_keluar' => $this->request->getVar('checkfisik_tgl_keluar'),
            'checkfisik_no_stbl_keluar' => $this->request->getVar('checkfisik_no_stbl_keluar'),
            'kegiatan' => $this->request->getVar('kegiatan'),
            'rencana_berangkat_jam' => $this->request->getVar('rencana_berangkat_jam'),
            'rencana_berangkat_tgl' => $this->request->getVar('rencana_berangkat_tgl'),
            'nama_pemohon' => $this->request->getVar('nama_pemohon')
        ]);

        session()->setFlashdata('message', 'SPR Keberangkatan Berhasil Diperbarui');
        return redirect()->to('/sprkeberangkatan');
    }

    public function delete($id)
    {
        $sprModel = new SprModel();
        $sprModel->delete($id);
        session()->setFlashdata('message', 'SPR Berhasil Dihapus');
        return redirect()->to('/sprkeberangkatan');
    }

    public function get_kapal_details($id)
    {
        $kapalModel = new KapalModel();
        $kapal = $kapalModel->find($id);
        return $this->response->setJSON($kapal);
    }

    public function approve($id)
    {
        $sprModel = new SprModel();
        $kapalModel = new KapalModel();
        $data = [
            'spr' => $sprModel->find($id),
            'list_kapal' => $kapalModel->findAll()
        ];
        return view('sprkeberangkatan/approve', $data);
    }

    public function approved($id)
    {
        $sprModel = new SprModel();
        $sprModel->update($id, [
            'status_spr' => 1,
            'approve_by' => session()->get('id')
        ]);

        session()->setFlashdata('message', 'SPR Keberangkatan Berhasil Disetujui');
        return redirect()->to('/sprapprove');
    }
}

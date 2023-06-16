<?php

namespace App\Controllers;
use App\Models\KeberangkatanModel;
use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;

class Keberangkatan extends BaseController
{

    public function index()
    {
        return view('keberangkatan/index');
    }

    public function ajax_keberangkatan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_keberangkatan b ')
                ->select('b.id_keberangkatan ,a.nama_kapal,b.tujuan, b.tanggal, b.jam, c.nama, b.abk, b.status')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'b.dermaga=c.id_tangkahan')
                ->orderBy('id_keberangkatan DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->add('action', function ($row) {
                $edit = base_url("keberangkatan/edit") . '/' . $row->id_keberangkatan;
                $hapus = base_url("keberangkatan/delete") . '/' . $row->id_keberangkatan;
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
            ->hide('id_keberangkatan')
            ->toJson();
    }

    public function add()
    {
        $keberangkatans = new KeberangkatanModel();
        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $keberangkatans->getDermaga()->getResult();;
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
        $keberangkatans = new keberangkatanModel();
        $keberangkatans->insert([
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
        $keberangkatans = new keberangkatanModel();
        $data = array(
            'keberangkatan' => $keberangkatans->find($id)
        );
        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $keberangkatans->getDermaga()->getResult();;
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
        $keberangkatans = new keberangkatanModel();
        $keberangkatans->update($id, [
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
        $keberangkatans = new keberangkatanModel();
        $keberangkatans->update($id, [
            'approve_by' => $this->request->getVar('approve_by'),
            'status_approval' => 1
        ]);
        session()->setFlashdata('message', 'Approve Data Keberangkatan Berhasil');
        return redirect()->to('/keberangkatan');
    }

    function delete($id)
    {
        $keberangkatans = new keberangkatanModel();
        $dataKeberangkatan = $keberangkatans->find($id);
        if (empty($dataKeberangkatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kedatangan Tidak ditemukan !');
        }
        $keberangkatans->delete($id);
        session()->setFlashdata('message', 'Data Keberangkatan Berhasil Dihapus');
        return redirect()->to('/keberangkatan');
    }
}

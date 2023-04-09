<?php

namespace App\Controllers;
use App\Models\KedatanganModel;
use \Hermawan\DataTables\DataTable;

class Kedatangan extends BaseController
{
    function __construct()
    {
        $this->kedatangans = new KedatanganModel();
    }

    public function index()
    {
        return view('kedatangan/index');
    }

    public function ajax_kedatangan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_kedatangan b ')
                ->select('b.id_kedatangan, a.nama_kapal, b.asal, b.tanggal, c.nama AS tangkahan, b.status, b.status_approval')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'b.dermaga=c.id_tangkahan')
                ->orderBy('id_kedatangan');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approval</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("kedatangan/edit") . '/' . $row->id_kedatangan;
                $hapus = base_url("kedatangan/delete") . '/' . $row->id_kedatangan;
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
            ->hide('id_kedatangan')
            ->toJson();
    }


    public function add()
    {
        $data['kapal'] = $this->kedatangans->getKapal()->getResult();;
        $data['ikan'] = $this->kedatangans->getIkan()->getResult();;
        $data['dermaga'] = $this->kedatangans->getDermaga()->getResult();;
        return view('kedatangan/create',$data);
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
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Harus diisi'
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

        $data_kedatangan = array(
            'id_kapal' => $this->request->getVar('id_kapal'),
            'asal' => $this->request->getVar('asal'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'jenis_ikan1' => $this->request->getVar('jenis_ikan1'),
            'jenis_ikan2' => $this->request->getVar('jenis_ikan2'),
            'jenis_ikan3' => $this->request->getVar('jenis_ikan3'),
            'jenis_ikan4' => $this->request->getVar('jenis_ikan4'),
            'jenis_ikan5' => $this->request->getVar('jenis_ikan5'),
            'jenis_ikan6' => $this->request->getVar('jenis_ikan6'),
            'berat_ikan1' => $this->request->getVar('berat_ikan1'),
            'berat_ikan2' => $this->request->getVar('berat_ikan2'),
            'berat_ikan3' => $this->request->getVar('berat_ikan3'),
            'berat_ikan4' => $this->request->getVar('berat_ikan4'),
            'berat_ikan5' => $this->request->getVar('berat_ikan5'),
            'berat_ikan6' => $this->request->getVar('berat_ikan6'),
            'suhu_ikan' => $this->request->getVar('suhu_ikan'),
            'suhu_palka' => $this->request->getVar('suhu_palka'),
            'sampah' => $this->request->getVar('sampah'),
            'harga_rata' => $this->request->getVar('harga_rata'),
            'mutu' => $this->request->getVar('mutu'),
            'produk' => $this->request->getVar('produk'),
            'status_approval' => 1,
            'approve_by' => $this->request->getVar('approve_by'),
            'input_by' => $this->request->getVar('approve_by'),
            'status' => $this->request->getVar('status')
        );
      
        $this->kedatangans->saveKedatangan($data_kedatangan);
 
        session()->setFlashdata('message', 'Tambah Data Kedatangan Berhasil');
        return redirect()->to('/kedatangan');
    }

    function edit($id)
    {
        $kedatanganModel = new KedatanganModel();
        $data = array(
            'kedatangan' => $kedatanganModel->find($id)
        );
        $data['kapal'] = $this->kedatangans->getKapal()->getResult();;
        $data['tangkahan'] = $this->kedatangans->getDermaga()->getResult();;
        $data['ikan'] = $this->kedatangans->getIkan()->getResult();;
        return view('kedatangan/edit', $data);
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
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->kedatangans->update($id, [
            'id_kapal' => $this->request->getVar('id_kapal'),
            'asal' => $this->request->getVar('asal'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'jenis_ikan1' => $this->request->getVar('jenis_ikan1'),
            'jenis_ikan2' => $this->request->getVar('jenis_ikan2'),
            'jenis_ikan3' => $this->request->getVar('jenis_ikan3'),
            'jenis_ikan4' => $this->request->getVar('jenis_ikan4'),
            'jenis_ikan5' => $this->request->getVar('jenis_ikan5'),
            'jenis_ikan6' => $this->request->getVar('jenis_ikan6'),
            'berat_ikan1' => $this->request->getVar('berat_ikan1'),
            'berat_ikan2' => $this->request->getVar('berat_ikan2'),
            'berat_ikan3' => $this->request->getVar('berat_ikan3'),
            'berat_ikan4' => $this->request->getVar('berat_ikan4'),
            'berat_ikan5' => $this->request->getVar('berat_ikan5'),
            'berat_ikan6' => $this->request->getVar('berat_ikan6'),
            'suhu_ikan' => $this->request->getVar('suhu_ikan'),
            'suhu_palka' => $this->request->getVar('suhu_palka'),
            'sampah' => $this->request->getVar('sampah'),
            'harga_rata' => $this->request->getVar('harga_rata'),
            'mutu' => $this->request->getVar('mutu'),
            'produk' => $this->request->getVar('produk'),
            'approve_by' => $this->request->getVar('approve_by'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Update Data Kedatangan Berhasil');
        return redirect()->to('/kedatangan');
    }

    public function approve($id)
    { 
        $this->kedatangans->update($id, [
            'approve_by' => $this->request->getVar('approve_by'),
            'status_approval' => 1
        ]);
        session()->setFlashdata('message', 'Approve Data Kedatangan Berhasil');
        return redirect()->to('/kedatangan');
    }

    function delete($id)
    {
        $dataKedatangan = $this->kedatangans->find($id);
        if (empty($dataKedatangan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kedatangan Tidak ditemukan !');
        }
        $this->kedatangans->delete($id);
        session()->setFlashdata('message', 'Data Kedatangan Berhasil Dihapus');
        return redirect()->to('/kedatangan');
    }
}

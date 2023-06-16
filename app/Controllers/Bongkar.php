<?php

namespace App\Controllers;

use App\Models\BongkarModel;
use App\Models\KedatanganModel;
use \Hermawan\DataTables\DataTable;

class Bongkar extends BaseController
{

    public function index()
    {
        return view('bongkar/index');
    }

    public function approve()
    {
        return view('bongkar/approve');
    }

    public function ajax_bongkar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_bongkar b ')
            ->select('b.id_bongkar, b.no_surat, b.nama_nakhoda, a.nama_kapal, b.syahbandar, b.jam, b.status_approval')
            ->join('data_kapal a', 'a.id=b.id_kapal')
            ->orderBy('id_bongkar', 'DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('no_surat', function ($row) {
                return '<a href="javascript: void(0);" class="text-dark fw-medium">' . $row . '</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approval</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("bongkar/cetak") . '/' . $row->id_bongkar;
                $hapus = base_url("bongkar/delete") . '/' . $row->id_bongkar;
                $status = $row->status_approval;
                if ($status == 1) {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                             <li><a class="dropdown-item" href="' . $edit . '" target="_blank">Print</a></li>
                             <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                     </ul>                
                </div>';
                } else {
                return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                     </ul>                
                </div>';
                }
            })
            ->hide('id_bongkar')
            ->toJson();
    }

    public function ajax_approve()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_bongkar b ')
            ->select('b.id_bongkar, b.no_surat, b.nama_nakhoda, a.nama_kapal, b.syahbandar, b.jam, b.status_approval')
            ->join('data_kapal a', 'a.id=b.id_kapal')
            ->orderBy('id_bongkar', 'DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('no_surat', function ($row) {
                return '<a href="javascript: void(0);" class="text-dark fw-medium">' . $row . '</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approval</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                $approve = base_url("bongkar/approve") . '/' . $row->id_bongkar;
                $edit = base_url("bongkar/cetak") . '/' . $row->id_bongkar;
                $hapus = base_url("bongkar/delete") . '/' . $row->id_bongkar;
                $status = $row->status_approval;
                if ($status == 1) {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                             <li><a class="dropdown-item" href="' . $edit . '" target="_blank">Print</a></li>
                             <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                     </ul>                
                </div>';
                } else {
                return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="' . $approve . '">Approval</a></li>
                        <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                     </ul>                
                </div>';
                }
            })
            ->hide('id_bongkar')
            ->toJson();
    }

    public function add()
    {
        $bongkars = new BongkarModel();
        $data['kapal'] = $bongkars->getPilihKapal()->getResultArray();;
        $data['syahbandar'] = $bongkars->getSyahbandar()->getResult();;
        return view('bongkar/create', $data);
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
            'nama_nakhoda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Nakhoda Harus Diisi.'
                ]
            ],
            'syahbandar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Syahbandar Harus Dipilih.'
                ]
            ],
            'no_surat' => [
                'rules' => 'is_unique[data_bongkar.no_surat]',
                'errors' => [
                    'is_unique' => 'Nomor Surat Sudah Digunakan, Mohon gunakan nomor yang lain.'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $bongkars = new BongkarModel();
        $kedatangans = new KedatanganModel();
        $bongkars->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'id_kedatangan' => $this->request->getVar('id_kedatangan'),
            'no_surat' => $this->request->getVar('no_surat'),
            'syahbandar' => $this->request->getVar('syahbandar'),
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'tanda_pengenal' => $this->request->getVar('tanda_pengenal'),
            'jam' => $this->request->getVar('jam'),
            'no_urut' => $this->request->getVar('no_urut'),
            'tanggal' => $this->request->getVar('tanggal')
        ]);
        $kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
            'status' => 'BONGKAR'
        ]);
        session()->setFlashdata('message', 'Data Bongkar Berhasil Ditambahkan');
        return redirect()->to('/bongkar');
    }

    function edit($id)
    {
        $bongkars = new BongkarModel();
        $data = array(
            'bongkar' => $bongkars->find($id)
        );
        $data['kapal'] = $bongkars->getKapal()->getResult();;
        return view('bongkar/ttd', $data);
    }

    public function update($id)
    {
        $folderPath = "images/tandatangan/";  
        $base64Image = $this->request->getPost('signature_data');
        
        list($type, $base64Image) = explode(';', $base64Image);
        list(,$extension) = explode('/',$type);
        list(, $base64Image)      = explode(',', $base64Image);
        $base64Image = base64_decode($base64Image);
        
        $uniq = uniqid();
        $file = $folderPath . $uniq . '.'.$extension; 

        file_put_contents($file, $base64Image);
        $fileName = $uniq . '.'.$extension;
        $data = [
            'status_approval' => '1',
            'ttd' => $fileName
        ];
        $bongkars = new BongkarModel();
        $bongkars->update($id, $data); 
        session()->setFlashdata('message', 'Ijin Bongkar Berhasil di Approval');
        return redirect()->to('/bongkar/approve');
    }

    public function cetak()
    {
        $bongkars = new BongkarModel();
        $request = \Config\Services::request();
        $id_bongkar = $request->uri->getSegment(3);
        $data['bongkar'] = $bongkars->pilih_bongkar($id_bongkar)->getRowArray();
        $filename = date('y-m-d-H-i-s') . '-form-izin-bongkar';

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        // load HTML content
        $dompdf->loadHtml(view('bongkar/cetak', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    function delete($id)
    {
        $bongkars = new BongkarModel();
        $dataBongkar = $bongkars->find($id);
        if (empty($dataBongkar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Bongkar Tidak ditemukan !');
        }
        $bongkars->delete($id);
        session()->setFlashdata('message', 'Data Pembongkaran Ikan Berhasil Dihapus');
        return redirect()->to('/bongkar');
    }
}

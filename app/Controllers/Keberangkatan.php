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

    public function index_pengurus()
    {
        return view('pengurus/keberangkatan/index');
    }

    public function ajax_keberangkatan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_keberangkatan b ')
                ->select('b.id_keberangkatan ,a.nama_kapal,b.tujuan, c.nama, b.abk, b.status_approval')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'b.dermaga=c.id_tangkahan')
                ->orderBy('id_keberangkatan DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approve</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("keberangkatan/edit") . '/' . $row->id_keberangkatan;
                $hapus = base_url("keberangkatan/delete") . '/' . $row->id_keberangkatan;
                $approve = base_url("keberangkatan/approve") . '/' . $row->id_keberangkatan;
                $cetak = base_url("keberangkatan/cetak") . '/' . $row->id_keberangkatan;
                $status = $row->status_approval;
                if ($status == 1) {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                             <li><a class="dropdown-item" href="' . $edit . '">Edit</a></li>
                             <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                             <li><a class="dropdown-item" href="' . $cetak . '">Print</a></li>
                     </ul>                
                </div>';
                } else {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                </div>';
                }
            })
            ->hide('id_keberangkatan')
            ->toJson();
    }

    public function ajax_keberangkatan_pengurus()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_keberangkatan b ')
                ->select('b.id_keberangkatan ,a.nama_kapal,b.tujuan, c.nama, b.abk, b.status_approval')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'b.dermaga=c.id_tangkahan')
                ->orderBy('id_keberangkatan DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approve</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                return '';
            })
            ->hide('id_keberangkatan')
            ->toJson();
    }
    
    public function approve_keberangkatan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_keberangkatan b ')
                ->select('b.id_keberangkatan ,a.nama_kapal,b.tujuan, c.nama, b.abk, b.status_approval')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->join('data_tangkahan c', 'b.dermaga=c.id_tangkahan')
                ->orderBy('id_keberangkatan DESC');

        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status_approval', function ($row) {
                if ($row == 1) {
                    return '<div class="badge badge-soft-success font-size-12">Approve</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Pending</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("keberangkatan/edit") . '/' . $row->id_keberangkatan;
                $hapus = base_url("keberangkatan/delete") . '/' . $row->id_keberangkatan;
                $approve = base_url("keberangkatan/approval") . '/' . $row->id_keberangkatan;
                $cetak = base_url("keberangkatan/cetak") . '/' . $row->id_keberangkatan;
                $status = $row->status_approval;
                if ($status == 1) {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                             <li><a class="dropdown-item" href="' . $edit . '">Edit</a></li>
                             <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                             <li><a class="dropdown-item" href="' . $cetak . '">Print</a></li>
                     </ul>                
                </div>';
                } else {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="' . $approve . '">Approval </a></li>
                        <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus </a></li>
                     </ul>                
                </div>';
                }
            })
            ->hide('id_keberangkatan')
            ->toJson();
    }

    public function index_approve()
    {
        return view('keberangkatan/indexapprove');
    }

    public function add()
    {

        $keberangkatans = new KeberangkatanModel();


        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $keberangkatans->getDermaga()->getResult();;
        $data['syahbandar'] = $keberangkatans->getSyahbandar()->getResult();;

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
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Masuk Harus diisi'
                ]
            ],
            'tanggal_berangkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Berangkat Harus diisi'
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
        // Dapatkan nomor terakhir dan tambahkan 1
        $lastEntry = $keberangkatans->getLastNumber();
        if ($lastEntry) {
            $lastNumber = (int)$lastEntry['nomor'];
            $newNumber = sprintf('%06d', $lastNumber + 1); // Format dengan padding nol di depan
        } else {
            $newNumber = '000001'; // Nomor awal jika belum ada data
        }
        $keberangkatans->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'tujuan' => $this->request->getVar('tujuan'),
            'abk' => $this->request->getVar('abk'),
            'tanggal' => NULL,
            'jam' => $this->request->getVar('jam'),
            'nomor' => $newNumber,
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_berangkat' => $this->request->getVar('tanggal_berangkat'),
            'etmal' => $this->request->getVar('etmal'),
            'total_jam' => $this->request->getVar('total_jam'),
            'floating' => $this->request->getVar('floating'),
            'bongkar_ikan' => $this->request->getVar('bongkar_ikan'),
            'syahbandar' => $this->request->getVar('syahbandar'),
            'administrasi' => $this->request->getVar('administrasi'),
            'dermaga' => $this->request->getVar('dermaga'),
            'es' => $this->request->getVar('es'),
            'air' => $this->request->getVar('air'),
            'solar' => $this->request->getVar('solar'),
            'oli' => $this->request->getVar('oli'),
            'bensin' => $this->request->getVar('bensin'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status_approval' => 0,
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
        $data['syahbandar'] = $keberangkatans->getSyahbandar()->getResult();;
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
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'tujuan' => $this->request->getVar('tujuan'),
            'abk' => $this->request->getVar('abk'),
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_berangkat' => $this->request->getVar('tanggal_berangkat'),
            'etmal' => $this->request->getVar('etmal'),
            'total_jam' => $this->request->getVar('total_jam'),
            'floating' => $this->request->getVar('floating'),
            'bongkar_ikan' => $this->request->getVar('bongkar_ikan'),
            'syahbandar' => $this->request->getVar('syahbandar'),
            'administrasi' => $this->request->getVar('administrasi'),
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
    
    function approval($id)
    {
        $keberangkatans = new keberangkatanModel();
        $data = array(
            'keberangkatan' => $keberangkatans->find($id)
        );
        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $keberangkatans->getDermaga()->getResult();;
        $data['syahbandar'] = $keberangkatans->getSyahbandar()->getResult();;
        return view('keberangkatan/approval', $data);
    }

    public function simpan_approval($id)
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
            'syahbandar' => $this->request->getVar('syahbandar'),
            'approve_by' => $this->request->getVar('approve_by'),
            'status_approval' => '1',
            'ttd' => $fileName
        ];
        $keberangkatans = new keberangkatanModel();
        $keberangkatans->update($id, $data); 
        session()->setFlashdata('message', 'Data Keberangkatan Berhasil di Approval');
        return redirect()->to('/keberangkatanapprove');
    }

    function approve($id)
    {
        $keberangkatans = new keberangkatanModel();
        $data = array(
            'keberangkatan' => $keberangkatans->find($id)
        );
        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        $data['dermaga'] = $keberangkatans->getDermaga()->getResult();;
        return view('keberangkatan/approve', $data);
    }

    public function approved($id)
    { 
        $keberangkatans = new keberangkatanModel();
        $keberangkatans->update($id, [
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'tujuan' => $this->request->getVar('tujuan'),
            'abk' => $this->request->getVar('abk'),
            'tanggal' => $this->request->getVar('tanggal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_berangkat' => $this->request->getVar('tanggal_berangkat'),
            'etmal' => $this->request->getVar('etmal'),
            'total_jam' => $this->request->getVar('total_jam'),
            'floating' => $this->request->getVar('floating'),
            'bongkar_ikan' => $this->request->getVar('bongkar_ikan'),
            'syahbandar' => $this->request->getVar('syahbandar'),
            'administrasi' => $this->request->getVar('administrasi'),
            'jam' => $this->request->getVar('jam'),
            'dermaga' => $this->request->getVar('dermaga'),
            'es' => $this->request->getVar('es'),
            'air' => $this->request->getVar('air'),
            'solar' => $this->request->getVar('solar'),
            'oli' => $this->request->getVar('oli'),
            'bensin' => $this->request->getVar('bensin'),
            'lainnya' => $this->request->getVar('lainnya'),
            'keterangan' => $this->request->getVar('keterangan'),
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

    public function cetak()
    {
        $prints = new keberangkatanModel();
        $request = \Config\Services::request();
        $id_keberangkatan = $request->uri->getSegment(3);
        $data['keberangkatan'] = $prints->pilih_keberangkatan($id_keberangkatan)->getRowArray();
        $filename = date('y-m-d-H-i-s') . '-STBLKK';

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        // load HTML content
        $dompdf->loadHtml(view('keberangkatan/cetak', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
        exit();
    }
}

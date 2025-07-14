<?php

namespace App\Controllers;
use App\Models\JasaAirModel;
use App\Models\KeberangkatanModel;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class JasaAir extends BaseController
{
    public function index()
    {
        return view('jasaair/index');
    }

    public function ajax_jasa()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jasa_air')
                ->select('id_air, no_order, nama_kapal, tanggal_permintaan, volume, harga, jumlah_pembayaran, status_order')
                ->orderBy('id_air', 'desc');


        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status_order', function ($row) {
                if ($row == "order") {
                    return '<div class="badge badge-soft-danger font-size-12">ORDER</div>';
                } else {
                    return '<div class="badge badge-soft-success font-size-12">SELESAI</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("air/edit") . '/' . $row->id_air;
                $bayar = base_url("air/bayar") . '/' . $row->id_air;
                $cetakorder = base_url("air/cetakorder") . '/' . $row->id_air;
                $cetakperhitungan = base_url("air/cetakperhitungan") . '/' . $row->id_air;
                $hapus = base_url("air/delete") . '/' . $row->id_air;              
                $status = $row->status_order;
                if ($status == "order") {
                    return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="' . $edit . '">Edit</a></li>
                        <li><a class="dropdown-item" href="' . $cetakorder . '" target="_blank">Cetak Order</a></li>
                        <li><a class="dropdown-item" href="' . $bayar . '">Proses Perhitungan</a></li>
                        <li><a class="dropdown-item" onclick="confirmation(event)" href="' . $hapus . '">Hapus</a></li>
                    </ul>             
                </div>';
                } else {
                return '<div class="dropdown">
                <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                         <li><a class="dropdown-item" href="' . $cetakorder . '" target="_blank" >Cetak Order</a></li>
                         <li><a class="dropdown-item" href="' . $cetakperhitungan . '" target="_blank">Cetak Perhitungan</a></li>
                     </ul>                
                </div>';
                }
            })
            ->hide('id_air')
            ->toJson();
    }

    public function add()
    {
        $keberangkatans = new KeberangkatanModel();
        $jasaAir = new JasaAirModel();

        // Dapatkan nomor order dari model
        $noOrderData = $jasaAir->generateNoOrder(['data' => []]);
        $data['no_order'] = $noOrderData['data']['no_order'];
        $data['kapal'] = $keberangkatans->getKapal()->getResult();


        return view('jasaair/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Kapal'
                ]
            ],
            'tanggal_permintaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'pelaksana_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Petugas Harus diisi'
                ]
            ]
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $orderjasa = new JasaAirModel();
        
        $orderjasa->insert([
            'no_order' => $this->request->getVar('no_order'),
            'nama_kapal' => $this->request->getVar('nama_kapal'),
            'tanggal_permintaan' => $this->request->getVar('tanggal_permintaan'),
            'volume' => $this->request->getVar('volume'),
            'harga' => $this->request->getVar('harga'),
            'jumlah_pembayaran' => $this->request->getVar('jumlah_pembayaran'),
            'keterangan' => $this->request->getVar('keterangan'),
            'pemohon' => $this->request->getVar('pemohon'),
            'pelaksana_lapangan' => $this->request->getVar('pelaksana_lapangan'),
        ]);
        session()->setFlashdata('message', 'Order Jasa Air Tawar Berhasil Ditambahkan');
        return redirect()->to('/air');
    }

    function edit($id)
    {
        $jasaAir = new JasaAirModel();
        $keberangkatans = new KeberangkatanModel();

        $data = array(
            'jasaAir' => $jasaAir->find($id)
        );
        $data['kapal'] = $keberangkatans->getKapal()->getResult();
        return view('jasaair/edit', $data);
    }

    public function update($id)
    {
        $jasaAir = new JasaAirModel();
        $dataOrder = $jasaAir->find($id);
    
        if (empty($dataOrder)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Order Jasa Air Tawar Tidak ditemukan!');
        }
    
        // Validasi input tanpa mengharuskan file diunggah jika tidak ada file baru yang diunggah
        $rules = [
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Kapal'
                ]
            ],
            'tanggal_permintaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'pelaksana_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Petugas Harus diisi'
                ]
            ]
        ];
    
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_kapal' => $this->request->getVar('nama_kapal'),
            'tanggal_permintaan' => $this->request->getVar('tanggal_permintaan'),
            'volume' => $this->request->getVar('volume'),
            'harga' => $this->request->getVar('harga'),
            'jumlah_pembayaran' => $this->request->getVar('jumlah_pembayaran'),
            'keterangan' => $this->request->getVar('keterangan'),
            'pemohon' => $this->request->getVar('pemohon'),
            'pelaksana_lapangan' => $this->request->getVar('pelaksana_lapangan'),
        ];

        $jasaAir->update($id, $data);
    
        session()->setFlashdata('message', 'Data Order Jasa Air Tawar Berhasil Diupdate');
        return redirect()->to('/jasaair');
    }

    function bayar($id)
    {
        $jasaAir = new JasaAirModel();
        $data = array(
            'jasaAir' => $jasaAir->find($id)
        );
        return view('jasaair/bayar', $data);
    }

    public function prosesbayar($id)
    {
        $jasaAir = new JasaAirModel();
        $dataOrder = $jasaAir->find($id);
    
        if (empty($dataOrder)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Biaya Jasa Air Tawar Tidak ditemukan!');
        }
    
        // Validasi input tanpa mengharuskan file diunggah jika tidak ada file baru yang diunggah
        $rules = [
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Kapal'
                ]
            ],
            'tanggal_permintaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'pelaksana_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Petugas Harus diisi'
                ]
            ],
                'bendahara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bendahara Harus diisi'
                ]
            ]
        ];
    
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    
    
        $data = [
            'tanggal_permintaan' => $this->request->getVar('tanggal_permintaan'),
            'tanggal_pelayanan' => $this->request->getVar('tanggal_pelayanan'),
            'volume' => $this->request->getVar('volume'),
            'harga' => $this->request->getVar('harga'),
            'jumlah_pembayaran' => $this->request->getVar('jumlah_pembayaran'),
            'keterangan' => $this->request->getVar('keterangan'),
            'pemohon' => $this->request->getVar('pemohon'),
            'pelaksana_lapangan' => $this->request->getVar('pelaksana_lapangan'),
            'status_order' => "selesai",
            'total' => $this->request->getVar('total'),
            'bendahara' => $this->request->getVar('bendahara'),
        ];

        $jasaAir->update($id, $data);
    
        session()->setFlashdata('message', 'Pembayaran Biaya Air Tawar Berhasil');
        return redirect()->to('/jasaair');
    }

    function cetakorder($id)
    {
        $jasaAir = new JasaAirModel();
        $data = array(
            'jasaAir' => $jasaAir->find($id)
        );
        return view('jasaair/cetakorder', $data);
    }

    function cetakperhitungan($id)
    {
        $jasaAir = new JasaAirModel();
        $data = array(
            'jasaAir' => $jasaAir->find($id)
        );
        return view('jasaair/cetakperhitungan', $data);
    }

    function delete($id)
    {
        $jasaAir = new JasaAirModel();
        $dataPeralatan = $jasaAir->find($id);
        if (empty($dataPeralatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Jasa Air Tawar Tidak ditemukan !');
        }

        $jasaAir->delete($id);
        session()->setFlashdata('message', 'Data Order Air Tawar Berhasil Dihapus');
        return redirect()->to('/jasaair');
    }

}
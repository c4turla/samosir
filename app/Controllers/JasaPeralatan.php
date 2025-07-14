<?php

namespace App\Controllers;
use App\Models\JasaPeralatanModel;
use App\Models\KeberangkatanModel;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

class JasaPeralatan extends BaseController
{
    public function index()
    {
        return view('jasaperalatan/index');
    }

    public function ajax_jasa()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jasa_peralatan')
                ->select('id_jasa, no_order, nama_penyewa, tanggal, status_order')
                ->orderBy('id_jasa', 'desc');


        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_penyewa', function ($row) {
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
                $edit = base_url("peralatan/edit") . '/' . $row->id_jasa;
                $bayar = base_url("peralatan/bayar") . '/' . $row->id_jasa;
                $detail = base_url("peralatan/detail") . '/' . $row->id_jasa;
                $cetakorder = base_url("peralatan/cetakorder") . '/' . $row->id_jasa;
                $cetakperhitungan = base_url("peralatan/cetakperhitungan") . '/' . $row->id_jasa;
                $hapus = base_url("peralatan/delete") . '/' . $row->id_jasa;              
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
                         <li><a class="dropdown-item" href="' . $detail . '">Detail</a></li>
                         <li><a class="dropdown-item" href="' . $cetakorder . '" target="_blank" >Cetak Order</a></li>
                         <li><a class="dropdown-item" href="' . $cetakperhitungan . '" target="_blank">Cetak Perhitungan</a></li>
                     </ul>                
                </div>';
                }
            })
            ->hide('id_jasa')
            ->toJson();
    }

    public function add()
    {
        $keberangkatans = new KeberangkatanModel();
        $jasaPeralatan = new JasaPeralatanModel();

        // Dapatkan nomor order dari model
        $noOrderData = $jasaPeralatan->generateNoOrder(['data' => []]);
        $data['no_order'] = $noOrderData['data']['no_order'];
        $data['kapal'] = $keberangkatans->getKapal()->getResult();


        return view('jasaperalatan/create', $data);
    }

    public function storeorder()
    {
        if (!$this->validate([
            'nama_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Penyewa'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Petugas Harus diisi'
                ]
            ]
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $orderjasa = new JasaPeralatanModel();

        $iceCruiser = (int) $this->request->getVar('ice_cruiser');

        // Hitung biaya
        $byIceCruiser = $iceCruiser * 100;
        
        $orderjasa->insert([
            'no_order' => $this->request->getVar('no_order'),
            'nama_penyewa' => $this->request->getVar('nama_penyewa'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keranjang_plastik' => $this->request->getVar('keranjang_plastik'),
            'ket_keranjang_plastik' => $this->request->getVar('ket_keranjang_plastik'),
            'meja_sortir' => $this->request->getVar('meja_sortir'),
            'ket_meja_sortir' => $this->request->getVar('ket_meja_sortir'),
            'gerobak' => $this->request->getVar('gerobak'),
            'ket_gerobak' => $this->request->getVar('ket_gerobak'),
            'timbangan' => $this->request->getVar('timbangan'),
            'ket_timbangan' => $this->request->getVar('ket_timbangan'),
            'ice_cruiser'     => $iceCruiser,
            'by_ice_cruiser'  => $byIceCruiser,
            'petugas' => $this->request->getVar('petugas'),
        ]);
        session()->setFlashdata('message', 'Order Jasa Peralatan Berhasil Ditambahkan');
        return redirect()->to('/jasaperalatan');
    }

    function edit($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $keberangkatans = new KeberangkatanModel();

        $data = array(
            'jasaPeralatan' => $jasaPeralatan->find($id)
        );
        $data['kapal'] = $keberangkatans->getKapal()->getResult();
        return view('jasaperalatan/edit', $data);
    }

    public function update($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $dataOrder = $jasaPeralatan->find($id);
    
        if (empty($dataOrder)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Order Pemakaian Peralatan Tidak ditemukan!');
        }
    
        // Validasi input tanpa mengharuskan file diunggah jika tidak ada file baru yang diunggah
        $rules = [
           'nama_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Penyewa'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'petugas' => [
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
    
        $iceCruiser = (int) $this->request->getVar('ice_cruiser');

        // Hitung biaya
        $byIceCruiser = $iceCruiser * 100;

        $data = [
            'nama_penyewa' => $this->request->getVar('nama_penyewa'),
            'tanggal' => $this->request->getVar('tanggal'),
            'keranjang_plastik' => $this->request->getVar('keranjang_plastik'),
            'ket_keranjang_plastik' => $this->request->getVar('ket_keranjang_plastik'),
            'meja_sortir' => $this->request->getVar('meja_sortir'),
            'ket_meja_sortir' => $this->request->getVar('ket_meja_sortir'),
            'gerobak' => $this->request->getVar('gerobak'),
            'ket_gerobak' => $this->request->getVar('ket_gerobak'),
            'timbangan' => $this->request->getVar('timbangan'),
            'ket_timbangan' => $this->request->getVar('ket_timbangan'),
            'ket_ice_cruiser' => $this->request->getVar('ket_ice_cruiser'),
            'ice_cruiser'     => $iceCruiser,
            'by_ice_cruiser'  => $byIceCruiser,
            'petugas' => $this->request->getVar('petugas'),
        ];

        $jasaPeralatan->update($id, $data);
    
        session()->setFlashdata('message', 'Data Order Peralatan Berhasil Diupdate');
        return redirect()->to('/jasaperalatan');
    }

    function bayar($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $data = array(
            'jasaPeralatan' => $jasaPeralatan->find($id)
        );
        return view('jasaperalatan/bayar', $data);
    }

    public function prosesbayar($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $dataOrder = $jasaPeralatan->find($id);
    
        if (empty($dataOrder)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Biaya Pemakaian Peralatan Tidak ditemukan!');
        }
    
        // Validasi input tanpa mengharuskan file diunggah jika tidak ada file baru yang diunggah
        $rules = [
           'nama_penyewa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Penyewa'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'petugas' => [
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
            'tanggal' => $this->request->getVar('tanggal'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_selesai' => $this->request->getVar('jam_selesai'),
            'keranjang_plastik' => $this->request->getVar('keranjang_plastik'),
            'by_keranjang_plastik' => $this->request->getVar('by_keranjang_plastik'),
            'meja_sortir' => $this->request->getVar('meja_sortir'),
            'by_meja_sortir' => $this->request->getVar('by_meja_sortir'),
            'gerobak' => $this->request->getVar('gerobak'),
            'by_gerobak' => $this->request->getVar('by_gerobak'),
            'timbangan' => $this->request->getVar('timbangan'),
            'by_timbangan' => $this->request->getVar('by_timbangan'),
            'ice_cruiser' => $this->request->getVar('ice_cruiser'),
            'by_ice_cruiser' => $this->request->getVar('by_ice_cruiser'),
            'petugas' => $this->request->getVar('petugas'),
            'status_order' => "selesai",
            'total' => $this->request->getVar('total'),
            'bendahara' => $this->request->getVar('bendahara'),
        ];

        $jasaPeralatan->update($id, $data);
    
        session()->setFlashdata('message', 'Pembayaran Biaya Pemakaian Peralatan Berhasil');
        return redirect()->to('/jasaperalatan');
    }

    function detail($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $data = array(
            'jasaPeralatan' => $jasaPeralatan->find($id)
        );
        return view('jasaperalatan/detail', $data);
    }

    function cetakorder($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $data = array(
            'jasaPeralatan' => $jasaPeralatan->find($id)
        );
        return view('jasaperalatan/cetakorder', $data);
    }

    function cetakperhitungan($id)
    {
        $jasaPeralatan = new JasaPeralatanModel();
        $data = array(
            'jasaPeralatan' => $jasaPeralatan->find($id)
        );
        return view('jasaperalatan/cetakperhitungan', $data);
    }

    function delete($id)
    {
        $jasaPeralatan = new UploadSuratModel();
        $dataPeralatan = $jasaPeralatan->find($id);
        if (empty($dataPeralatan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Surat Tidak ditemukan !');
        }

        $jasaPeralatan->delete($id);
        session()->setFlashdata('message', 'Data Order Peralatan Berhasil Dihapus');
        return redirect()->to('/jasaperalatan');
    }

}
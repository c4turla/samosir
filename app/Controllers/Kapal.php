<?php

namespace App\Controllers;

use App\Models\KapalModel;
use \Hermawan\DataTables\DataTable;

class Kapal extends BaseController
{

    public function index()
    {
        return view('kapal/index');
    }

    public function ajax_kapal()
    {
        $kapalModel = new KapalModel();
        $kapalModel->select('id,nama_kapal,pemilik,gt,tipe_kapal,tanggal_akhir_sipi,tanggal_akhir_sipi AS status,panjang');

        return DataTable::of($kapalModel)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->format('status', function ($row) {
                if ($row >= date("Y-m-d")) {
                    return '<div class="badge badge-soft-success font-size-12">Aktif</div>';
                } else {
                    return '<div class="badge badge-soft-danger font-size-12">Expired</div>';
                }
            })
            ->add('action', function ($row) {
                $edit = base_url("kapal/edit") . '/' . $row->id;
                $hapus = base_url("kapal/delete") . '/' . $row->id;
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
            ->hide('id')
            ->toJson();
    }

    public function add()
    {
        return view('kapal/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus diisi'
                ]
            ],
            'nama_kapal' => [
                'rules' => 'is_unique[data_kapal.nama_kapal]',
                'errors' => [
                    'is_unique' => 'Nama Kapal Sudah Ada, Mohon gunakan nama lain.'
                ]
            ],
            'gt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'GT Harus diisi'
                ]
            ],
            'foto_kapal' => [
                'rules' => 'mime_in[foto_kapal,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_kapal,4096]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $photo = $this->request->getFile('foto_kapal');
        $fileName = $photo->getRandomName();
        $kapals = new KapalModel();
        $kapals->insert([
            'nama_kapal' => $this->request->getVar('nama_kapal'),
            'pemilik' => $this->request->getVar('pemilik'),
            'gt' => $this->request->getVar('gt'),
            'no_izin' => $this->request->getVar('no_izin'),
            'alat_tangkap' => $this->request->getVar('alat_tangkap'),
            'tanda_selar' => $this->request->getVar('tanda_selar'),
            'tipe_kapal' => $this->request->getVar('tipe_kapal'),
            'tanggal_sipi' => $this->request->getVar('tanggal_sipi'),
            'tanggal_akhir_sipi' => $this->request->getVar('tanggal_akhir_sipi'),
            'panjang' => $this->request->getVar('panjang'),
            'no_siup' => $this->request->getVar('no_siup'),
            'foto_kapal' => $fileName
        ]);
        $photo->move('images/kapal/', $fileName);
        session()->setFlashdata('message', 'Tambah Data Kapal Berhasil');
        return redirect()->to('/kapal');
    }

    function edit($id)
    {
        $kapalModel = new KapalModel();
        $data = array(
            'kapal' => $kapalModel->find($id)
        );
        return view('kapal/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus diisi'
                ]
            ],
            'gt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'GT Harus diisi'
                ]
            ],
            'foto_kapal' => [
                'rules' => 'mime_in[foto_kapal,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_kapal,4096]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $fileImage_name = $this->request->getVar('oldfile');
        if (isset($_FILES) && @$_FILES['foto_kapal']['error'] != '4') {
            if ($fileImage = $this->request->getFile('foto_kapal')) {
                if (!$fileImage->isValid()) {
                    throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                } else {
                    $fileImage_name = $fileImage->getRandomName();
                    $fileImage->move('images/kapal', $fileImage_name);
                }
            }
        }

        $data = [
            'nama_kapal' => $this->request->getVar('nama_kapal'),
            'pemilik' => $this->request->getVar('pemilik'),
            'gt' => $this->request->getVar('gt'),
            'no_izin' => $this->request->getVar('no_izin'),
            'alat_tangkap' => $this->request->getVar('alat_tangkap'),
            'tanda_selar' => $this->request->getVar('tanda_selar'),
            'tipe_kapal' => $this->request->getVar('tipe_kapal'),
            'tanggal_sipi' => $this->request->getVar('tanggal_sipi'),
            'tanggal_akhir_sipi' => $this->request->getVar('tanggal_akhir_sipi'),
            'panjang' => $this->request->getVar('panjang'),
            'no_siup' => $this->request->getVar('no_siup'),
            'foto_kapal' => $fileImage_name

        ];
        $kapals = new KapalModel();
        $kapals->update($id, $data);
        session()->setFlashdata('message', 'Update Data Kapal Berhasil');
        return redirect()->to('/kapal');
    }

    function delete($id)
    {
        $kapals = new KapalModel();
        $dataKapal = $kapals->find($id);
        if (empty($dataKapal)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kapal Tidak ditemukan !');
        }        
        $kapals->delete($id);
        session()->setFlashdata('message', 'Data Kapal Berhasil Dihapus');
        return redirect()->to('/kapal');
    }
}

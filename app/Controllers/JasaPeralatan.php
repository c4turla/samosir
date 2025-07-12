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

    public function ajax_upload()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('upload_surat b')
                ->select('b.id_upload, a.nama_kapal, b.tanggal_masuk, b.tanggal_keluar, b.path_file')
                ->join('data_kapal a', 'a.id=b.id_kapal')
                ->orderBy('id_upload', 'desc');


        return DataTable::of($builder)
            ->addNumbering()
            ->format('nama_kapal', function ($row) {
                    return '<a href="javascript: void(0);" class="text-dark fw-medium">'.$row.'</a>';
            })
            ->add('action', function ($row) {
                $edit = base_url("uploadsurat/edit") . '/' . $row->id_upload;
                $hapus = base_url("uploadsurat/delete") . '/' . $row->id_upload;
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
            ->hide('id_upload')
            ->toJson();
    }

    public function add()
    {
        $keberangkatans = new KeberangkatanModel();
        $data['kapal'] = $keberangkatans->getKapal()->getResult();;
        return view('jasaperalatan/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Kapal'
                ]
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Masuk Harus diisi'
                ]
            ],
            'tanggal_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Keluar Harus diisi'
                ]
            ],
            'path_file' => [
                'rules' => 'uploaded[path_file]|mime_in[path_file,application/pdf]|max_size[path_file,4096]',
                'errors' => [
                    'uploaded' => 'File wajib diunggah.',
                    'mime_in' => 'File harus berupa PDF.',
                    'max_size' => 'Ukuran file maksimal 4 MB.'
                ]
            ]
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $uploadsurat = new UploadSuratModel();

        $filesurat = $this->request->getFile('path_file');
        $namasurat = $filesurat->getRandomName();

        $filesurat->move('images/users/surat', $namasurat);
        
        $uploadsurat->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'path_file' => $namasurat,
            'upload_by' => $this->request->getVar('upload_by')
        ]);
        session()->setFlashdata('message', 'Surat Berhasil diupload');
        return redirect()->to('/uploadsurat');
    }

    function edit($id)
    {
        $uploadsurat = new UploadSuratModel();
        $data = array(
            'uploadsurat' => $uploadsurat->find($id)
        );
        $data['kapal'] = $uploadsurat->getKapal()->getResult();;
        return view('uploadsurat/edit', $data);
    }

    public function update($id)
    {
        $uploadsurat = new UploadSuratModel();
        $dataSurat = $uploadsurat->find($id);
    
        if (empty($dataSurat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Surat Tidak ditemukan!');
        }
    
        // Validasi input tanpa mengharuskan file diunggah jika tidak ada file baru yang diunggah
        $rules = [
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Nama Kapal'
                ]
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Masuk Harus diisi'
                ]
            ],
            'tanggal_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Keluar Harus diisi'
                ]
            ],
            'path_file' => [
                'rules' => 'mime_in[path_file,application/pdf]|max_size[path_file,4096]',
                'errors' => [
                    'mime_in' => 'File harus berupa PDF.',
                    'max_size' => 'Ukuran file maksimal 4 MB.'
                ]
            ]
        ];
    
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    
        $file = $this->request->getFile('path_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('images/users/surat/', $newName);
    
            // Hapus file lama
            if (file_exists('images/users/surat/' . $dataSurat['path_file'])) {
                unlink('images/users/surat/' . $dataSurat['path_file']);
            }
    
            $data['path_file'] = $newName;
        } else {
            $data['path_file'] = $this->request->getPost('old_path_file');
        }
    
        $data['id_kapal'] = $this->request->getPost('id_kapal');
        $data['tanggal_masuk'] = $this->request->getPost('tanggal_masuk');
        $data['tanggal_keluar'] = $this->request->getPost('tanggal_keluar');
        $data['upload_by'] = $this->request->getPost('upload_by');
    
        $uploadsurat->update($id, $data);
    
        session()->setFlashdata('message', 'Data Surat Berhasil Diupdate');
        return redirect()->to('/uploadsurat');
    }

    function delete($id)
    {
        $uploadsurat = new UploadSuratModel();
        $dataSurat = $uploadsurat->find($id);
        if (empty($dataSurat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Surat Tidak ditemukan !');
        }
            // Path file yang akan dihapus
        $filePath = WRITEPATH . 'images/users/surat' . $dataSurat['path_file'];

        // Hapus file jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $uploadsurat->delete($id);
        session()->setFlashdata('message', 'Data Surat Berhasil Dihapus');
        return redirect()->to('/uploadsurat');
    }

}

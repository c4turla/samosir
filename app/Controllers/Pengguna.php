<?php

namespace App\Controllers;
use App\Models\PenggunaModel;
use App\Models\KedatanganModel;
use App\Models\KelolaanModel;
use App\Models\KapalModel;

class Pengguna extends BaseController
{

    public function index()
    {
        $penggunas = new PenggunaModel();
        $data['pengguna'] = $penggunas->findAll();
        return view('pengguna/index',$data);
    }

    public function add()
    {
        return view('pengguna/create');
    }

    public function store()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'max_length' => 'Nama Maksimal 100 Karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[data_pengguna.email]',
                'errors' => [
                    'required' => 'Email Harus diisi',
                    'valid_email' => 'Format Email tidak valid',
                    'is_unique' => 'Email Sudah ada, Mohon Gunakan Email Lain'
                ]
            ],
            'phone_no' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
                'errors' => [
                    'required' => 'Password Harus diisi',
                    'min_length' => 'Password Minimal 6 Karakter',
                    'max_length' => 'Password Maksimal 50 Karakter'
                ]
            ],
            'confpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password Harus sama dengan Password'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $penggunas = new PenggunaModel();
        $penggunas->insert([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'phone_no' => $this->request->getVar('phone_no'),
            'status' => 1
        ]);
        session()->setFlashdata('message', 'Data Pengguna Berhasil Ditambahkan');
        return redirect()->to('/pengguna');
    }

    function edit($id)
    {
        $penggunaModel = new PenggunaModel();
        $data = array(
            'pengguna' => $penggunaModel->find($id)
        );
        $data['kapal'] = $penggunaModel->pilih_kapal($id)->getResultArray();
        return view('pengguna/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $penggunas = new PenggunaModel();
        $penggunas->update($id, [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone_no' => $this->request->getVar('phone_no'),
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Update Data Pengguna Berhasil');
        return redirect()->to('/pengguna');
    }

    function kapal($id)
    {
        $penggunaModel = new PenggunaModel();
        $data = array(
            'pengguna' => $penggunaModel->find($id)
        );
        $data['kapal'] = $penggunaModel->pilih_kapal($id)->getResultArray();
        return view('pengguna/kapal', $data);
    }

    function addkelolaan($id)
    {
        $kedatangans = new KedatanganModel();
        $penggunaModel = new PenggunaModel();

        $data['kapal'] = $kedatangans->getKapal()->getResult();      
        $data['pengguna'] = $penggunaModel->find($id);
        return view('pengguna/tambah_kapal', $data);
    }

    public function savekelolaan()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'max_length' => 'Nama Maksimal 100 Karakter'
                ]
            ],
            'id_kapal' => [
                'rules' => 'required|is_unique[kapal_kelolaan.id_kapal]',
                'errors' => [
                    'required' => 'Kapal Harus dipilih',
                    'is_unique' => 'Kapal Sudah dikelola oleh pengurus.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi'
                ]
            ],
            'ktp' => [
                'rules' => 'mime_in[ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[ktp,4096]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg/jpeg/gif/png/pdf',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
            ],
            'surat_kuasa' => [
                'rules' => 'mime_in[surat_kuasa,image/jpg,image/jpeg,image/gif,image/png]|max_size[surat_kuasa,4096]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg/jpeg/gif/png/pdf',
                    'max_size' => 'Ukuran File Maksimal 4 MB'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $keloaans = new KelolaanModel();
        $kapals = new KapalModel();

        $filektp = $this->request->getFile('ktp');
        $namaktp = $filektp->getRandomName();
        $filesurat = $this->request->getFile('surat_kuasa');
        $namasurat = $filesurat->getRandomName();

        $filektp->move('images/users/kelolaan', $namaktp);
        $filesurat->move('images/users/kelolaan', $namasurat);
        
        $keloaans->insert([
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'id_kapal' => $this->request->getVar('id_kapal'),
            'alamat' => $this->request->getVar('alamat'),
            'ktp' => $namaktp,
            'surat_kuasa' => $namasurat
        ]);
        $kapals->update($id = $this->request->getVar('id_kapal'),[
            'id_pengurus' => $this->request->getVar('id_pengguna'),
            'status_pengurus' => '1'
        ]);
        session()->setFlashdata('message', 'Data Kapal Kelolaan Berhasil Ditambahkan');
        return redirect()->to('/pengguna');
    }

    public function resetpassword($id)
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[6]|max_length[50]',
                'errors' => [
                    'required' => 'Password Harus diisi',
                    'min_length' => 'Password Minimal 6 Karakter',
                    'max_length' => 'Password Maksimal 50 Karakter'
                ]
            ],
            'confpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password Harus sama dengan Password'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $penggunas = new PenggunaModel();
        $penggunas->update($id, [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('message', 'Update Password Berhasil');
        return redirect()->to('/pengguna');
    }

    function aktif($id)
    {
        $penggunas = new PenggunaModel();
        $dataPengguna = $penggunas->find($id);
        if (empty($dataPengguna)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak ditemukan !');
        }
        $penggunas->update($id, [
            'status' => 1
        ]);
        session()->setFlashdata('message', 'Data Pengguna Berhasil Diaktifkan');
        return redirect()->to('/pengguna');
    }

    function delete($id)
    {
        $penggunas = new PenggunaModel();
        $dataPengguna = $penggunas->find($id);
        if (empty($dataPengguna)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak ditemukan !');
        }
        $penggunas->delete($id);
        session()->setFlashdata('message', 'Data Pengguna Berhasil Dihapus');
        return redirect()->to('/pengguna');
    }

    function delkapal($id)
    {
        $kapals = new KapalModel();
        $keloaans = new KelolaanModel();
        $dataKapal = $kapals->find($id);
        if (empty($dataKapal)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kapal Kelolaan Tidak ditemukan !');
        }
        $kapals->update($id, [
            'id_pengurus' => null,
            'status_pengurus' => '0'
        ]);
        $keloaans->where('id_kapal', $id)->delete();
        session()->setFlashdata('message', 'Data Kapal Kelolaan Berhasil Dihapus');
        return redirect()->back();
    }


}

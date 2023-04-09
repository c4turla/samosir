<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

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


}

<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    protected $users;

    function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
    {
        $data = [
            'title_meta' => view('partial/title-meta', ['title' => 'Profile']),
            'page_title' => view('partial/page-title', ['title' => 'Profile', 'li_1' => 'User', 'li_2' => 'Profile'])
        ];
        $data['user'] = $this->users->findAll();
        return view('profile', $data);
    }

    public function setting()
    {
        $data = [
            'title_meta' => view('partial/title-meta', ['title' => 'Setting']),
            'page_title' => view('partial/page-title', ['title' => 'Setting', 'li_1' => 'Administrator', 'li_2' => 'Setting'])
        ];
        $data['user'] = $this->users->findAll();
        return view('setting', $data);
    }

    public function add()
    {
        return view('pengguna-add');
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
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email Harus diisi',
                    'is_unique' => 'Email sudah terdaftar, silahkan gunakan email lain'
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
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP Harus diisi'
                ]
            ],
            'photo' => [
                'rules' => 'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,2048]',
                'errors' => [
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $photo = $this->request->getFile('photo');
        $fileName = $photo->getRandomName();
        $this->users->insert([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jabatan' => $this->request->getVar('jabatan'),
            'role' => $this->request->getVar('role'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
            'photo' => $fileName
        ]);
        $photo->move('images/users/', $fileName);
        session()->setFlashdata('message', 'Tambah Data Pengguna Berhasil');
        return redirect()->to('/setting');
    }

    function edit($id)
    {
        $data = array(
            'user' => $this->users->find($id)
        );
        return view('pengguna-edit', $data);
    }

    public function update($id)
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
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Harus diisi',
                    'valid_email' => 'Format Email tidak valid'
                ]
            ],
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP Harus diisi'
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,2048]',
                'errors' => [
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $fileImage_name = $this->request->getVar('oldfile');
        if(isset($_FILES) && @$_FILES['photo']['error'] != '4') {
            if($fileImage = $this->request->getFile('photo')) {
                if (! $fileImage->isValid()) {
                    throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                } else {                   
                    $fileImage_name = $fileImage->getRandomName();
                    $fileImage->move('images/users', $fileImage_name);
                }
            }
        }
 
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'jabatan' => $this->request->getVar('jabatan'),
            'role' => $this->request->getVar('role'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
            'photo' => $fileImage_name
        ];
         
        $this->users->update($id, $data);

        session()->setFlashdata('message', 'Update Data Pengguna Berhasil');
        if ($id == $_SESSION['id']){
        session()->set( [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'jabatan'    => $data['jabatan'],
            'photo'    => $data['photo']
        ]);
        }
        return redirect()->to('/setting');
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
 
        $this->users->update($id, [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('message', 'Update Password Berhasil');
        return redirect()->to('/setting');
    }

    function delete($id)
    {
        $dataUser = $this->users->find($id);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengguna Tidak ditemukan !');
        }
        $this->users->delete($id);
        session()->setFlashdata('message', 'Data Pengguna Berhasil Dihapus');
        return redirect()->to('/setting');
    }
}

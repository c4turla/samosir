<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenggunaModel;
use App\Models\KelolaanModel;
use App\Models\KapalModel;
use \Firebase\JWT\JWT;

class Login extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userModel = new PenggunaModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (is_null($user)) {
            return $this->respond(['code' => 1, 'message' => 'Username atau password salah.'], 401);
        }

        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            return $this->respond(['code' => 1, 'message' => 'Username atau password salah.'], 401);
        }

        if ($user['status'] == 0) {
            return $this->respond(['code' => 1, 'message' => 'Akun anda belum di aktivasi oleh admin.'], 401);
        }

        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;

        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['email'],
        );

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'code' => 200,
            'message' => 'Login Berhasil',
            'data' => [
                'id' => $user['id_pengguna'],
                'nama_lengkap' => $user['name'],
                'email' => $user['email'],
                'no_hp' => $user['phone_no'],
                'photo' => 'https://ppnsibolga.com/images/users/' . $user['photo'],
                'Token' => $token,
            ]
        ];

        return $this->respond($response, 200);
    }

    // get Profile
    public function show($id = null)
    {
        $model = new PenggunaModel();
        $user = $model->find($id);
        if ($user) {
            $response = [
                'code' => 200,
                'message' => 'Profile Berhasil Ditampilkan',
                'data' => [
                    'nama_lengkap' => $user['name'],
                    'email' => $user['email'],
                    'no_hp' => $user['phone_no'],
                    'photo' => 'https://ppnsibolga.com/images/users/' . $user['photo']
                ]
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'code' => 404,
                'message' => 'Data Dengan ID = ' . $id . ' Tidak ditemukan',
            ];
            return $this->respond($response, 404);
        }
    }

    public function updatepassword($id = null)
    {
        $rules = [
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
        ];
        if (!$this->validate($rules)) {
            $response = [
                'code' => 0,
                'message' => 'Password Gagal Diubah',
                'data' => $this->validator->getErrors()
            ];
            return $this->respond($response, 400);
        }

        $penggunas = new PenggunaModel();
        $penggunas->update($id, [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        $response = [
            'code' => 200,
            'message' => 'Password berhasil diubah',
        ];
        return $this->respond($response, 200);
    }

    public function updateprofile($id)
    {
        $pengguna = new PenggunaModel();

        $id_pengguna = $this->request->getVar('id_pengguna');

        if($id_pengguna === null){
            $response = [
                'code'   => 400,
                'messages' => 'Data Pengguna NULL.',
            ];
            return $this->respond($response, 400);
        }

        $userData = $pengguna->find($id_pengguna);
        if($userData === null){
             $response = [
                'code'   => 400,
                'messages' => 'Data Pengguna Belum dipilih.',
            ];
            return $this->respond($response, 400);
        }

        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'phone_no' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No HP Harus Diisi'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            $response = [
                'code' => 400,
                'message' => 'Update Profile Gagal Diubah',
                'data' => $this->validator->getErrors()
            ];
            return $this->respond($response, 400);
        }

        $fileImage_name = $this->request->getVar('photo');
        if (isset($_FILES) && @$_FILES['photo']['error'] != '4') {
            if ($fileImage = $this->request->getFile('photo')) {
                if (!$fileImage->isValid()) {
                    throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                } else {
                    $fileImage_name = $fileImage->getRandomName();
                    $fileImage->move('images/users', $fileImage_name);
                }
            }
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'phone_no'  => $this->request->getVar('phone_no'),
            'photo'  => $fileImage_name
        ];
        $pengguna->update($id_pengguna, $data);
        $response = [
            'code'   => 200,
            'messages' => 'Data Pengguna berhasil diubah.',
        ];

        return $this->respond($response, 200);
    }
    
    public function savekelolaan()
    {
        $rules = [
            'id_pengguna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi'
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
 
        ];         
        if (!$this->validate($rules)) {
            $response = [
                'code' => 422,
                'message' => 'Kapal Kelolaan Gagal Ditambahkan',
                'data' => $this->validator->getErrors()
            ];
            return $this->respond($response, 422);
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
            'status_pengurus' => '0'
        ]);
        $response = [
            'code'   => 200,
            'messages' => 'Kapal Kelolaan berhasil ditambahkan.',
        ];

        return $this->respond($response, 200);
    }
    
    // get Kapal Kelolaan
        public function getKapalbyID($id)
        {
            $model = new KelolaanModel();
            $data = $model->getSPKelolaan($id);
            if ($data) {
                $response = [
                    'code' => 200,
                    'message' => 'Data Kapal Kelolaan Berhasil Ditampilkan',
                    'data' => $data
                ];
                return $this->respond($response, 200);
            } else {
                    $response = [
                    'code' => 200,
                    'message' => 'Anda Belum memiliki kapal kelolaan',
                ];
                return $this->respond($response, 200);
            }
        }
}

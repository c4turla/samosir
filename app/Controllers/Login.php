<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login_view');
    }

    public function process()
    {
        $users = new UserModel();
        $username = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $users->where([
            'email' => $username,
        ])->first();
        $pass = isset($data['password']) ? $data['password']:"";
        if ($data) {
            if (password_verify($password, $pass)) {
                session()->set( [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'jabatan'    => $data['jabatan'],
                    'hp'    => $data['hp'],
                    'alamat'    => $data['alamat'],
                    'photo'    => $data['photo'],
                    'role'    => $data['role'],
                    'logged_in'     => TRUE
                ]);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('msg', 'Username & Password Salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('msg', 'Username & Password Salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function signup()
	{
        helper(['form']);
        return view('register');
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]|is_unique[users.name]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]',
            'jabatan'       => 'required',
            'role'          => 'required',
            'photo'         => 'required'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();

            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'jabatan'  => $this->request->getVar('jabatan'),
                'role'     => $this->request->getVar('role'),
                'photo'    => $this->request->getVar('photo')
            ];

            $userModel->save($data);

            return redirect()->to('/login');
        }else{
            session()->setFlashdata('error', $this->validator->listErrors());            
            return redirect()->back()->withInput();
        }
          
    }

}

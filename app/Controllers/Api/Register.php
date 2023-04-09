<?php
 
namespace App\Controllers\Api;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenggunaModel;
 
class Register extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {

        $rules = [
			'name' => ['rules' => 'required|min_length[2]'],
            'email' => ['rules' => 'required|valid_email|is_unique[data_pengguna.email]'],
            'password' => ['rules' => 'required|min_length[6]'],
            'phone_no' => ['rules' => 'required|min_length[10]']
        ];
        
        if($this->validate($rules)){
            $model = new PenggunaModel();
            $data = [
                'name'      => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'phone_no'  => $this->request->getVar('phone_no'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status'    => 0 
            ];
            $model->save($data);
             
            return $this->respond(['code' => 0, 'message' => 'Registrasi Berhasil, mohon tunggu akun diaktivasi admin'], 200);
        }else{
            $response = [
			    'code' => 1,
                'errors' => $this->validator->getErrors(),
                'message' => 'Data Gagal Diinput'
            ];
            return $this->fail($response , 200);
             
        }
 
    }
 
}
<?php
 
namespace App\Controllers\Api;
 
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenggunaModel;
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
  
        if(is_null($user)) {
            return $this->respond(['code' => 1, 'message' => 'Username atau password salah.'], 200);
        }
  
        $pwd_verify = password_verify($password, $user['password']);
  
        if(!$pwd_verify) {
            return $this->respond(['code' => 1, 'message' => 'Username atau password salah.'], 200);
        }
		
		if($user['status']==0) {
            return $this->respond(['code' => 1, 'message' => 'Akun anda belum di aktivasi oleh admin.'], 200);
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
			'$id' => 1,
			'code' => 0,
            'message' => 'Login Berhasil',
			'data' => [
				'id' => $user['id_pengguna'],
				'nama_lengkap' => $user['name'],
				'email' => $user['email'],
				'no_hp' => $user['phone_no'],
				'photo' => $user['photo'],
				'Token' => $token,
			]
        ];
         
        return $this->respond($response, 200);
    }
 
}
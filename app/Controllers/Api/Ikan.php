<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\IkanModel;

class Ikan extends ResourceController
{
    use ResponseTrait;
    // Semua Ikan
    public function index()
    {
        $model = new IkanModel();
        $data = $model->orderBy('id_ikan', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    // get single Ikan
    public function show($id = null)
    {
        $model = new IkanModel();
        $data = $model->getWhere(['id_ikan' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id.' Tidak ditemukan');
        }
    }

    public function getIkan()
    {
        // Your API code here
        
        $data = array('id' => 1, 'name' => 'John Doe', 'email' => 'john.doe@example.com');
        
        return $this->response->setJSON($data);
    }
}

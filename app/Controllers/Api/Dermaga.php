<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TangkahanModel;

class Dermaga extends ResourceController
{
    use ResponseTrait;
    // Semua Kapal
    public function index()
    {
        $model = new TangkahanModel();
        $data = $model->orderBy('id_tangkahan', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    // get single kapal
    public function show($id = null)
    {
        $model = new TangkahanModel();
        $data = $model->getWhere(['id_tangkahan' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id.' Tidak ditemukan');
        }
    }
}

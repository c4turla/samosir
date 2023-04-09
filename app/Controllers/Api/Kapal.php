<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KedatanganModel;
use App\Models\KapalModel;

class Kapal extends ResourceController
{
    use ResponseTrait;
    // Semua Kapal
    public function index()
    {
        $model = new KedatanganModel();
        $data = $model->getKapal()->getResult();
       // $data = $model->getWhere(['tanggal_akhir_sipi' => '>= CURDATE()'])->getResult();
        return $this->respond($data, 200);
    }

    // get single kapal
    public function show($id = null)
    {
        $model = new KapalModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id.' Tidak ditemukan');
        }
    }
}

<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;

class Dashboard extends ResourceController
{
    use ResponseTrait;
    // Semua Kedatangan
    public function index()
    {
        $model = new KedatanganModel();
        $model2 = new KeberangkatanModel();
        $data = $model->statistik_kedatangan()->getResult();
        $data1 = $model2->statistik_keberangkatan()->getResult();
        $data2 = $model2->total_keberangkatan_new()->getResult();
        $data3 = $model->total_kedatangan_new()->getResult();
        $response = [
            'code' => 200,
            'message' => 'Statistik Kedatangan dan Keberangkatan Berhasil Ditampilkan',
            'data' => [
                'tot_kedatangan' => $data2,
                'tot_keberangkatan' => $data3,
                'kedatangan' => $data,
                'keberangkatan' => $data1
            ]
        ];
        return $this->respond($response, 200);
    }

  
}

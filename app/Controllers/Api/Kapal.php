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
        $response = [
            'code' => 0,
            'message' => 'Data Kapal Berhasil Ditampilkan',
            'data' => $data
        ];
       // $data = $model->getWhere(['tanggal_akhir_sipi' => '>= CURDATE()'])->getResult();
        return $this->respond($response, 200);
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

    public function getKapal($id = null)
    {
        $model = new KapalModel();
        $data = $model->select('id,nama_kapal,gt')->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Kapal Dengan ID = ' . $id.' Tidak ditemukan');
        }
    }
    
    public function getQRByID($idkapal)
    {
        $kapalModel = new KapalModel();
        $data = $kapalModel->getQRByID($idkapal);

        if ($data) {
            $response = [
                'code' => 200,
                'message' => 'Data Kedatangan dan Keberangkatan Berdasarkan ID Berhasil Ditampilkan',
                'data' => $data
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'code' => 404,
                'message' => 'Data Dengan ID Pengurus = ' . $idkapal . ' Tidak ditemukan',
            ];
            return $this->respond($response, 404);
        }
    }
}

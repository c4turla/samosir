<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KedatanganModel;

class Kedatangan extends ResourceController
{
    use ResponseTrait;
    // Semua Kedatangan
    public function index()
    {
        $model = new KedatanganModel();
        $data = $model->orderBy('id_kedatangan', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    // get single Kedatangan
    public function show($id = null)
    {
        $model = new KedatanganModel();
        $data = $model->getWhere(['id_kedatangan' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id.' Tidak ditemukan');
        }
    }

    // create a Kedatangan
    public function create()
    {
        $model = new KedatanganModel();
        $data = [
            'id_kapal' => $this->request->getPost('id_kapal'),
            'asal' => $this->request->getPost('asal'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'dermaga' => $this->request->getPost('dermaga'),
            'lat' => $this->request->getPost('lat'),
            'long' => $this->request->getPost('long'),
            'jenis_ikan1' => $this->request->getPost('jenis_ikan1'),
            'jenis_ikan2' => $this->request->getPost('jenis_ikan2'),
            'jenis_ikan3' => $this->request->getPost('jenis_ikan3'),
            'jenis_ikan4' => $this->request->getPost('jenis_ikan4'),
            'jenis_ikan5' => $this->request->getPost('jenis_ikan5'),
            'jenis_ikan6' => $this->request->getPost('jenis_ikan6'),
            'berat_ikan1' => $this->request->getPost('berat_ikan1'),
            'berat_ikan2' => $this->request->getPost('berat_ikan2'),
            'berat_ikan3' => $this->request->getPost('berat_ikan3'),
            'berat_ikan4' => $this->request->getPost('berat_ikan4'),
            'berat_ikan5' => $this->request->getPost('berat_ikan5'),
            'berat_ikan6' => $this->request->getPost('berat_ikan6'),
            'suhu_ikan' => $this->request->getPost('suhu_ikan'),
            'suhu_palka' => $this->request->getPost('suhu_palka'),
            'sampah' => $this->request->getPost('sampah'),
            'harga_rata' => $this->request->getPost('harga_rata'),
            'mutu' => $this->request->getPost('mutu'),
            'produk' => $this->request->getPost('produk'),
            'status_approval' => 0,
            'approve_by' => $this->request->getPost('approve_by'),
            'input_by' => $this->request->getPost('approve_by'),
            'status' => $this->request->getPost('status')
        ];
        $data = json_decode(file_get_contents("php://input"));
        //$data = $this->request->getPost();
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Berhasil Disimpan'
            ]
        ];
         
        return $this->respondCreated($data, 201);
    }    

    // delete Kedatangan
    public function delete($id_kedatangan = null)
    {
        $model = new KedatanganModel();
        $data = $model->find($id_kedatangan);
        if($data){
            $model->delete($id_kedatangan);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Berhasil dihapus'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Data Tidak Ditemukan id '.$id_kedatangan);
        }
         
    }
}

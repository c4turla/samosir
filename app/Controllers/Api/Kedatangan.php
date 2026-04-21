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
         $response = [
            'code' => 0,
            'message' => 'Data Kedatangan Berhasil Ditampilkan',
            'data' => $data
        ];
        return $this->respond($response, 200);
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
        $rules = [
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapal Harus dipilih'
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus diisi'
                ]
            ],
            'jam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Harus diisi'
                ]
            ],
            'dermaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dermaga Harus dipilih'
                ]
             ]
        ];

        if ($this->validate($rules)) {
            $model = new KedatanganModel();
            $data = [
                'id_kapal' => $this->request->getVar('id_kapal'),
                'asal' => $this->request->getVar('asal'),
                'tanggal' => $this->request->getVar('tanggal'),
                'jam' => $this->request->getVar('jam'),
                'dermaga' => $this->request->getVar('dermaga'),
                'jenis_ikan1' => $this->request->getVar('jenis_ikan1'),
                'jenis_ikan2' => $this->request->getVar('jenis_ikan2'),
                'jenis_ikan3' => $this->request->getVar('jenis_ikan3'),
                'jenis_ikan4' => $this->request->getVar('jenis_ikan4'),
                'jenis_ikan5' => $this->request->getVar('jenis_ikan5'),
                'jenis_ikan6' => $this->request->getVar('jenis_ikan6'),
                'berat_ikan1' => $this->request->getVar('berat_ikan1'),
                'berat_ikan2' => $this->request->getVar('berat_ikan2'),
                'berat_ikan3' => $this->request->getVar('berat_ikan3'),
                'berat_ikan4' => $this->request->getVar('berat_ikan4'),
                'berat_ikan5' => $this->request->getVar('berat_ikan5'),
                'berat_ikan6' => $this->request->getVar('berat_ikan6'),
                'sampah' => $this->request->getVar('sampah'),
                'status_approval' => 0,
                'input_by' => $this->request->getVar('input_by'),
                'status' => $this->request->getVar('status')
            ];
            $model->save($data);
            return $this->respond(['code' => 200, 'message' => 'Data Kedatangan Berhasil Disimpan'], 200);
        } else {
            $response = [
                'code' => 422,
                'message' => 'Data Kedatangan Gagal Disimpan',
                'data' => $this->validator->getErrors()
            ];
            return $this->respond($response, 200);
        }
    }
    
    // get Keberangkatan By ID Pengurus
    public function getKeberbyID($id)
    {
        $model = new KedatanganModel();
        $data = $model->getSPMobkedatangan($id);
        if ($data) {
            $response = [
                'code' => 200,
                'message' => 'Data Kedatangan Berdasarkan ID Pengurus Berhasil Ditampilkan',
                'data' => $data
            ];
            return $this->respond($response, 200);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id . ' Tidak ditemukan');
        }
    }
    
    // get Kedatangan Search By Keyword
    public function getSearchKedatangan()
    {
        $model = new KedatanganModel();
        $search = $this->request->getGet('search');
        $data = $model->getKedatanganBySearch($search);;
        if ($data) {
            $response = [
                'code' => 200,
                'message' => 'Data yang anda cari Berhasil Ditampilkan',
                'data' => $data
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'code' => 200,
                'message' => 'Data yang anda cari tidak ditemukan',
                'data' => $data
            ];
            return $this->respond($response, 200);
        }
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

<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KeberangkatanModel;

class Keberangkatan extends ResourceController
{
    use ResponseTrait;
    // Semua Keberangkatan
    public function index()
    {
        $model = new KeberangkatanModel();
        $data = $model->orderBy('id_keberangkatan', 'DESC')->findAll();
        $response = [
            'code' => 200,
            'message' => 'Data Keberangkatan Berhasil Ditampilkan',
            'data' => $data
        ];
        return $this->respond($response, 200);
    }

    // get single Keberangkatan
    public function show($id = null)
    {
        $model = new KeberangkatanModel();
        $data = $model->getWhere(['id_keberangkatan' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id . ' Tidak ditemukan');
        }
    }


    // get Keberangkatan By ID Pengurus
    public function getKeberbyID($id)
    {
        $model = new KeberangkatanModel();
        $data = $model->getSPMobkeberangkatan($id);
        if ($data) {
            $response = [
                'code' => 200,
                'message' => 'Data Keberangkatan Berdasarkan ID Pengurus Berhasil Ditampilkan',
                'data' => $data
            ];
            return $this->respond($response, 200);
        } else {
            return $this->failNotFound('Data Dengan ID = ' . $id . ' Tidak ditemukan');
        }
    }


    // create a Keberangkatan
    public function create()
    {
        $rules = [
            'id_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapal Harus dipilih'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Harus diisi'
                ]
            ],
            'abk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah ABK Harus diisi'
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
            $model = new KeberangkatanModel();
            $data = [
                'id_kapal' => $this->request->getVar('id_kapal'),
                'tujuan' => $this->request->getVar('tujuan'),
                'abk' => $this->request->getVar('abk'),
                'tanggal' => $this->request->getVar('tanggal'),
                'jam' => $this->request->getVar('jam'),
                'dermaga' => $this->request->getVar('dermaga'),
                'status' => $this->request->getVar('status'),
                'status_approval' => 0,
                'input_by' => $this->request->getVar('input_by')
            ];
            $model->save($data);
            return $this->respond(['code' => 200, 'message' => 'Data Keberangkatan Berhasil Disimpan'], 200);
        } else {
            $response = [
                'code' => 422,
                'message' => 'Data Keberangkatan Gagal Disimpan',
                'data' => $this->validator->getErrors()
            ];
            return $this->respond($response, 200);
        }
    }
    
    // get Keberangkatan Search By Keyword
    public function getSearchKeberangkatan()
    {
        $model = new KeberangkatanModel();
        $search = $this->request->getGet('search');
        $data = $model->getKeberangkatanBySearch($search);;
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

    // delete Keberangkatan
    public function delete($id_keberangkatan = null)
    {
        $model = new KeberangkatanModel();
        $data = $model->find($id_keberangkatan);
        if ($data) {
            $model->delete($id_keberangkatan);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data Tidak Ditemukan id ' . $id_keberangkatan);
        }
    }
}

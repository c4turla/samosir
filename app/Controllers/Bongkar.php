<?php

namespace App\Controllers;
use App\Models\BongkarModel;
use App\Models\KedatanganModel;

class Bongkar extends BaseController
{
    function __construct()
    {
        $this->bongkars = new BongkarModel();
        $this->kedatangans = new KedatanganModel();
    }
    public function index()
    {
        $data['bongkar'] = $this->bongkars->getBongkar()->getResult();;;
        return view('bongkar/index', $data);
    }

    public function add()
    {
        $data['kapal'] = $this->bongkars->getPilihKapal()->getResultArray();;
        return view('bongkar/create',$data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kapal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kapal Harus dipilih'
                ]
            ],
            'nama_nakhoda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Nakhoda Harus Diisi.'
                ]
            ],
            'syahbandar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Syahbandar Harus Dipilih.'
                ]
            ],
            'no_surat' => [
                'rules' => 'is_unique[data_bongkar.no_surat]',
                'errors' => [
                    'is_unique' => 'Nomor Surat Sudah Digunakan, Mohon gunakan nomor yang lain.'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->bongkars->insert([
            'id_kapal' => $this->request->getVar('id_kapal'),
            'id_kedatangan' => $this->request->getVar('id_kedatangan'),
            'no_surat' => $this->request->getVar('no_surat'),
            'syahbandar' => $this->request->getVar('syahbandar'),
            'nama_nakhoda' => $this->request->getVar('nama_nakhoda'),
            'tanda_pengenal' => $this->request->getVar('tanda_pengenal'),
            'jam' => $this->request->getVar('jam'),
            'no_urut' => $this->request->getVar('no_urut')
        ]);
        $this->kedatangans->update($id_kedatangan = $this->request->getVar('id_kedatangan'), [
            'status' => 'BONGKAR'
        ]);
        session()->setFlashdata('message', 'Data Bongkar Berhasil Ditambahkan');
        return redirect()->to('/bongkar');
    }

    public function cetak()
    {
        $request = \Config\Services::request();
        $id_bongkar = $request->uri->getSegment(3);
        $data['bongkar'] = $this->bongkars->pilih_bongkar($id_bongkar)->getRowArray();
        $filename = date('y-m-d-H-i-s'). '-form-izin-bongkar';

        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        // load HTML content
        $dompdf->loadHtml(view('bongkar/cetak',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    function delete($id)
    {
        $dataBongkar = $this->bongkars->find($id);
        if (empty($dataBongkar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Bongkar Tidak ditemukan !');
        }
        $this->bongkars->delete($id);
        session()->setFlashdata('message', 'Data Pembongkaran Ikan Berhasil Dihapus');
        return redirect()->to('/bongkar');
    }

}

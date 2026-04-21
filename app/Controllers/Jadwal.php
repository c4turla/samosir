<?php

namespace App\Controllers;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;
use App\Models\TangkahanModel;
class Jadwal extends BaseController
{
    function __construct()
    {
        $this->kedatangans = new KedatanganModel();
        $this->keberangkatans = new KeberangkatanModel();
    }

    public function index()
    {
        $tangkahans = new TangkahanModel();
        $data['posisi2'] = $tangkahans->getPosisi2()->getResultArray();;
        $data['kedatangan'] = $this->kedatangans->getKedatanganHarian()->getResult();
        $data['keberangkatan'] = $this->keberangkatans->getKeberangkatanHarian()->getResult();
        return view('jadwal/index',$data);
    }


}
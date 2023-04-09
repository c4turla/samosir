<?php

namespace App\Controllers;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;
use App\Models\TangkahanModel;
class Jadwal extends BaseController
{

    public function index()
    {
        $tangkahans = new TangkahanModel();
        $kedatangans = new KedatanganModel();
        $keberangkatans = new KeberangkatanModel();
        
        $data['posisi'] = $tangkahans->getPosisi()->getResultArray();;
        $data['kedatangan'] = $kedatangans->getKedatanganHarian()->getResult();
        $data['keberangkatan'] = $keberangkatans->getKeberangkatanHarian()->getResult();
        return view('jadwal/index',$data);
    }


}
<?php

namespace App\Controllers;
use App\Models\TangkahanModel;
class Posisi extends BaseController
{

    public function index()
    {
        $tangkahans = new TangkahanModel();
        $data['posisi'] = $tangkahans->getPosisi2()->getResultArray();;
        return view('posisi/index',$data);
    }
}
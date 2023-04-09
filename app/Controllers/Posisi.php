<?php

namespace App\Controllers;
use App\Models\TangkahanModel;
class Posisi extends BaseController
{

    public function index()
    {
        $tangkahans = new TangkahanModel();
        $data['posisi'] = $tangkahans->getPosisi()->getResultArray();
        $data['posisi2'] = $tangkahans->getPosisi2()->getResultArray();
      //  $finalData = array_merge($data['posisi'],$data['posisi2']);
      //  dd($finalData);die();
        return view('posisi/index',$data);
    }
}
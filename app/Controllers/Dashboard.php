<?php

namespace App\Controllers;

use App\Models\KapalModel;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;

class Dashboard extends BaseController
{

    public function index()
    {
        $kapals = new KapalModel();
        $kedatangans = new KedatanganModel();
        $keberangkatans = new KeberangkatanModel();
        $data = [
            'title_meta' => view('partial/title-meta', ['title' => 'Dashboard']),
            'page_title' => view('partial/page-title', ['title' => 'Dashboard', 'li_1' => 'SIKAP', 'li_2' => 'Dashboard'])
        ];
        $data['total_kapal'] = $kapals->total_kapal();
        $data['data_kapal'] = $kapals->data_kapal();
        $data['kapal_expired'] = $kapals->kapal_expired();
        $data['total_kedatangan'] = $kedatangans->total_kedatangan()->getResult();;
        $data['total_ikan'] = $kedatangans->total_ikan();
        $data['bulanan'] = array();
        foreach ($kedatangans->total_ikan_bulanan()->getResultArray() as $list) {
            $data['bulanan'][] = (float)$list['total'];
        }
        $data['nama_bulanan'] = array();
        foreach ($kedatangans->nama_ikan_bulanan()->getResultArray() as $list) {
            $data['nama_bulanan'][] = $list['nama_ikan'];
        }
        $data['berat_ikan'] = $kedatangans->berat_ikan();
        $data['selisih'] = $kedatangans->selisih_berat();
        $data['total_keberangkatan'] = $keberangkatans->total_keberangkatan()->getResult();;
        foreach ($kedatangans->statistik_kedatangan()->getResultArray() as $row) {
            $data['kedatangan'][] = (float)$row['Jan'];
            $data['kedatangan'][] = (float)$row['Feb'];
            $data['kedatangan'][] = (float)$row['Mar'];
            $data['kedatangan'][] = (float)$row['Apr'];
            $data['kedatangan'][] = (float)$row['Mei'];
            $data['kedatangan'][] = (float)$row['Jun'];
            $data['kedatangan'][] = (float)$row['Jul'];
            $data['kedatangan'][] = (float)$row['Agu'];
            $data['kedatangan'][] = (float)$row['Sep'];
            $data['kedatangan'][] = (float)$row['Okt'];
            $data['kedatangan'][] = (float)$row['Nov'];
            $data['kedatangan'][] = (float)$row['Des'];
        }
        foreach ($keberangkatans->statistik_keberangkatan()->getResultArray() as $row) {
            $data['keberangkatan'][] = (float)$row['Jan'];
            $data['keberangkatan'][] = (float)$row['Feb'];
            $data['keberangkatan'][] = (float)$row['Mar'];
            $data['keberangkatan'][] = (float)$row['Apr'];
            $data['keberangkatan'][] = (float)$row['Mei'];
            $data['keberangkatan'][] = (float)$row['Jun'];
            $data['keberangkatan'][] = (float)$row['Jul'];
            $data['keberangkatan'][] = (float)$row['Agu'];
            $data['keberangkatan'][] = (float)$row['Sep'];
            $data['keberangkatan'][] = (float)$row['Okt'];
            $data['keberangkatan'][] = (float)$row['Nov'];
            $data['keberangkatan'][] = (float)$row['Des'];
        }
        return view('dashboard', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\KapalModel;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->kapals = new KapalModel();
        $this->kedatangans = new KedatanganModel();
        $this->keberangkatans = new KeberangkatanModel();
    }
    public function index()
    {
        $data = [
            'title_meta' => view('partial/title-meta', ['title' => 'Dashboard']),
            'page_title' => view('partial/page-title', ['title' => 'Dashboard', 'li_1' => 'SIKAP', 'li_2' => 'Dashboard'])
        ];
        $data['total_kapal'] = $this->kapals->total_kapal();
        $data['data_kapal'] = $this->kapals->data_kapal();
        $data['kapal_expired'] = $this->kapals->kapal_expired();
        $data['total_kedatangan'] = $this->kedatangans->total_kedatangan();
        $data['total_ikan'] = $this->kedatangans->total_ikan();
        $data['bulanan'] = array();
        foreach ($this->kedatangans->total_ikan_bulanan()->getResultArray() as $list) {
            $data['bulanan'][] = (float)$list['total'];
        }
        $data['nama_bulanan'] = array();
        foreach ($this->kedatangans->nama_ikan_bulanan()->getResultArray() as $list) {
            $data['nama_bulanan'][] = $list['nama_ikan'];
        }
        $data['berat_ikan'] = $this->kedatangans->berat_ikan();
        $data['selisih'] = $this->kedatangans->selisih_berat();
        $data['total_keberangkatan'] = $this->keberangkatans->total_keberangkatan();
        foreach ($this->kedatangans->statistik_kedatangan()->getResultArray() as $row) {
            $data['kedatangan'][] = (float)$row['Januari'];
            $data['kedatangan'][] = (float)$row['Februari'];
            $data['kedatangan'][] = (float)$row['Maret'];
            $data['kedatangan'][] = (float)$row['April'];
            $data['kedatangan'][] = (float)$row['Mei'];
            $data['kedatangan'][] = (float)$row['Juni'];
            $data['kedatangan'][] = (float)$row['Juli'];
            $data['kedatangan'][] = (float)$row['Agustus'];
            $data['kedatangan'][] = (float)$row['September'];
            $data['kedatangan'][] = (float)$row['Oktober'];
            $data['kedatangan'][] = (float)$row['November'];
            $data['kedatangan'][] = (float)$row['Desember'];
        }
        foreach ($this->keberangkatans->statistik_keberangkatan()->getResultArray() as $row) {
            $data['keberangkatan'][] = (float)$row['Januari'];
            $data['keberangkatan'][] = (float)$row['Februari'];
            $data['keberangkatan'][] = (float)$row['Maret'];
            $data['keberangkatan'][] = (float)$row['April'];
            $data['keberangkatan'][] = (float)$row['Mei'];
            $data['keberangkatan'][] = (float)$row['Juni'];
            $data['keberangkatan'][] = (float)$row['Juli'];
            $data['keberangkatan'][] = (float)$row['Agustus'];
            $data['keberangkatan'][] = (float)$row['September'];
            $data['keberangkatan'][] = (float)$row['Oktober'];
            $data['keberangkatan'][] = (float)$row['November'];
            $data['keberangkatan'][] = (float)$row['Desember'];
        }
        return view('dashboard', $data);
    }
}

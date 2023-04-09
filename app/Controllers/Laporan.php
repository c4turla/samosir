<?php

namespace App\Controllers;
use App\Models\KapalModel;
use App\Models\KedatanganModel;
use App\Models\KeberangkatanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    function __construct()
    {
    }
    public function kapal()
    {
        return view('laporan/kapal');
    }

    public function kedatangan()
    {
        return view('laporan/kedatangan');
    }

    public function keberangkatan()
    {
        return view('laporan/keberangkatan');
    }

    public function jenis_ikan()
    {
        return view('laporan/jenis_ikan');
    }

    public function alat_tangkap()
    {
        return view('laporan/alat_tangkap');
    }

    public function gt()
    {
        return view('laporan/gt');
    }

    public function lap_kapal()
    {
    $kapal = new KapalModel();
    $dataKapal = $kapal->findAll();

    $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama Kapal')
                ->setCellValue('B1', 'Pemilik')
                ->setCellValue('C1', 'No Izin')
                ->setCellValue('D1', 'GT')
                ->setCellValue('E1', 'Panjang');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKapal as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data['nama_kapal'])
                    ->setCellValue('B' . $column, $data['pemilik'])
                    ->setCellValue('C' . $column, $data['no_izin'])
                    ->setCellValue('D' . $column, $data['gt'])
                    ->setCellValue('E' . $column, $data['panjang']);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Kapal';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }

    public function lap_kedatangan()
    {
    $kedatangan = new KedatanganModel();
                $tglawal = $_POST['tglawal'];
                $tglakhir = $_POST['tglakhir'];
    $dataKedatangan = $kedatangan->view_all_kedatangan($tglawal,$tglakhir);

    $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Nama Kapal')
                ->setCellValue('C1', 'GT')
                ->setCellValue('D1', 'Panjang')
                ->setCellValue('E1', 'Asal')
                ->setCellValue('F1', 'Tanggal')
                ->setCellValue('G1', 'Jam')
                ->setCellValue('H1', 'Nama Tangkahan')
                ->setCellValue('I1', 'Nama Ikan1')
                ->setCellValue('J1', 'Berat Ikan1')
                ->setCellValue('K1', 'Nama Ikan2')
                ->setCellValue('L1', 'Berat Ikan2')
                ->setCellValue('M1', 'Nama Ikan3')
                ->setCellValue('N1', 'Berat Ikan3')
                ->setCellValue('O1', 'Nama Ikan4')
                ->setCellValue('P1', 'Berat Ikan4')
                ->setCellValue('Q1', 'Nama Ikan5')
                ->setCellValue('R1', 'Berat Ikan5')
                ->setCellValue('S1', 'Nama Ikan6')
                ->setCellValue('T1', 'Berat Ikan6')
                ->setCellValue('U1', 'Suhu Ikan')
                ->setCellValue('V1', 'Suhu Palka')
                ->setCellValue('W1', 'Harga Rata2')
                ->setCellValue('X1', 'Mutu')
                ->setCellValue('Y1', 'Produk')
                ->setCellValue('Z1', 'Status')
                ->setCellValue('AA1', 'Sampah');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKedatangan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->id_kedatangan)
                    ->setCellValue('B' . $column, $data->nama_kapal)
                    ->setCellValue('C' . $column, $data->gt)
                    ->setCellValue('D' . $column, $data->panjang)
                    ->setCellValue('E' . $column, $data->asal)
                    ->setCellValue('F' . $column, $data->tanggal)
                    ->setCellValue('G' . $column, $data->jam)
                    ->setCellValue('H' . $column, $data->nama_tangkahan)
                    ->setCellValue('I' . $column, $data->nama_ikan1)
                    ->setCellValue('J' . $column, $data->berat_ikan1)
                    ->setCellValue('K' . $column, $data->nama_ikan2)
                    ->setCellValue('L' . $column, $data->berat_ikan2)
                    ->setCellValue('M' . $column, $data->nama_ikan3)
                    ->setCellValue('N' . $column, $data->berat_ikan3)
                    ->setCellValue('O' . $column, $data->nama_ikan4)
                    ->setCellValue('P' . $column, $data->berat_ikan4)
                    ->setCellValue('Q' . $column, $data->nama_ikan5)
                    ->setCellValue('R' . $column, $data->berat_ikan5)
                    ->setCellValue('S' . $column, $data->nama_ikan6)
                    ->setCellValue('T' . $column, $data->berat_ikan6)
                    ->setCellValue('U' . $column, $data->suhu_ikan)
                    ->setCellValue('V' . $column, $data->suhu_palka)
                    ->setCellValue('W' . $column, $data->harga_rata)
                    ->setCellValue('X' . $column, $data->mutu)
                    ->setCellValue('Y' . $column, $data->produk)
                    ->setCellValue('Z' . $column, $data->status)
                    ->setCellValue('AA' . $column, $data->sampah);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Kedatangan';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');

    $writer->save('php://output');
    exit();
    }


    public function lap_keberangkatan()
    {
    $keberangkatan = new KeberangkatanModel();
                $tglawal = $_POST['tglawal'];
                $tglakhir = $_POST['tglakhir'];
    $dataKeberangkatan = $keberangkatan->view_all_keberangkatan($tglawal,$tglakhir);

    $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Nama Kapal')
                ->setCellValue('C1', 'GT')
                ->setCellValue('D1', 'Panjang')
                ->setCellValue('E1', 'Tujuan')
                ->setCellValue('F1', 'ABK')
                ->setCellValue('G1', 'Tanggal')
                ->setCellValue('H1', 'Jam')
                ->setCellValue('I1', 'Nama Tangkahan')
                ->setCellValue('J1', 'Status')
                ->setCellValue('K1', 'Es')
                ->setCellValue('L1', 'Air')
                ->setCellValue('M1', 'Solar')
                ->setCellValue('N1', 'Oli')
                ->setCellValue('O1', 'Bensin')
                ->setCellValue('P1', 'Lainnya')
                ->setCellValue('Q1', 'Keterangan');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKeberangkatan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->id_keberangkatan)
                    ->setCellValue('B' . $column, $data->nama_kapal)
                    ->setCellValue('C' . $column, $data->gt)
                    ->setCellValue('D' . $column, $data->panjang)
                    ->setCellValue('E' . $column, $data->tujuan)
                    ->setCellValue('F' . $column, $data->abk)
                    ->setCellValue('G' . $column, $data->tanggal)
                    ->setCellValue('H' . $column, $data->jam)
                    ->setCellValue('I' . $column, $data->nama_dermaga)
                    ->setCellValue('J' . $column, $data->status)
                    ->setCellValue('K' . $column, $data->es)
                    ->setCellValue('L' . $column, $data->air)
                    ->setCellValue('M' . $column, $data->solar)
                    ->setCellValue('N' . $column, $data->oli)
                    ->setCellValue('O' . $column, $data->bensin)
                    ->setCellValue('P' . $column, $data->lainnya)
                    ->setCellValue('Q' . $column, $data->keterangan);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Keberangkatan';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');

    $writer->save('php://output');
    exit();
    }

    public function lap_jenis_ikan()
    {
    $kedatangan = new KedatanganModel();
                $tglawal = $_POST['tglawal'];
                $tglakhir = $_POST['tglakhir'];
    $dataKeberangkatan = $kedatangan->view_jenis_ikan($tglawal,$tglakhir);

    $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama Ikan')
                ->setCellValue('B1', 'Berat Total')
                ->setCellValue('C1', 'Tanggal');
    
    $column = 2;
    // tulis data mobil ke cell
    foreach($dataKeberangkatan as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $data->nama_ikan)
                    ->setCellValue('B' . $column, $data->total)
                    ->setCellValue('C' . $column, $data->tanggal);
        $column++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Per Jenis Ikan';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');

    $writer->save('php://output');
    exit();
    }

   

}

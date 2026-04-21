<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT TANDA BUKTI LAPOR KEBERANGKATAN KAPAL PERIKANAN</title>

</head>

<body>
    <img src="<?='assets/images/kop_baru.png' ?>" width="100%">
    
    <p style="text-align: center;"><strong>SURAT TANDA BUKTI LAPOR KEBERANGKATAN KAPAL PERIKANAN</strong></p>
    <p style="text-align: right;"><strong>Nomor : <?php echo $keberangkatan['nomor'] ?></strong></p>
    <p>Dengan ini memberikan persetujuan keluar kepada :</p>
    <table style="border-collapse: collapse; width: 100%; height: 252px;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">1.</td>
<td style="width: 27.118%; height: 18px;">Nama Kapal</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['nama_kapal'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">2.</td>
<td style="width: 27.118%; height: 18px;">Nama Perusahaan</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['pemilik'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">3.</td>
<td style="width: 27.118%; height: 18px;">Nama Nakhoda</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['nama_nakhoda'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">4.</td>
<td style="width: 27.118%; height: 18px;">Tanda Selar</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['tanda_selar'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">Alat Tangkap</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['alat_tangkap'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">Ukuran Kapal</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">a. Panjang Kapal (LOA)</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['panjang'] ?> Meter</td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">b. Berat Kotor</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['gt'] ?> GT</td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">5.</td>
<td style="width: 27.118%; height: 18px;">Merek/Kekuatan Mesin</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;">-</td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">6.</td>
<td style="width: 27.118%; height: 18px;">Tanggal dan Jam Masuk</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php
        $date = new DateTime($keberangkatan['tanggal_masuk']);
        $formattedDate = date_format($date, 'd-m-Y');
        $formattedTime = date_format($date, 'H:i:s');
        echo $formattedDate . "&nbsp;&nbsp;";
        echo $formattedTime . " WIB"; ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">7.</td>
<td style="width: 27.118%; height: 18px;">Tanggal dan Jam Keberangkatan</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php
        $date = new DateTime($keberangkatan['tanggal_berangkat']);
        $formattedDate = date_format($date, 'd-m-Y');
        $formattedTime = date_format($date, 'H:i:s');
        echo $formattedDate . "&nbsp;&nbsp;";
        echo $formattedTime . " WIB"; ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">8.</td>
<td style="width: 27.118%; height: 18px;">Telah Melakukan Kegiatan</td>
<td style="width: 1.73611%; height: 18px;">&nbsp;</td>
<td style="width: 47.118%; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">a. Tambat</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"> <?php 
    if ($keberangkatan['gt'] <= 5) {
        $etmal = 0;
        $total_jam = 0;
    } else {
        $etmal = $keberangkatan['etmal'];
        $total_jam = $keberangkatan['total_jam'];
    }
    echo $etmal . ' Etmal &nbsp;&nbsp;&nbsp; Total : ' . $total_jam;
    ?>
    </td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">b. Floating</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['floating'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">c. Bongkar Ikan</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;"><?php echo $keberangkatan['bongkar_ikan'] ?> Kg</td>
</tr>
<tr style="height: 18px;">
<td style="width: 4.02778%; height: 18px;">&nbsp;</td>
<td style="width: 27.118%; height: 18px;">d. Muat</td>
<td style="width: 1.73611%; height: 18px;">:</td>
<td style="width: 47.118%; height: 18px;">&nbsp;</td>
</tr>
</tbody>
</table>
<table style="border-collapse: collapse; width: 93.5764%; height: 48px;" border="0">
<tbody>
<tr style="height: 24px;">
<td style="width: 12.8788%; text-align: left; height: 24px;">&nbsp;</td>
<td style="width: 17.6137%; text-align: left; height: 24px;">a. Es : <?php echo $keberangkatan['es'] ?> Kg</td>
<td style="width: 14.2046%; text-align: left; height: 24px;">b. Air : <?php echo $keberangkatan['air'] ?> Liter</td>
<td style="width: 20.4545%; text-align: left; height: 24px;">c. Solar : <?php echo $keberangkatan['solar'] ?> Liter</td>
</tr>
<tr style="height: 24px;">
<td style="width: 12.8788%; text-align: left; height: 24px;">&nbsp;</td>
<td style="width: 17.6137%; text-align: left; height: 24px;">d. Olie : <?php echo $keberangkatan['oli'] ?> Liter</td>
<td style="width: 14.2046%; text-align: left; height: 24px;">e. Umpan : <?php echo $keberangkatan['bensin'] ?></td>
<td style="width: 20.4545%; text-align: left; height: 24px;">f. Lain-lain : <?php echo $keberangkatan['lainnya'] ?></td>
</tr>
</tbody>
</table>
<table style="border-collapse: collapse; width: 100%; height: 44px;" border="0">
<tbody>
<tr style="height: 26px;">
<td style="width: 5.03472%; height: 26px;">9.</td>
<td style="width: 47.5695%; height: 26px;">Penyelesaian Administrasi Pelabuhan</td>
<td style="width: 1.90969%; height: 26px;">:</td>
<td style="width: 45.4861%; height: 26px;"><?php echo $keberangkatan['administrasi'] ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 5.03472%; height: 18px;">10.</td>
<td style="width: 47.5695%; height: 18px;">Tujuan Keberangkatan</td>
<td style="width: 1.90969%; height: 18px;">:</td>
<td style="width: 45.4861%; height: 18px;"><?php echo $keberangkatan['tujuan'] ?></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="border-collapse: collapse; width: 100%; height: 54px;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">&nbsp;</td>
<td style="width: 50%; height: 18px;">Tapanuli Tengah,     <?php
        $date = new DateTime($keberangkatan['created_at']);
        $formattedDate = date_format($date, 'd-M-Y');
        echo $formattedDate; ?> </td>
</tr>
<tr style="height: 36px;">
<td style="width: 50%; height: 36px;">&nbsp;</td>
<td style="width: 50%; height: 36px;">
    <?php if ($keberangkatan['role'] == 3): ?>
            Syahbandar 
        <?php elseif ($keberangkatan['role'] == 2): ?>
            An. Syahbandar 
        <?php endif; ?>
    </td>
</tr>
</tbody>
</table>
<table style="border-collapse: collapse; width: 100%; height: 95px;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 33.3333%; height: 18px;">Nakhoda</td>
<td style="width: 17.0542%; height: 18px;">&nbsp;</td>
<td style="width: 49.6124%; height: 18px;">di Pelabuhan Perikanan Nusantara Sibolga</td>
</tr>
<tr style="height: 60px;">
<td style="width: 33.3333%; height: 60px;">&nbsp;</td>
<td style="width: 17.0542%; height: 60px;">&nbsp;</td>
<td style="width: 49.6124%; height: 60px;"><img src="<?='images/tandatangan/'.$keberangkatan['ttd']; ?>" width="30%"></td>
</tr>
<tr style="height: 18px;">
<td style="width: 33.3333%; height: 18px;">( <?php echo $keberangkatan['nama_nakhoda'] ?> )</td>
<td style="width: 17.0542%; height: 18px;">&nbsp;</td>
<td style="width: 49.6124%; height: 18px;">( <?php echo $keberangkatan['name'] ?> )<br/>&nbsp;&nbsp;NIP : <?php echo $keberangkatan['nip'] ?> </td>
</tr>
</tbody>
</table>
</body>

</html>
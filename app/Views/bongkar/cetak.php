<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Form Izin Bongkar</title>

</head>

<body>
    <img src="<?='assets/images/kop.png' ?>" width="100%">
    
    <p style="text-align: center;"><strong>SURAT PERSETUJUAN PEMBONGKARAN IKAN</strong></p>
    <p style="text-align: center;">Nomor : <?php echo $bongkar['no_surat'] ?></p>
    <p>Diberikan persetujuan untuk melakukan pembongkaran ikan hasil tangkapan kepada:</p>
    <table style="border-collapse: collapse; width: 93.4164%; height: 108px;" border="0">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 1. Nama Nakhoda/Nelayan&nbsp;</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['nama_nakhoda'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 2. Nama Kapal&nbsp;&nbsp;</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['nama_kapal'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 3. Alat Penangkap Ikan</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['alat_tangkap'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 4. Tanda Pengenal Kapal/Tanda Selar</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['tanda_pengenal'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 5. Ukuran Kapal (GT)</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['gt'] ?> GT</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 6. Jam/No. Urut bongkar</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $bongkar['jam'] ?> / <?php echo $bongkar['no_urut'] ?></td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: right;">Sibolga, <?php
        $date = new DateTime($bongkar['tanggal']);
        $formattedDate = date_format($date, 'd-M-Y');
        echo $formattedDate;
    ?></p>
    <p>A.n Kepala Pelabuhan Perikanan<br />Nusantara Sibolga,</p>
    <table style="border-collapse: collapse; width: 97.0994%; height: 123px;" border="0">
        <tbody>
            <tr style="height: 46px;">
                <td style="width: 45.4231%; height: 46px;">Syahbandar di PPN Sibolga</td>
                <td style="width: 10.59784%; height: 46px;">&nbsp;</td>
                <td style="width: 44.9789%; height: 46px;">
                    <p>Nakhoda/Nelayan</p>
                </td>
            </tr>
            <tr style="height: 59px;">
                <td style="width: 45.4231%; height: 59px;"><img src="<?='images/tandatangan/'.$bongkar['ttd']; ?>" width="50%"></td>
                <td style="width: 10.59784%; height: 59px;">&nbsp;</td>
                <td style="width: 44.9789%; height: 59px;">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.4231%; height: 18px;">(<?php echo $bongkar['syahbandar'] ?>)</td>
                <td style="width: 10.59784%; height: 18px;">&nbsp;</td>
                <td style="width: 44.9789%; height: 18px;">(<?php echo $bongkar['nama_nakhoda'] ?>)</td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><em>*</em><em>Lampiran XI Permen KP No. 33 Tahun 2021</em></p>
    <p>&nbsp;</p>
</body>

</html>
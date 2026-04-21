<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Form Olah Gerak</title>

</head>

<body>
    <img src="<?='assets/images/kop.png' ?>" width="100%">
    
    <p style="text-align: center;"><strong>SURAT PERSETUJUAN OLAH GERAK</strong></p>
    <p style="text-align: center;">Nomor : </p>
    <p>Diberikan persetujuan untuk melakukan olah gerak kapal kepada:</p>
    <table style="border-collapse: collapse; width: 93.4164%; height: 108px;" border="0">
        <tbody>

            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 1. Nama Kapal&nbsp;&nbsp;</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['nama_kapal'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 2. Nama Pemilik&nbsp;</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['pemilik'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 3. Alat Penangkap Ikan</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['alat_tangkap'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 4. Tanda Pengenal Kapal/Tanda Selar</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['tanda_selar'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 5. Ukuran Kapal (GT)</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['gt'] ?> GT</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 6. Dermaga Asal</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['dermaga_asal'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 7. Tanggal Kedatangan</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['tanggal'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 8. Jam Kedatangan</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['jam'] ?></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 31.5836%; height: 18px;">&nbsp; 9. Dermaga Tujuan</td>
                <td style="width: 1.90476%; height: 18px;">:</td>
                <td style="width: 41.6895%; height: 18px;"><?php echo $olah['tujuan'] ?></td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: right;">Sibolga, 
    <?php
        $date = new DateTime($olah['created_at']);
        $formattedDate = date_format($date, 'd-M-Y');
        echo $formattedDate; ?></p>
    <p>A.n Kepala Pelabuhan Perikanan<br />Nusantara Sibolga,</p>
    <table style="border-collapse: collapse; width: 97.0994%; height: 123px;" border="0">
        <tbody>
            <tr style="height: 46px;">
                <td style="width: 45.4231%; height: 46px;">Syahbandar di PPN Sibolga</td>
            </tr>
            <tr style="height: 59px;">
                <td style="width: 45.4231%; height: 59px;"><img src="" width="50%"></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.4231%; height: 18px;">(<?php echo $olah['syahbandar'] ?>)</td>

            </tr>
        </tbody>
    </table>
</body>

</html>
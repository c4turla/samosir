<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Perhitungan Jasa Air Tawar</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px 30px;
        }

        .text-center {
            text-align: center;
        }

        .table-bordered {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

            .nomor {
        float: right;
        margin-top: 10px;
    }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black;
            padding: 5px;
        }

        .signature-table {
            width: 100%;
            margin-top: 20px;
        }

        .signature-table td {
            vertical-align: top;
            text-align: center;
            height: 100px;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>

<body>
    <?php
function terbilang($angka)
{
    $angka = abs((int)$angka);
    $baca = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
    $hasil = "";

    if ($angka < 12) {
        $hasil = $baca[$angka];
    } elseif ($angka < 20) {
        $hasil = $baca[$angka - 10] . " belas";
    } elseif ($angka < 100) {
        $hasil = $baca[floor($angka / 10)] . " puluh";
        if ($angka % 10 != 0) {
            $hasil .= " " . terbilang($angka % 10);
        }
    } elseif ($angka < 200) {
        $hasil = "seratus";
        if ($angka - 100 != 0) {
            $hasil .= " " . terbilang($angka - 100);
        }
    } elseif ($angka < 1000) {
        $hasil = $baca[floor($angka / 100)] . " ratus";
        if ($angka % 100 != 0) {
            $hasil .= " " . terbilang($angka % 100);
        }
    } elseif ($angka < 2000) {
        $hasil = "seribu";
        if ($angka - 1000 != 0) {
            $hasil .= " " . terbilang($angka - 1000);
        }
    } elseif ($angka < 1000000) {
        $hasil = terbilang(floor($angka / 1000)) . " ribu";
        if ($angka % 1000 != 0) {
            $hasil .= " " . terbilang($angka % 1000);
        }
    } elseif ($angka < 1000000000) {
        $hasil = terbilang(floor($angka / 1000000)) . " juta";
        if ($angka % 1000000 != 0) {
            $hasil .= " " . terbilang($angka % 1000000);
        }
    } elseif ($angka < 1000000000000) {
        $hasil = terbilang(floor($angka / 1000000000)) . " miliar";
        if (fmod($angka, 1000000000) != 0) {
            $hasil .= " " . terbilang(fmod($angka, 1000000000));
        }
    } else {
        $hasil = "Angka terlalu besar";
    }

    return $hasil;
}

?>
    <div class="container">
            <div class="nomor">
        <table border="1" cellpadding="5">
            <tr>
                <td>No: <strong style="color: red;"> <?php echo $jasaAir['no_order']; ?> </strong></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
        <p class="text-center"><strong>PELABUHAN PERIKANAN NUSANTARA SIBOLGA</strong></p>
        <p class="text-center"><strong><u>KUITANSI JASA AIR TAWAR</u></strong></p>

<table border="0" style="width:auto; border-collapse: collapse;">
    <tbody>
        <tr>
            <td style="padding-right: 5px; white-space: nowrap;">Nama Kapal</td>
            <td style="padding-right: 5px;">:</td>
            <td style="padding-right: 5px;"><?php echo $jasaAir['nama_kapal']; ?></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; white-space: nowrap;">Tanggal Permintaan</td>
            <td style="padding-right: 5px;">:</td>
            <td style="padding-right: 5px;"><?php echo $jasaAir['tanggal_permintaan']; ?></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; white-space: nowrap;">Tanggal Pelayanan</td>
            <td style="padding-right: 5px;">:</td>
            <td style="padding-right: 5px;"><?php echo $jasaAir['tanggal_pelayanan']; ?></td>
        </tr>
    </tbody>
</table>
        <table class="table-bordered">
            <thead>
                <tr>
                    <th>BANYAKNYA PERMINTAAN (M3)</th>
                    <th>BIAYA PEMAKAIAN</th>
                    <th>JUMLAH (Rp.)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= $jasaAir['volume'] ?></td>
                    <td class="text-center">Rp <?= number_format($jasaAir['harga'], 0, ',', '.'); ?></td>
                    <td class="text-center">Rp <?= number_format($jasaAir['jumlah_pembayaran'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan="3"> Terbilang : <i><?= ucfirst(terbilang($jasaAir['jumlah_pembayaran'])) . ' rupiah'; ?> </i></td>
                </tr>
            </tbody>
        </table>

        <table class="signature-table">
            <tr>
                <td>Petugas Pelayanan Jasa,</td>
                <td>Pemakai Jasa</td>
                <td>Bendahara PNBP</td>
            </tr>
            <tr>
                <td>(<?= $jasaAir['pelaksana_lapangan'] ?>)</td>
                <td>(<?= $jasaAir['pemohon'] ?>)</td>
                <td>(<?= $jasaAir['bendahara'] ?>)</td>
            </tr>
        </table>
        <u>Mari Awasi dan Laporkan Semua Bentuk Korupsi. WA : 0813 9666 9717, 0811 662 484</u>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Jasa Penggunaan Peralatan</title>
    <style>
    body {
        font-family: 'Times New Roman', Times, serif;
        margin: 30px;
    }

     .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px 30px;
        }

    .header {
        text-align: center;
        margin-bottom: 10px;
    }

    .nomor {
        float: right;
        margin-top: -40px;
    }

    .content {
        margin-top: 30px;
    }

    table.table-bordered {
        border-collapse: collapse;
        width: 100%;
    }

    table.table-bordered th,
    table.table-bordered td {
        border: 1px solid black;
        padding: 6px;
        text-align: center;
    }

    .signature-table {
        width: 100%;
        margin-top: 10px;
    }

    .signature-table td {
        text-align: center;
        vertical-align: bottom;
        height: 100px;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .clear {
        clear: both;
    }

    .terbilang {
        margin-top: 15px;
    }

    hr.custom-line {
        border: 1px solid black;
        margin: 10px 0;
    }
    </style>
</head>

<body>
    <div class="container">
<!--     <div class="header">
        <img src="assets/images/kkp-min.png" alt="Logo" style="float: left; width: 70px; height: auto; margin-right: 10px;">
        <div style="text-align: center;">
            <strong>PELABUHAN PERIKANAN NUSANTARA SIBOLGA</strong><br>
            DIREKTORAT JENDERAL PERIKANAN TANGKAP<br>
            KEMENTERIAN KELAUTAN DAN PERIKANAN
        </div>
    </div> -->
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

    <div class="nomor">
        <table border="1" cellpadding="5">
            <tr>
                <td>No: <strong style="color: red;"> <?php echo $jasaPeralatan['no_order']; ?> </strong></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>

    <p class="text-center" style="text-align:center; font-weight:bold; margin-top: 20px;">
        DAFTAR PERHITUNGAN JASA PENGGUNAAN PERALATAN<br>
        PELABUHAN PERIKANAN NUSANTARA SIBOLGA
    </p>

    <div class="content">

        <p>Nama Kapal / Penyewa : <?= $jasaPeralatan['nama_penyewa']; ?></p>
        <p>Tanggal dan jam masa penggunaan : <?= $jasaPeralatan['tanggal']; ?> <?= $jasaPeralatan['jam_mulai']; ?></p>
        <p>Tanggal dan jam akhir penggunaan : <?= $jasaPeralatan['tanggal']; ?> <?= $jasaPeralatan['jam_selesai']; ?>
        </p>

        <table class="table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peralatan</th>
                    <th>Jumlah</th>
                    <th>Biaya Pemakaian (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td class="text-left">Keranjang Plastik</td>
                    <td><?= $jasaPeralatan['keranjang_plastik']; ?></td>
                    <td>Rp <?= number_format($jasaPeralatan['by_keranjang_plastik'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td class="text-left">Meja Sortir</td>
                    <td><?= $jasaPeralatan['meja_sortir']; ?></td>
                    <td>Rp <?= number_format($jasaPeralatan['by_meja_sortir'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td class="text-left">Gerobak</td>
                    <td><?= $jasaPeralatan['gerobak']; ?></td>
                    <td>Rp <?= number_format($jasaPeralatan['by_gerobak'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td class="text-left">Timbangan</td>
                    <td><?= $jasaPeralatan['timbangan']; ?></td>
                    <td>Rp <?= number_format($jasaPeralatan['by_timbangan'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td class="text-left">Ice Cruiser</td>
                    <td><?= $jasaPeralatan['ice_cruiser']; ?></td>
                    <td>Rp <?= number_format($jasaPeralatan['by_ice_cruiser'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td><strong>Rp <?= number_format($jasaPeralatan['total'], 0, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <p class="terbilang">
            Terbilang: <?= ucfirst(terbilang($jasaPeralatan['total'])) . ' rupiah'; ?>
        </p>
        <?php
            $tanggal = $jasaPeralatan['tanggal'];
            $datetime = new DateTime($tanggal);
        ?>
        <p class="text-right" style="margin-top: 40px;">
            Pondok Batu, <?php echo $datetime->format('d-M-Y'); ?>
        </p>

        <table class="signature-table">
            <tr>
                <td>Petugas Pelayanan Jasa</td>
                <td>Bendahara Penerimaan</td>
            </tr>
            <tr>
                <td>(<?= $jasaPeralatan['petugas']; ?>)</td>
                <td>(<?= $jasaPeralatan['bendahara']; ?>)</td>
            </tr>
        </table>
    </div>
    </div>
</body>

</html>
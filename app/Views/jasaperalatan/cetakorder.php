<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Order Pemakaian Peralatan</title>
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
    <div class="container">

        <p class="text-center"><strong>PELABUHAN PERIKANAN NUSANTARA SIBOLGA</strong></p>
        <p class="text-center"><strong><u>ORDER PEMAKAIAN PERALATAN</u></strong></p>
        <p class="text-center">No Order : <?php echo $jasaPeralatan['no_order']; ?></p>

        <?php
        // Ambil dan format tanggal
        $tanggal = $jasaPeralatan['tanggal']; // misalnya: '2025-07-11'
        $datetime = new DateTime($tanggal);

        // Mapping hari ke Bahasa Indonesia
        $hariIndo = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $hariInggris = $datetime->format('l'); // contoh: Friday
        $hari = $hariIndo[$hariInggris]; // hasil: Jumat
        $tanggalFormat = $datetime->format('d-m-Y'); // hasil: 11-07-2025
        ?>

        <p>Nama Penyewa : <?php echo $jasaPeralatan['nama_penyewa']; ?></p>
        <p>Hari / Tanggal : <?php echo "$hari, $tanggalFormat"; ?></p>

        <table class="table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peralatan</th>
                    <th>Jumlah</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-left">Keranjang Plastik</td>
                    <td class="text-center"><?= $jasaPeralatan['keranjang_plastik'] ?> Unit</td>
                    <td><?= $jasaPeralatan['ket_keranjang_plastik'] ?></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left">Meja Sortir</td>
                    <td class="text-center"><?= $jasaPeralatan['meja_sortir'] ?> Unit</td>
                    <td><?= $jasaPeralatan['ket_meja_sortir'] ?></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-left">Gerobak</td>
                    <td class="text-center"><?= $jasaPeralatan['gerobak'] ?> Unit</td>
                    <td><?= $jasaPeralatan['ket_gerobak'] ?></td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="text-left">Ice Cruiser</td>
                    <td class="text-center"><?= $jasaPeralatan['ice_cruiser'] ?> Unit</td>
                    <td><?= $jasaPeralatan['ket_ice_cruiser'] ?></td>
                </tr>
            </tbody>
        </table>

        <p class="text-right">Pondok Batu, <?php echo $datetime->format('d-M-Y'); ?></p>

        <table class="signature-table">
            <tr>
                <td>Petugas Lapangan</td>
                <td></td>
                <td>Pengguna Jasa</td>
            </tr>
            <tr>
                <td>(<?= $jasaPeralatan['petugas'] ?>)</td>
                <td></td>
                <td>(<?= $jasaPeralatan['nama_penyewa'] ?>)</td>
            </tr>
        </table>

        <u>Mari Awasi dan Laporkan Semua Bentuk Korupsi. WA : 0813 9666 9717, 0811 662 484</u>
    </div>
</body>

</html>

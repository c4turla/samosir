<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Order Jasa Air Tawar</title>
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
        <p class="text-center"><strong><u>ORDER PEMAKAIAN AIR TAWAR</u></strong></p>
        <p class="text-center">No Order : <strong style="color: red;"><?php echo $jasaAir['no_order']; ?></strong></p>

        <?php
        // Ambil dan format tanggal
        $tanggal = $jasaAir['tanggal_permintaan']; // misalnya: '2025-07-11'
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

        <p>Hari / Tanggal : <?php echo "$hari, $tanggalFormat"; ?></p>

        <table class="table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemakai</th>
                    <th>Volume (M3)</th>
                    <th>Harga /M3</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Ket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><?= $jasaAir['nama_kapal'] ?></td>
                    <td class="text-center"><?= $jasaAir['volume'] ?></td>
                    <td class="text-center">Rp <?= number_format($jasaAir['harga'], 0, ',', '.'); ?></td>
                    <td class="text-center">Rp <?= number_format($jasaAir['jumlah_pembayaran'], 0, ',', '.'); ?></td>
                    <td><?= $jasaAir['keterangan'] ?></td>
                </tr>
            </tbody>
        </table>

        <table class="signature-table">
            <tr>
                <td>Pemohon</td>
                <td></td>
                <td>Petugas Lapangan</td>
            </tr>
            <tr>
                <td>(<?= $jasaAir['pemohon'] ?>)</td>
                <td></td>
                <td>(<?= $jasaAir['pelaksana_lapangan'] ?>)</td>
            </tr>
        </table>
    </div>
</body>

</html>

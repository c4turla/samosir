<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>
<style>
    canvas {
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        width: 100%;
        height: 250px;
    }
</style>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/keberangkatan') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item active">Approval Keberangkatan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Approval Data Keberangkatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk approval data keberangkatan.</p>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <form action="<?= base_url('keberangkatan/simpan_approval/' . $keberangkatan['id_keberangkatan']) ?>" method="post">
                        <?= csrf_field(); ?>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-12 ms-lg-auto">
                            <div class="mt-4 mt-lg-0">
                                <div class="row mb-4">
                                    <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $keberangkatan['nomor'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="id_kapal" id="id_kapal" data-trigger disabled>
                                            <option value="">- Pilih Kapal -</option>
                                            <?php foreach ($kapal as $val) { ?>
                                                <?php if ($val->id === $keberangkatan['id_kapal']) : ?>
                                                    <?php echo "<option value='" . $val->id . "' selected>" . $val->nama_kapal . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id . "'>" . $val->nama_kapal . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Nama Nakhoda</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_nakhoda" name="nama_nakhoda" value="<?= $keberangkatan['nama_nakhoda'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $keberangkatan['tujuan'] ?>" disabled>
                                        <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Jumlah ABK</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="abk" name="abk" value="<?= $keberangkatan['abk'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal dan Jam Masuk</label>
                                    <div class="col-sm-2">
                                        <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $keberangkatan['tanggal_masuk'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal_berangkat" class="col-sm-3 col-form-label">Tanggal dan Jam Keberangkatan</label>
                                    <div class="col-sm-2">
                                        <input type="datetime-local" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $keberangkatan['tanggal_berangkat'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="etmal" class="col-sm-3 col-form-label">Tambat</label>
                                    <div class="col-sm-2">
                                    <div class="input-group">
                                    <input type="text" class="form-control" id="etmal" name="etmal" value="<?= $keberangkatan['etmal'] ?>" readonly>
                                                <div class="input-group-text">Etmal</div>
                                            </div>
                                        
                                    </div>
                                    <label for="etmal" class="col-sm-1 col-form-label">Total Jam</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="total_jam" name="total_jam" value="<?= $keberangkatan['total_jam'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="floating" class="col-sm-3 col-form-label">Floating</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="floating" name="floating" value="<?= $keberangkatan['floating'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="bongkar_ikan" class="col-sm-3 col-form-label">Bongkar Ikan</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="bongkar_ikan" name="bongkar_ikan" value="<?= $keberangkatan['bongkar_ikan'] ?>" disabled>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="tanggal" name="tanggal" value="<?= $keberangkatan['tanggal'] ?>">
                                <input type="hidden" class="form-control" id="jam" name="jam" value="<?= $keberangkatan['jam'] ?>">
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="dermaga" id="dermaga" data-trigger disabled>
                                            <option value="">- Pilih Dermaga -</option>
                                            <?php foreach ($dermaga as $val) { ?>
                                                <?php if ($val->id_tangkahan === $keberangkatan['dermaga']) : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "' selected>" . $val->nama . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "'>" . $val->nama . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status" id="status" data-trigger disabled>
                                            <option value="">- Pilih Status -</option>
                                            <option value="Sesuai Jadwal" <?= ($keberangkatan['status'] == "Sesuai Jadwal" ? "selected" : ""); ?>>Sesuai Jadwal</option>
                                            <option value="Pembatalan" <?= ($keberangkatan['status'] == "Pembatalan" ? "selected" : ""); ?>>Pembatalan</option>
                                            <option value="Ditunda" <?= ($keberangkatan['status'] == "Ditunda" ? "selected" : ""); ?>>Ditunda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="administrasi" class="col-sm-3 col-form-label">Penyelesaian Administrasi</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="administrasi" id="administrasi" data-trigger disabled>
                                            <option value="">- Pilih Administrasi -</option>
                                            <option value="Cek Point" <?= ($keberangkatan['administrasi'] == "Cek Point" ? "selected" : ""); ?>>Cek Poin</option>
                                            <option value="Cek Fisik" <?= ($keberangkatan['administrasi'] == "Cek Fisik" ? "selected" : ""); ?>>Cek Fisik</option>
                                            <option value="Surat Keterangan" <?= ($keberangkatan['administrasi'] == "Surat Keterangan" ? "selected" : ""); ?>>Surat Keterangan</option>
                                            <option value="Perberkalan" <?= ($keberangkatan['administrasi'] == "Perberkalan" ? "selected" : ""); ?>>Perberkalan</option>
                                            <option value="Lainnya" <?= ($keberangkatan['administrasi'] == "Lainnya" ? "selected" : ""); ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="syahbandar" class="col-sm-3 col-form-label">Pilih Syahbandar</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="syahbandar" id="syahbandar" data-trigger>
                                            <option value="">- Pilih Syahbandar -</option>
                                            <?php foreach ($syahbandar as $val) { ?>
                                                <?php if ($val->id === $keberangkatan['syahbandar']) : ?>
                                                    <?php echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id . "'>" . $val->name . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">Info Muatan / Data Logistik</h4>
                        </div>
                        </hr>
                        <table class="ml-10 mt-4" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Es</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="es" name="es" value="<?= $keberangkatan['es'] ?>" readonly>
                                                <div class="input-group-text">Kg</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Air</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="air" name="air" value="<?= $keberangkatan['air'] ?>" readonly>
                                                <div class="input-group-text">Liter</div>
                                            </div>
                                        </div>
                                    </div>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Solar</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="solar" name="solar" value="<?= $keberangkatan['solar'] ?>" readonly>
                                                <div class="input-group-text">Liter</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Olie</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="oli" name="oli" value="<?= $keberangkatan['oli'] ?>" readonly>
                                                <div class="input-group-text">Liter</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Umpan</label>
                                        <div class="col-sm-6">
     
                                                <input type="number" class="form-control" id="bensin" name="bensin" value="<?= $keberangkatan['bensin'] ?>" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Lain-lain</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="lainnya" name="lainnya" value="<?= $keberangkatan['lainnya'] ?>" readonly>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keberangkatan['keterangan'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </td>
                         </tr>
                    </table>
                    <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                    <div class="col-sm-4">
                                        <canvas id="signature-pad" class="signature-pad"></canvas>
                                        <input type="hidden" name="signature_data" id="signature-data">
                                        <div style="float: right;">
                                            <!-- tombol ganti warna  -->
                                            <button type="button" class="btn btn-success" id="change-color">
                                                Change Color
                                            </button>
                                            <!-- tombol undo  -->
                                            <button type="button" class="btn btn-dark" id="undo">
                                                <span class="fas fa-undo"></span>
                                                Undo
                                            </button>
                                            <!-- tombol hapus tanda tangan  -->
                                            <button type="button" class="btn btn-danger" id="clear">
                                                <span class="fas fa-eraser"></span>
                                                Clear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                <hr class="mt-4 mb-4">
                <div class="row justify-content-end">
                    <div class="col-sm-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" id="btn-submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bx-save font-size-16 align-middle me-2"></i> Simpan
                            </button>

                            <a href="<?= base_url('keberangkatan') ?>" class="btn btn-danger waves-effect waves-light">
                                <i class="bx bx-error font-size-16 align-middle me-2"></i> Batal
                                                </a>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end col -->
</div>
<!-- end row -->
<script>
        function calculateTotalHours() {
            const masuk = document.getElementById('tanggal_masuk').value;
            const berangkat = document.getElementById('tanggal_berangkat').value;

            if (masuk && berangkat) {
                const dateMasuk = new Date(masuk);
                const dateBerangkat = new Date(berangkat);
                const diffTime = Math.abs(dateBerangkat - dateMasuk);
                const diffMinutes = Math.floor(diffTime / (1000 * 60));
                const diffHours = Math.floor(diffMinutes / 60);
                const remainingMinutes = diffMinutes % 60;

                // Menghitung etmal berdasarkan aturan yang diberikan
                let etmal = Math.floor(diffHours / 24);
                const remainingHours = diffHours % 24;

                if (remainingHours > 0 || remainingMinutes > 0) {
                    if (remainingHours <= 6) {
                        etmal += 0.25;
                    } else if (remainingHours <= 12) {
                        etmal += 0.5;
                    } else if (remainingHours <= 18) {
                        etmal += 0.75;
                    } else {
                        etmal += 1;
                    }
                }

                document.getElementById('total_jam').value = `${diffHours} Jam ${remainingMinutes} Menit`;
                document.getElementById('etmal').value = etmal.toFixed(2);
            } else {
                document.getElementById('total_jam').value = '';
                document.getElementById('etmal').value = '';
            }
        }

        window.onload = function() {
            document.getElementById('tanggal_masuk').addEventListener('change', calculateTotalHours);
            document.getElementById('tanggal_berangkat').addEventListener('change', calculateTotalHours);
        }
</script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

<script>
    // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
    document.addEventListener('DOMContentLoaded', function() {
        resizeCanvas();
    })

    //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }


    var canvas = document.getElementById('signature-pad');

    //warna dasar signaturepad
    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)'
    });


    //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
    document.getElementById('clear').addEventListener('click', function() {
        signaturePad.clear();
    });

    //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
    document.getElementById('undo').addEventListener('click', function() {
        var data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });

    //saat tombol change color diklik maka akan merubah warna pena
    document.getElementById('change-color').addEventListener('click', function() {

        //jika warna pena biru maka buat menjadi hitam dan sebaliknya
        if (signaturePad.penColor == "rgba(0, 0, 255, 1)") {

            signaturePad.penColor = "rgba(0, 0, 0, 1)";
        } else {
            signaturePad.penColor = "rgba(0, 0, 255, 1)";
        }
    })

    $(document).on('click', '#btn-submit', function () {
                var signature = signaturePad.toDataURL();
                document.getElementById("signature-data").value = signature;
            })

</script>
<?= $this->endSection() ?>
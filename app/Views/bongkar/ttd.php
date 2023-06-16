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
                    <li class="breadcrumb-item"><a href="<?= base_url('/approvebongkar') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item active">Pembongkaran Ikan</li>
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
                <h4 class="card-title">Tambah Pembongkaran Ikan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data pembongkaran ikan.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('bongkar/update/' . $bongkar['id_bongkar']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama-ikan" class="col-sm-3 col-form-label">Data Kapal</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="id_kapal" id="id_kapal" data-trigger disabled>
                                            <?php foreach ($kapal as $val) { ?>
                                                <?php if ($val->id === $bongkar['id_kapal']) : ?>
                                                    <?php echo "<option value='" . $val->id . "' selected>" . $val->nama_kapal . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id . "'>" . $val->nama_kapal . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $bongkar['no_surat'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="syahbandar" class="col-sm-3 col-form-label">Nama Syahbandar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $bongkar['syahbandar'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nama Nakhoda/Nelayan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama_nakhoda" name="nama_nakhoda" value="<?= $bongkar['nama_nakhoda'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanda Pengenal Kapal/Tanda Selar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tanda_pengenal" name="tanda_pengenal" value="<?= $bongkar['tanda_pengenal'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Jam/No Urut Bongkar</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam" name="jam" value="<?= $bongkar['jam'] ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_urut" name="no_urut" value="<?= $bongkar['no_urut'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $bongkar['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanda Tangan</label>
                                    <div class="col-sm-4">
                                        <canvas id="signature-pad" class="signature-pad"></canvas>
                                        <input type="text" name="signature_data" id="signature-data">
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
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-12">

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" id="btn-submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle me-2"></i> Simpan
                                </button>

                                <button type="reset" class="btn btn-danger waves-effect waves-light">
                                    <i class="bx bx-error font-size-16 align-middle me-2"></i> Reset
                                </button>
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
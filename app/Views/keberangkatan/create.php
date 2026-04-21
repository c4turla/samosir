<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/keberangkatan') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item active">Tambah Keberangkatan</li>
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
                <h4 class="card-title">Tambah Data Keberangkatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data keberangkatan.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <form action="<?= base_url('keberangkatan/store') ?>" method="post">
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
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                    <select class="form-control" name="id_kapal" id="id_kapal" data-trigger>
                                        <option value="">- Pilih Kapal -</option>
                                        <?php foreach ($kapal as $row) : ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kapal; ?>  - <?php echo $row->no_izin; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Nama Nakhoda</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_nakhoda" name="nama_nakhoda" value="<?= old('nama_nakhoda'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= old('tujuan'); ?>">
                                        <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Jumlah ABK</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="abk" name="abk" value="<?= old('abk'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal dan Jam Masuk</label>
                                    <div class="col-sm-2">
                                        <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= old('tanggal'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal_berangkat" class="col-sm-3 col-form-label">Tanggal dan Jam Keberangkatan</label>
                                    <div class="col-sm-2">
                                        <input type="datetime-local" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= old('tanggal'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="etmal" class="col-sm-3 col-form-label">Tambat</label>
                                    <div class="col-sm-2">
                                    <div class="input-group">
                                    <input type="text" class="form-control" id="etmal" name="etmal" value="<?= old('etmal'); ?>" readonly>
                                                <div class="input-group-text">Etmal</div>
                                            </div>
                                        
                                    </div>
                                    <label for="etmal" class="col-sm-1 col-form-label">Total Jam</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="total_jam" name="total_jam" value="<?= old('total_jam'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="floating" class="col-sm-3 col-form-label">Floating</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="floating" name="floating" value="<?= old('floating'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="bongkar_ikan" class="col-sm-3 col-form-label">Bongkar Ikan</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="bongkar_ikan" name="bongkar_ikan" value="<?= old('bongkar_ikan'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="dermaga" id="dermaga" data-trigger>
                                            <option value="">- Pilih Dermaga -</option>
                                            <?php foreach ($dermaga as $row) : ?>
                                                <option value="<?php echo $row->id_tangkahan; ?>"><?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status" id="status" data-trigger>
                                            <option value="">- Pilih Status -</option>
                                            <option value="Sesuai Jadwal">Sesuai Jadwal</option>
                                            <option value="Pembatalan">Pembatalan</option>
                                            <option value="Ditunda">Ditunda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="administrasi" class="col-sm-3 col-form-label">Penyelesaian Administrasi</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="administrasi" id="administrasi" data-trigger>
                                            <option value="">- Pilih Administrasi -</option>
                                            <option value="Check Point">Cek Poin</option>
                                            <option value="Cek Fisik">Cek Fisik</option>
                                            <option value="Surat Keterangan">Surat Keterangan</option>
                                            <option value="Perberkalan">Perberkalan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="syahbandar" class="col-sm-3 col-form-label">Pilih Syahbandar</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="syahbandar" id="syahbandar" data-trigger>
                                            <option value="">- Pilih Syahbandar -</option>
                                            <?php foreach ($syahbandar as $row) : ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                            <?php endforeach; ?>
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
                                                <input type="number" class="form-control" id="es" name="es">
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
                                                <input type="number" class="form-control" id="air" name="air">
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
                                                <input type="number" class="form-control" id="solar" name="solar">
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
                                                <input type="number" class="form-control" id="oli" name="oli">
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
                                                <input type="text" class="form-control" id="bensin" name="bensin">
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
                                            <input type="text" class="form-control" id="lainnya" name="lainnya">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                                        </div>
                                    </div>
                </div>
                </td>
                </tr>

                </table>

                <hr class="mt-4 mb-4">

                <div class="row justify-content-end">
                    <div class="col-sm-12">

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
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
                    if (remainingHours < 6 || (remainingHours === 6 && remainingMinutes === 0)) {
                        etmal += 0.25;
                    } else if (remainingHours < 12 || (remainingHours === 12 && remainingMinutes === 0)) {
                        etmal += 0.5;
                    } else if (remainingHours < 18 || (remainingHours === 18 && remainingMinutes === 0)) {
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
<?= $this->endSection() ?>
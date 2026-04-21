<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">SPR Keberangkatan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/sprkeberangkatan') ?>">SPR</a></li>
                    <li class="breadcrumb-item active">Buat SPR Baru</li>
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
                <h4 class="card-title">Form Surat Persetujuan Rencana (SPR) Keberangkatan</h4>
                <p class="card-title-desc">Lengkapi data rencana keberangkatan kapal di bawah ini.</p>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('sprkeberangkatan/store') ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali!</strong><br><?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Data Kapal & Nakhoda</h5>
                            
                            <div class="row mb-3">
                                <label for="id_kapal" class="col-sm-4 col-form-label">Nama Kapal</label>
                                <div class="col-sm-8">
                                    <select class="form-select select2" name="id_kapal" id="id_kapal">
                                        <option value="">- Pilih Kapal -</option>
                                        <?php foreach($list_kapal as $k): ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['nama_kapal'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pemilik" class="col-sm-4 col-form-label">Pemilik/Perusahaan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" id="pemilik" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_nakhoda" class="col-sm-4 col-form-label">Nama Nakhoda</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_nakhoda" id="nama_nakhoda" value="<?= old('nama_nakhoda') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanda_selar" class="col-sm-4 col-form-label">Tanda Selar</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" id="tanda_selar" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Ukuran Kapal</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="panjang" readonly>
                                        <span class="input-group-text">M</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="gt" readonly>
                                        <span class="input-group-text">GT</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="merk_kekuatan_mesin" class="col-sm-4 col-form-label">Merk/Kekuatan Mesin</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="merk_kekuatan_mesin" id="merk_kekuatan_mesin" placeholder="Contoh: 300 PK">
                                </div>
                            </div>

                            <h5 class="font-size-14 mb-4 mt-5"><i class="mdi mdi-arrow-right text-primary me-1"></i> Muatan</h5>
                            <div class="row mb-3">
                                <label for="muatan_bbm" class="col-sm-4 col-form-label">BBM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="muatan_bbm" id="muatan_bbm" placeholder="Contoh: 2000 LTR">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="muatan_air" class="col-sm-4 col-form-label">AIR</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="muatan_air" id="muatan_air" placeholder="Contoh: 2000 LTR">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="muatan_es" class="col-sm-4 col-form-label">ES</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="muatan_es" id="muatan_es" placeholder="Contoh: 12.000 KG">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-6">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Check Point & Fisik</h5>
                            
                            <div class="border p-3 rounded mb-4">
                                <h6 class="mb-3 text-muted">Check Point</h6>
                                <div class="row mb-2">
                                    <label class="col-sm-5 col-form-label">Tgl Masuk / STBL Kedatangan</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" name="checkpoint_tgl_masuk">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="checkpoint_no_stbl_kedatangan" placeholder="No STBL">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-sm-5 col-form-label">Tgl Keluar / STBL Kapal Keluar</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" name="checkpoint_tgl_keluar">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="checkpoint_no_stbl_keluar" placeholder="No STBL">
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-4">
                                <h6 class="mb-3 text-muted">Check Fisik Keberangkatan</h6>
                                <div class="row mb-2">
                                    <label class="col-sm-5 col-form-label">Tgl Masuk / STBL Kedatangan</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" name="checkfisik_tgl_masuk">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="checkfisik_no_stbl_kedatangan" placeholder="No STBL">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-sm-5 col-form-label">Tgl Keluar / STBL Kapal Keluar</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" name="checkfisik_tgl_keluar">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="checkfisik_no_stbl_keluar" placeholder="No STBL">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kegiatan" class="col-sm-4 col-form-label">Kegiatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Contoh: CK/CE">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rencana_berangkat_tgl" class="col-sm-4 col-form-label">Rencana Keberangkatan</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="rencana_berangkat_tgl" id="rencana_berangkat_tgl">
                                </div>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control" name="rencana_berangkat_jam">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_pemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon" value="<?= old('nama_pemohon') ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-end">
                        <div class="col-sm-12 text-end">
                            <a href="<?= base_url('/sprkeberangkatan') ?>" class="btn btn-secondary waves-effect me-2">Batal</a>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="bx bx-save font-size-16 align-middle me-2"></i> Simpan SPR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#id_kapal').change(function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "<?= base_url('sprkeberangkatan/get_kapal_details') ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#pemilik').val(data.pemilik);
                        $('#tanda_selar').val(data.tanda_selar);
                        $('#panjang').val(data.panjang);
                        $('#gt').val(data.gt);
                    }
                });
            } else {
                $('#pemilik, #tanda_selar, #panjang, #gt').val('');
            }
        });
    });
</script>

<?= $this->endSection() ?>

<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Approval SPR Keberangkatan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/sprapprove') ?>">Approval</a></li>
                    <li class="breadcrumb-item active">Detail SPR</li>
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
                <h4 class="card-title">Persetujuan Rencana (SPR) Keberangkatan</h4>
                <p class="card-title-desc">Silakan tinjau data rencana keberangkatan kapal di bawah ini sebelum memberikan persetujuan.</p>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('sprkeberangkatan/approved/' . $spr['id_spr']) ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Data Kapal & Nakhoda</h5>
                            
                            <div class="row mb-3">
                                <label for="id_kapal" class="col-sm-4 col-form-label">Nama Kapal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['id_kapal'] ?>" id="id_kapal_text" readonly>
                                    <input type="hidden" id="id_kapal" value="<?= $spr['id_kapal'] ?>">
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
                                    <input type="text" class="form-control bg-light" value="<?= $spr['nama_nakhoda'] ?>" readonly>
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
                                    <input type="text" class="form-control bg-light" value="<?= $spr['merk_kekuatan_mesin'] ?>" readonly>
                                </div>
                            </div>

                            <h5 class="font-size-14 mb-4 mt-5"><i class="mdi mdi-arrow-right text-primary me-1"></i> Muatan</h5>
                            <div class="row mb-3">
                                <label for="muatan_bbm" class="col-sm-4 col-form-label">BBM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['muatan_bbm'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="muatan_air" class="col-sm-4 col-form-label">AIR</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['muatan_air'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="muatan_es" class="col-sm-4 col-form-label">ES</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['muatan_es'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-6">
                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Check Point & Fisik</h5>
                            
                            <div class="border p-3 rounded mb-4 bg-light">
                                <h6 class="mb-3 text-muted">Check Point</h6>
                                <div class="row mb-2">
                                    <label class="col-sm-5 col-form-label text-truncate">Tgl Masuk / STBL Kedatangan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkpoint_tgl_masuk'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkpoint_no_stbl_kedatangan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-sm-5 col-form-label text-truncate">Tgl Keluar / STBL Kapal Keluar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkpoint_tgl_keluar'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkpoint_no_stbl_keluar'] ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-4 bg-light">
                                <h6 class="mb-3 text-muted">Check Fisik Keberangkatan</h6>
                                <div class="row mb-2">
                                    <label class="col-sm-5 col-form-label text-truncate">Tgl Masuk / STBL Kedatangan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkfisik_tgl_masuk'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkfisik_no_stbl_kedatangan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-sm-5 col-form-label text-truncate">Tgl Keluar / STBL Kapal Keluar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkfisik_tgl_keluar'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm bg-white" value="<?= $spr['checkfisik_no_stbl_keluar'] ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kegiatan" class="col-sm-4 col-form-label">Kegiatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['kegiatan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rencana_berangkat_tgl" class="col-sm-4 col-form-label">Rencana Keberangkatan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['rencana_berangkat_tgl'] ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['rencana_berangkat_jam'] ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_pemohon" class="col-sm-4 col-form-label">Nama Pemohon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" value="<?= $spr['nama_pemohon'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-end">
                        <div class="col-sm-12 text-end">
                            <a href="<?= base_url('/sprapprove') ?>" class="btn btn-secondary waves-effect me-2">Batal</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="bx bx-check-circle font-size-16 align-middle me-2"></i> Setujui SPR
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
        function fetchShipDetails(id) {
            if (id) {
                $.ajax({
                    url: "<?= base_url('sprkeberangkatan/get_kapal_details') ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#id_kapal_text').val(data.nama_kapal);
                        $('#pemilik').val(data.pemilik);
                        $('#tanda_selar').val(data.tanda_selar);
                        $('#panjang').val(data.panjang);
                        $('#gt').val(data.gt);
                    }
                });
            } else {
                $('#id_kapal_text, #pemilik, #tanda_selar, #panjang, #gt').val('');
            }
        }

        // Initial fetch
        fetchShipDetails($('#id_kapal').val());
    });
</script>

<?= $this->endSection() ?>

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
                    <li class="breadcrumb-item active">Approve Keberangkatan</li>
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
                <h4 class="card-title">Approve Data Keberangkatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk approve data keberangkatan.</p>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <form action="<?= base_url('keberangkatan/approved/' . $keberangkatan['id_keberangkatan']) ?>" method="post">
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
                                    <label for="asal" class="col-sm-3 col-form-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $keberangkatan['tujuan'] ?>">
                                        <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="asal" class="col-sm-3 col-form-label">Jumlah ABK</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="abk" name="abk" value="<?= $keberangkatan['abk'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $keberangkatan['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="jam" class="col-sm-3 col-form-label">Jam</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam" name="jam" value="<?= $keberangkatan['jam'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="dermaga" id="dermaga" data-trigger>
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
                                        <select class="form-control" name="status" id="status" data-trigger>
                                            <option value="">- Pilih Status -</option>
                                            <option value="Sesuai Jadwal" <?= ($keberangkatan['status'] == "Sesuai Jadwal" ? "selected" : ""); ?>>Sesuai Jadwal</option>
                                            <option value="Pembatalan" <?= ($keberangkatan['status'] == "Pembatalan" ? "selected" : ""); ?>>Pembatalan</option>
                                            <option value="Terlambat" <?= ($keberangkatan['status'] == "Terlambat" ? "selected" : ""); ?>>Terlambat</option>
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
                                                <input type="number" class="form-control" id="es" name="es" value="<?= $keberangkatan['es'] ?>">
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
                                                <input type="number" class="form-control" id="air" name="air" value="<?= $keberangkatan['air'] ?>">
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
                                                <input type="number" class="form-control" id="solar" name="solar" value="<?= $keberangkatan['solar'] ?>">
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
                                                <input type="number" class="form-control" id="oli" name="oli" value="<?= $keberangkatan['oli'] ?>">
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
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Bensin</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="bensin" name="bensin" value="<?= $keberangkatan['bensin'] ?>">
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
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Lain-lain</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="lainnya" name="lainnya" value="<?= $keberangkatan['lainnya'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row mb-4">
                                        <label for="tipe-kapal" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keberangkatan['keterangan'] ?>">
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
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="bx bx-save font-size-16 align-middle me-2"></i> Approved
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
<?= $this->endSection() ?>
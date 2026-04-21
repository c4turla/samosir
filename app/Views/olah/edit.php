<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/olahgerak') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item active">Edit Olah Gerak</li>
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
                <h4 class="card-title">Edit Data Olah Gerak</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengubah data olah gerak.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <form action="<?= base_url('olahgerak/update/' . $olahgerak['id_olah_gerak']) ?>" method="post">
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
                                                <?php if ($val->id === $olahgerak['id_kapal']) : ?>
                                                    <?php echo "<option value='" . $val->id . "' selected>" . $val->nama_kapal . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id . "'>" . $val->nama_kapal . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $olahgerak['tanggal'] ?>" readonly>
                                        <input type="hidden" id="id_kedatangan" name="id_kedatangan" value="<?= $olahgerak['id_kedatangan'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="jam" class="col-sm-3 col-form-label">Jam</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam" name="jam" value="<?= $olahgerak['jam'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga Asal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="asal" id="asal" data-trigger disabled>
                                            <option value="">- Pilih Dermaga -</option>
                                            <?php foreach ($tangkahan as $val) { ?>
                                                <?php if ($val->id_tangkahan === $olahgerak['asal_dermaga']) : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "' selected>" . $val->nama . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "'>" . $val->nama . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga Tujuan</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="dermaga" id="dermaga" data-trigger>
                                            <option value="">- Pilih Dermaga -</option>
                                            <?php foreach ($tangkahan as $val) { ?>
                                                <?php if ($val->id_tangkahan === $olahgerak['dermaga']) : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "' selected>" . $val->nama . "</option>"; ?>
                                                <?php else : ?>
                                                    <?php echo "<option value='" . $val->id_tangkahan . "'>" . $val->nama . "</option>"; ?>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="status" class="col-sm-3 col-form-label">Status Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="status" id="status" data-trigger>
                                            <option value="">- Pilih Status -</option>
                                            <option value="TAMBAT" <?= ($olahgerak['status'] == "TAMBAT" ? "selected" : ""); ?>>TAMBAT</option>
                                            <option value="LABUH" <?= ($olahgerak['status'] == "LABUH" ? "selected" : ""); ?>>LABUH</option>
                                            <option value="BONGKAR" <?= ($olahgerak['status'] == "BONGKAR" ? "selected" : ""); ?>>BONGKAR</option>
                                            <option value="PERBAIKAN" <?= ($olahgerak['status'] == "PERBAIKAN" ? "selected" : ""); ?>>PERBAIKAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-12">

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-save font-size-16 align-middle me-2"></i> Simpan
                                    </button>

                                    <a class="btn btn-danger waves-effect waves-light" href="<?= base_url('/olahgerak') ?>">
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
<?= $this->endSection() ?>
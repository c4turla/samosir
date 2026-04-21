<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/tangkahan') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Upload Surat</li>
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
                <h4 class="card-title">Edit Upload Surat</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengedit data SPR Keberangkatan Kapal.</p>
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

                            <form action="<?= base_url('uploadsurat/update/' . $uploadsurat['id_upload']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="id_kapal" id="id_kapal" data-trigger>
                                        <option value="">- Pilih Kapal -</option>
                                             <?php foreach ($kapal as $val) { ?>
                                                <?php if ($val->id === $uploadsurat['id_kapal']) : ?>
                                                     <?php echo "<option value='" . $val->id . "' selected>" . $val->nama_kapal . "</option>"; ?>
                                                        <?php else : ?>
                                                        <?php echo "<option value='" . $val->id . "'>" . $val->nama_kapal . "</option>"; ?>
                                                    <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $uploadsurat['tanggal_masuk'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?= $uploadsurat['tanggal_keluar'] ?>">
                                        <input type="hidden" id="upload_by" name="upload_by" value="<?= session()->get('name'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="jarak" class="col-sm-3 col-form-label">File Surat</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" id="path_file" name="path_file" accept="application/pdf">
                                        <input type="hidden" name="old_path_file" value="<?= $uploadsurat['path_file']; ?>">
                                        <?php if (!empty($uploadsurat['path_file'])): ?>
                                            <small>File saat ini: <a href="<?= base_url('images/users/surat/' . $uploadsurat['path_file']) ?>" target="_blank">Lihat File</a></small>
                                        <?php endif; ?>
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
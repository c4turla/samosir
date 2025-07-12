<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/peralatan') ?>">Jasa</a></li>
                    <li class="breadcrumb-item active">Tambah Jasa Peralatan</li>
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
                <h4 class="card-title">Tambah Jasa Peralatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data Jasa Pemakaian Peralatan.</p>
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

                            <form action="<?= base_url('ikan/store') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= old('no_surat'); ?>">
                                    </div>
                                </div>
                                                   <div class="row mb-4">
                                                        <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Penyewa</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="id_kapal" id="id_kapal" data-trigger>
                                                                <option value="">- Pilih Kapal -</option>
                                                                <?php foreach ($kapal as $row) : ?>
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kapal; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Order</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                                    </div>
                                </div>
                                <div class="card-header">
                                                <h4 class="card-title">Jasa Peralatan</h4>
                                            </div>
                                            </hr>
                                            <table class="ml-10 mt-4" style="width: 100%;">
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Keranjang Plastik</label>
                                                            <div class="col-sm-8">
                                                               <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan1" name="berat_ikan1">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan2" id="jenis_ikan2" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan2" name="berat_ikan2">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan3" id="jenis_ikan3" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan3" name="berat_ikan3">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan4" id="jenis_ikan4" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan4" name="berat_ikan4">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan5" id="jenis_ikan5" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan5" name="berat_ikan5">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan6" id="jenis_ikan6" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan6" name="berat_ikan6">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </table>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Keranjang Plastik</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
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
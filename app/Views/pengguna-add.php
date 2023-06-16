<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Administrator</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/setting') ?>">Setting</a></li>
                    <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                <h4 class="card-title">Tambah Data Pengguna</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data pengguna.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-6 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('user/store') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="confpassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="confpassword" name="confpassword" value="<?= old('confpassword'); ?>">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="role">
                                            <option>-Pilih Role-</option>
                                            <option value=1>Administrator</option>
                                            <option value=3>Syahbandar</option>
                                            <option value=2>Operator</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <div class="row mb-4">
                                <label for="hp" class="col-sm-3 col-form-label">No HP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hp" name="hp">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                            <div class="row mb-4">
                            <label for="alamat" class="col-sm-3 col-form-label">Preview</label>
                            <div class="col-sm-6">
                                <img id="blah" class="rounded avatar-xl" alt="400x400" src="<?= base_url() . "/assets/images/users/default.png"?>" data-holder-rendered="true">
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
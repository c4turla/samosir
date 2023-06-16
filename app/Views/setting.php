<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<?= $page_title ?>
<!-- end page title -->

<div class="row align-items-center">
    <div class="col-md-6">
        <div class="mb-3">
            <h5 class="card-title">Data Pengguna</h5>
        </div>
    </div>

    <div class="col-md-6">
        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="setting" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="<?= base_url('tambah-pengguna') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Pengguna</a>
            </div>
        </div>
        <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('message'); ?>"></div>
    </div>
</div>
<!-- end row -->


<div class="table-responsive mb-4">
    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
        <thead>
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check font-size-16">
                        <input type="checkbox" class="form-check-input" id="checkAll">
                        <label class="form-check-label" for="checkAll"></label>
                    </div>
                </th>
                <th scope="col">Name</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Email</th>
                <th scope="col">HP</th>
                <th scope="col">Alamat</th>
                <th style="width: 80px; min-width: 80px;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($user as $key => $user) {
            ?>
                <tr>
                    <th scope="row">
                        <div class="form-check font-size-16">
                            <input type="checkbox" class="form-check-input" id="contacusercheck1">
                            <label class="form-check-label" for="contacusercheck1"></label>
                        </div>
                    </th>
                    <td><img src="<?= base_url() . "/images/users/" . $user['photo']; ?>" alt="" class="avatar-sm rounded-circle me-2">
                        <a href="#" class="text-body"><?= $user['name'] ?></a>
                    </td>
                    <td><?= $user['jabatan'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['hp'] ?></td>                    
                    <td><?= $user['alamat'] ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?= base_url("user/edit"); ?>/<?= $user['id'] ?>">Edit</a></li>
                                <li><a class="dropdown-item tombol-hapus" href="<?= base_url("user/delete"); ?>/<?= $user['id'] ?>">Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                <?php  }  ?>
                </tr>
        </tbody>
    </table>
    <!-- end table -->
</div>
<!-- end table responsive -->
</div>
<!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end row -->
<?= $this->endSection() ?>
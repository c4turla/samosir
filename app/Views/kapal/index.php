<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                    <li class="breadcrumb-item active">Kapal</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-4">
                            <h5 class="card-title">List Data Kapal</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="<?= base_url('kapal/tambah') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Kapal</a>
                            </div>

                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('message'); ?>"></div>
                </div>
                <!-- end row -->

                <div class="table-responsive">
                    <table id="tabelkapal" class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th style="width: 30px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th style="width: 120px;">Nama Kapal</th>
                                <th>Pemilik</th>
                                <th>GT</th>
                                <th>Tipe Kapal</th>
                                <th>Tgl Akhir SIPI</th>
                                <th>Status SIPI</th>
                                <th style="width: 150px;">Panjang</th>
                                <th style="width: 90px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- end table responsive -->
                <div class="modal fade qr" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Download QR Code</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Cras mattis consectetur purus sit amet fermentum.
                                    Cras justo odio, dapibus ac facilisis in,
                                    egestas eget quam. Morbi leo risus, porta ac
                                    consectetur ac, vestibulum at eros.</p>
                                <p>Praesent commodo cursus magna, vel scelerisque
                                    nisl consectetur et. Vivamus sagittis lacus vel
                                    augue laoreet rutrum faucibus dolor auctor.</p>
                                <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                    Praesent commodo cursus magna, vel scelerisque
                                    nisl consectetur et. Donec sed odio dui. Donec
                                    ullamcorper nulla non metus auctor
                                    fringilla.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Download QR</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<script type="text/javascript">
    //Hapus Data
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data ini akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ab57d",
            cancelButtonColor: "#fd625e",
            confirmButtonText: "Ya, Hapus Data!"
        }).then((result) => {
            if (result.value) {
                window.location.href = urlToRedirect;
            }
        })
    };

    $(document).ready(function() {
        $('#tabelkapal').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo site_url('datakapal') ?>",
            columnDefs: [{
                    targets: -1,
                    orderable: false
                }, //target -1 means last column
            ],
        });
    });
</script>
<?= $this->endSection() ?>
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
                    <li class="breadcrumb-item active">Upload Surat</li>
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
                            <h5 class="card-title">List Upload Surat Pemberitahuan Rencana Keberangkatan Kapal</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="<?= base_url('uploadsurat-add') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Upload Surat</a>
                            </div>

                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('message'); ?>"></div>
                </div>
                <!-- end row -->

                <div class="table-responsive">
                    <table id="uploadsurat" class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th style="width: 30px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th style="width: 120px;">Nama Kapal</th>
                                <th style="width: 120px;">Tanggal Masuk</th>
                                <th style="width: 120px;">Tanggal Keluar</th>
                                <th style="width: 220px;">File Surat</th>                                
                                <th style="width: 90px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                </div>
                <!-- end table responsive -->
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
        $('#uploadsurat').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo site_url('dataupload') ?>",
            columnDefs: [{
                    targets: -1,
                    orderable: false
                }, //target -1 means last column
            ],
        });
    });
  </script>
<?= $this->endSection() ?>
<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/air') ?>">Jasa</a></li>
                    <li class="breadcrumb-item active">Proses Jasa Air</li>
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
                <h4 class="card-title">Proses Perhitungan Jasa Air Tawar</h4>
                <p class="card-title-desc">Gunakan Form ini untuk proses perhitungan Jasa Air Tawar.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri
                            Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('jasaair/prosesbayar/' . $jasaAir['id_air']) ?>" method="post"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_order" name="no_order"
                                            value="<?= $jasaAir['no_order']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_kapal" name="nama_kapal"
                                            value="<?= $jasaAir['nama_kapal']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Permintaan</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal_permintaan"
                                            name="tanggal_permintaan" value="<?= $jasaAir['tanggal_permintaan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Pelayanan</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal_pelayanan"
                                            name="tanggal_pelayanan" value="<?= $jasaAir['tanggal_pelayanan']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="volume" class="col-sm-3 col-form-label">Volume (M3)</label>
                                    <div class="col-sm-2">
                                        <div class="input-group">

                                            <input type="number" class="form-control" id="volume" name="volume"
                                                value="<?= $jasaAir['volume']; ?>">
                                            <div class="input-group-text">M3</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga /M3</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="input" class="form-control" id="harga" name="harga"
                                                value="<?= $jasaAir['harga']; ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="jumlah_pembayaran" class="col-sm-3 col-form-label">Jumlah
                                        Pembayaran</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="text" class="form-control" id="jumlah_pembayaran"
                                                name="jumlah_pembayaran" value="<?= $jasaAir['jumlah_pembayaran']; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pelaksana_lapangan" class="col-sm-3 col-form-label">Petugas
                                        Pelayanan</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="pelaksana_lapangan"
                                            name="pelaksana_lapangan" value="<?= $jasaAir['pelaksana_lapangan']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pemohon" class="col-sm-3 col-form-label">Pemakai Jasa
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="pemohon" name="pemohon"
                                            value="<?= $jasaAir['pemohon']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="bendahara" class="col-sm-3 col-form-label">Bendahara PNBP
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="bendahara" name="bendahara"
                                            value="<?= $jasaAir['bendahara']; ?>">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const volumeInput = document.getElementById('volume');
    const hargaInput = document.getElementById('harga');
    const jumlahPembayaranInput = document.getElementById('jumlah_pembayaran');

    function hitungJumlahPembayaran() {
        const volume = parseFloat(volumeInput.value) || 0;
        const harga = parseFloat(hargaInput.value) || 0;
        const jumlah = volume * harga;
        jumlahPembayaranInput.value = jumlah.toFixed(2); // hasil format desimal dua angka
    }

    // Event listener saat nilai berubah
    volumeInput.addEventListener('input', hitungJumlahPembayaran);
    hargaInput.addEventListener('input', hitungJumlahPembayaran);
});
</script>

<?= $this->endSection() ?>
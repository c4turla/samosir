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
                    <li class="breadcrumb-item active">Bayar Jasa Pemakaian</li>
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
                <h4 class="card-title">Bayar Jasa Pemakaian Peralatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk proses pembayaran Jasa Pemakaian Peralatan.</p>
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
                            <form action="<?= base_url('jasaperalatan/prosesbayar/' . $jasaPeralatan['id_jasa']) ?>"
                                method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_order" name="no_order"
                                            value="<?= $jasaPeralatan['no_order'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Penyewa</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa"
                                            value="<?= $jasaPeralatan['nama_penyewa'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Order</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                                            value="<?= $jasaPeralatan['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Jam Mulai</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                            value="<?= $jasaPeralatan['jam_mulai'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Jam Selesai</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                            value="<?= $jasaPeralatan['jam_selesai'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Durasi</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="durasi" name="durasi"  readonly>
                                    </div> 
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Pemakaian Peralatan</h4>
                                </div>
                                </hr>
                                <div class="row g-0 mb-4 mt-4 align-items-center">
                                    <label for="keranjang_plastik" class="col-sm-2 col-form-label">Keranjang
                                        Plastik</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="keranjang_plastik"
                                            name="keranjang_plastik" value="<?= $jasaPeralatan['keranjang_plastik']; ?>">
                                    </div>
                                    <label for="by_keranjang_plastik"
                                        class="col-sm-2 col-form-label ps-4">Biaya Pemakaian</label>
                                    <!-- Tambah padding kiri -->
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="by_keranjang_plastik"
                                            name="by_keranjang_plastik" value="<?= $jasaPeralatan['by_keranjang_plastik']; ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="meja_sortir" class="col-sm-2 col-form-label">Meja Sortir</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="meja_sortir" name="meja_sortir"
                                            value="<?= $jasaPeralatan['meja_sortir']; ?>">
                                    </div>
                                    <label for="by_meja_sortir" class="col-sm-2 col-form-label ps-4">Biaya Pemakaian</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="by_meja_sortir"
                                            name="by_meja_sortir" value="<?= $jasaPeralatan['by_meja_sortir']; ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="gerobak" class="col-sm-2 col-form-label">Gerobak</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="gerobak" name="gerobak"
                                            value="<?= $jasaPeralatan['gerobak']; ?>">
                                    </div>
                                    <label for="by_gerobak" class="col-sm-2 col-form-label ps-4">Biaya Pemakaian</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="by_gerobak" name="by_gerobak"
                                            value="<?= $jasaPeralatan['by_gerobak']; ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="timbangan" class="col-sm-2 col-form-label">Timbangan</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="timbangan" name="timbangan"
                                            value="<?= $jasaPeralatan['timbangan']; ?>">
                                    </div>
                                    <label for="by_timbangan" class="col-sm-2 col-form-label ps-4">Biaya Pemakaian</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="by_timbangan" name="by_timbangan"
                                            value="<?= $jasaPeralatan['by_timbangan']; ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="ice_cruiser" class="col-sm-2 col-form-label">Ice Cruiser</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="ice_cruiser" name="ice_cruiser"
                                            value="<?= $jasaPeralatan['ice_cruiser']; ?>">
                                    </div>
                                    <label for="by_ice_cruiser" class="col-sm-2 col-form-label ps-4">Biaya Pemakaian</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="by_ice_cruiser"
                                            name="by_ice_cruiser" value="<?= $jasaPeralatan['by_ice_cruiser']; ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="ice_cruiser" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-2">
                                    </div>
                                    <label for="total" class="col-sm-2 col-form-label ps-4">Total</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="total"
                                            name="total" value="<?= $jasaPeralatan['total']; ?>">
                                    </div>
                                </div>
                                </hr>
                                <div class="row mb-4">
                                    <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="petugas" name="petugas"
                                            value="<?= $jasaPeralatan['petugas']; ?>">
                                    </div>
                                </div>
                                 <div class="row mb-4">
                                    <label for="bendahara" class="col-sm-2 col-form-label">Bendahara</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="bendahara" name="bendahara" required
                                            value="<?= $jasaPeralatan['bendahara']; ?>">
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-12">

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle me-2"></i> Bayar
                                </button>
                                <a href="<?= base_url('peralatan') ?>" class="btn btn-danger"><i class="bx bx-arrow-back me-1"></i> Kembali</a>

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
document.addEventListener('DOMContentLoaded', function () {
    const alatLain = {
        ice_cruiser: 100 // Harga per unit (bukan per jam)
    };
    // Harga per jam untuk masing-masing alat
    const hargaPerJamAlat = {
        keranjang_plastik: 500,
        meja_sortir: 1000,
        gerobak: 500,
        timbangan: 3000
    };

    function hitungBiaya(jumlah, durasi, hargaPerJam) {
        return jumlah * durasi * hargaPerJam;
    }

    function getDurasiJam(jamMulai, jamSelesai) {
        const [h1, m1] = jamMulai.split(':').map(Number);
        const [h2, m2] = jamSelesai.split(':').map(Number);

        const mulai = new Date(0, 0, 0, h1, m1);
        const selesai = new Date(0, 0, 0, h2, m2);

        const durasi = (selesai - mulai) / (1000 * 60 * 60); // konversi ke jam
        return durasi > 0 ? durasi : 0;
    }

function updateBiaya() {
    const jamMulai = document.getElementById('jam_mulai').value;
    const jamSelesai = document.getElementById('jam_selesai').value;

    if (!jamMulai || !jamSelesai) return;

    const durasi = getDurasiJam(jamMulai, jamSelesai);

    const jam = Math.floor(durasi);
    const menit = Math.round((durasi - jam) * 60);
    const durasiFormatted = String(jam).padStart(2, '0') + ':' + String(menit).padStart(2, '0');
    document.getElementById('durasi').value = durasiFormatted;

    let total = 0;

    // Peralatan yang dihitung per jam
    Object.keys(hargaPerJamAlat).forEach(alat => {
        const jumlahInput = document.getElementById(alat);
        const biayaInput = document.getElementById(`by_${alat}`);

        const jumlah = parseInt(jumlahInput.value) || 0;
        const harga = hargaPerJamAlat[alat];

        const biaya = hitungBiaya(jumlah, durasi, harga);
        biayaInput.value = biaya;

        total += biaya;
    });

    // Alat lain yang harga per unit (misal: ice_cruiser)
    Object.keys(alatLain).forEach(alat => {
        const jumlahInput = document.getElementById(alat);
        const biayaInput = document.getElementById(`by_${alat}`);

        const jumlah = parseInt(jumlahInput.value) || 0;
        const harga = alatLain[alat];

        const biaya = jumlah * harga;
        biayaInput.value = biaya;

        total += biaya;
    });

    document.getElementById('total').value = total;
}

    // Event listener perubahan jam
    document.getElementById('jam_mulai').addEventListener('change', updateBiaya);
    document.getElementById('jam_selesai').addEventListener('change', updateBiaya);

    // Event listener perubahan jumlah peralatan
    Object.keys(hargaPerJamAlat).forEach(alat => {
        document.getElementById(alat).addEventListener('input', updateBiaya);
    });
    // Event listener untuk alat non-jam
    Object.keys(alatLain).forEach(alat => {
        document.getElementById(alat).addEventListener('input', updateBiaya);
    });
});
</script>

<?= $this->endSection() ?>
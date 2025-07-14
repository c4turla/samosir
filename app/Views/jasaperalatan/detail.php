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
                    <li class="breadcrumb-item active">Detail Jasa Pemakaian</li>
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
                <h4 class="card-title">Detail Jasa Pemakaian Peralatan</h4>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">
                            <!-- Info Umum -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">No. Order</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="<?= $jasaPeralatan['no_order'] ?>"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Kapal / Penyewa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                        value="<?= $jasaPeralatan['nama_penyewa'] ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tanggal & Jam Mulai</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" value="<?= $jasaPeralatan['tanggal'] ?>"
                                        readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" value="<?= $jasaPeralatan['jam_mulai'] ?>"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tanggal & Jam Selesai</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control"
                                        value="<?= $jasaPeralatan['tanggal'] ?>" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" value="<?= $jasaPeralatan['jam_selesai'] ?>"
                                        readonly>
                                </div>
                            </div>

                            <!-- TABEL DETAIL PERHITUNGAN -->
                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peralatan</th>
                                            <th>Jumlah</th>
                                            <th>Biaya Pemakaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Keranjang Plastik</td>
                                            <td><?= $jasaPeralatan['keranjang_plastik'] ?> Unit</td>
                                            <td><?= number_format($jasaPeralatan['by_keranjang_plastik'], 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Meja Sortir</td>
                                            <td><?= $jasaPeralatan['meja_sortir'] ?> Unit</td>
                                            <td><?= number_format($jasaPeralatan['by_meja_sortir'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Gerobak</td>
                                            <td><?= $jasaPeralatan['gerobak'] ?> Unit</td>
                                            <td><?= number_format($jasaPeralatan['by_gerobak'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Timbangan</td>
                                            <td><?= $jasaPeralatan['timbangan'] ?> Unit</td>
                                            <td><?= number_format($jasaPeralatan['by_timbangan'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Ice Cruiser</td>
                                            <td><?= $jasaPeralatan['ice_cruiser'] ?> Unit</td>
                                            <td><?= number_format($jasaPeralatan['by_ice_cruiser'], 0, ',', '.') ?></td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td><strong><?= number_format($jasaPeralatan['total'], 0, ',', '.') ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Petugas -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Petugas</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $jasaPeralatan['petugas'] ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bendahara</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $jasaPeralatan['bendahara'] ?>"
                                        readonly>
                                </div>
                            </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-12">

                            <div class="d-flex flex-wrap gap-2">
                                <a href="<?= base_url('peralatan') ?>" class="btn btn-success"><i
                                        class="bx bx-arrow-back me-1"></i> Kembali</a>

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
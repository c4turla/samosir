<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
<div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pertanyaan Umum (FAQ) Aplikasi SAMOSIR PPN Sibolga</h4>
                                        <p class="card-title-desc">Click the accordions below to expand/collapse the accordion content.</p>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Apa itu Aplikasi SAMOSIR PPN Sibolga?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            <strong class="text-dark">APLIKASI SAMOSIR</strong> adalah Sistem Informasi dan Monitoring Aktivitas Kapal Perikanan yang dikembangkan untuk membantu Pelabuhan Perikanan Nusantara (PPN) Sibolga dalam memantau dan mengelola aktivitas kapal perikanan, mulai dari kedatangan, penimbangan ikan, olah gerak, perhitungan jasa, hingga keberangkatan kapal.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Bagaimana cara mengakses aplikasi SAMOSIR?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            Aplikasi ini dapat diakses melalui browser web baik di mobile maupun di desktop di alamat <a href="https://ppnsibolga.com">https://ppnsibolga.com </a>.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Bagaimana cara membuat akun baru?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            Jika Anda adalah pengguna baru dan belum memiliki akun, silakan hubungi administrator PPN Sibolga untuk proses pendaftaran akun dan aktivasi akses Anda.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                    Fitur apa saja yang tersedia di aplikasi SAMOSIR?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            Aplikasi SAMOSIR menyediakan berbagai fitur, termasuk: </br>
                                                            * Dashboard: Ringkasan aktivitas kapal. </br>
                                                            * Posisi Kapal: Informasi tentang posisi kapal.</br>
                                                            * Data Master: Pengelolaan data kapal, jenis ikan, dermaga, dan pengurus. </br>
                                                            * Jadwal: Informasi jadwal kedatangan kapal, penimbangan ikan, olah gerak, dan keberangkatan kapal. </br>
                                                            * Upload SPR Keberangkatan: Mengunggah Surat Persetujuan Berlayar (SPR).</br>
                                                            * Laporan: Berbagai jenis laporan terkait data kapal, kedatangan, keberangkatan, data per jenis ikan, data per GT kapal, dan data per alat tangkap.
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                    Siapa yang harus saya hubungi jika saya mengalami masalah teknis atau pertanyaan lain?
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="text-muted">
                                                            ika Anda mengalami masalah teknis, menemukan bug, atau memiliki pertanyaan lain mengenai penggunaan aplikasi, silakan hubungi tim pengembang Aplikasi SAMOSIR PPN Sibolga 
                                                            melalui kontak melalui email : <a href="mailto:admin@kendariweb.com">admin@kendariweb.com</a> atau melalui website <a href="https://kendariweb.com">https://kendariweb.com</a>
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end accordion -->
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
</div>
</div>
<?= $this->endSection() ?>
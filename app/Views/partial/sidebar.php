<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="<?= base_url('/dashboard') ?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?= lang('Files.Dashboard') ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('/posisi') ?>">
                        <i data-feather="map"></i>
                        <span data-key="t-maps">Posisi Kapal</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps"><?= lang('Files.Data') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('/kapal') ?>"><span data-key="t-kapal"><?= lang('Files.Kapal') ?></span>
                            </a>
                        </li>        
                        <li>
                            <a href="<?= base_url('/ikan') ?>">
                                <span data-key="t-ikan">Jenis Ikan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/tangkahan') ?>">
                                <span data-key="t-tangkahan">Dermaga</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('/pengguna') ?>">
                                <span data-key="t-pengguna">Pengurus</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-authentication"><?= lang('Files.Jadwal') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('/kedatangan') ?>" data-key="t-kedatangan"><?= lang('Files.Kedatangan_Kapal') ?></a></li>
                        <?php if (session()->get('role') == '3') { ?>
                        <li><a href="<?= base_url('/approvebongkar') ?>" data-key="t-bongkar">Penimbangan Ikan</a></li>
                        <?php }else{ ?> 
                        <li><a href="<?= base_url('/bongkar') ?>" data-key="t-bongkar">Penimbangan Ikan</a></li>
                        <?php } ?>
                        <li><a href="<?= base_url('/olahgerak') ?>" data-key="t-olahgerak">Olah Gerak</a></li>
                        <li><a href="<?= base_url('/uploadsurat') ?>" data-key="t-uploadsurat">Upload SPR Keberangkatan</a></li>
                        <?php if (session()->get('role') == '3') { ?>
                        <li><a href="<?= base_url('/keberangkatanapprove') ?>" data-key="t-keberangkatan"><?= lang('Files.Keberangkatan_Kapal') ?></a></li>
                        <?php }else{ ?> 
                        <li><a href="<?= base_url('/keberangkatan') ?>" data-key="t-keberangkatan"><?= lang('Files.Keberangkatan_Kapal') ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="archive"></i>
                        <span data-key="t-jasa"><?= lang('Files.Jasa') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('/peralatan') ?>" data-key="t-kedatangan"><?= lang('Files.Peralatan') ?></a></li>
                        <li><a href="<?= base_url('/air') ?>" data-key="t-air"><?= lang('Files.Air') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages"><?= lang('Files.Laporan') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('/lap-kapal') ?>" data-key="t-starter-page">Data Kapal</a></li>
                        <li><a href="<?= base_url('/lap-kedatangan') ?>" data-key="t-maintenance">Data Kedatangan</a></li>
                        <li><a href="<?= base_url('/lap-keberangkatan') ?>" data-key="t-coming-soon">Data Keberangkatan</a></li>
                        <li><a href="<?= base_url('/lap-jenisikan') ?>" data-key="t-coming-soon">Data Per Jenis Ikan</a></li>
                        <li><a href="<?= base_url('/lap-gt') ?>" data-key="t-coming-soon">Data Per GT Kapal</a></li>
                        <li><a href="<?= base_url('/lap-alattangkap') ?>" data-key="t-coming-soon">Data Per Alat Tangkap</a></li>
                    </ul>
                </li>
                <?php if (session()->get('role') == '1') { ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-gear">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('/setting') ?>">
                                <span data-key="t-calendar">Data Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?> 
                <li>
                    <a href="<?= base_url('/faq') ?>">
                        <i data-feather="book"></i>
                        <span data-key="t-faq">FAQ</span>
                    </a>
                </li>       
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
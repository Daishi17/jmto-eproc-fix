<main class="container-fluid">
    <input type="hidden" name="url_cek_dokumen_hps" value="<?= base_url('file_paket/') ?>">
    <input type="hidden" name="url_by_id_rup" value="<?= base_url('panitia/daftar_paket/daftar_paket/by_id_rup/') ?>">
    <input type="hidden" name="url_download_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_download_syarat_tambahan') ?>">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-color2">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-circle-info"></i>
                            <small><strong>FORM PENILAIAN KINERJA VENDOR</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark ">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - FORM PENILAIAN KINERJA VENDOR</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <nav>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Masa Pelaksanaan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Masa Pemeliharaan</button>
                            </li>
                        </ul>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <br>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="penilaian_1-tab" data-bs-toggle="tab" data-bs-target="#penilaian_1" type="button" role="tab" aria-controls="penilaian_1" aria-selected="true">Penilaian Satgas / Area Manager</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_2-tab" data-bs-toggle="tab" data-bs-target="#penilaian_2" type="button" role="tab" aria-controls="penilaian_2" aria-selected="false">Penilaian Manager / Section Head</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_3-tab" data-bs-toggle="tab" data-bs-target="#penilaian_3" type="button" role="tab" aria-controls="penilaian_3" aria-selected="false">Penilaian Department Head</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_4-tab" data-bs-toggle="tab" data-bs-target="#penilaian_4" type="button" role="tab" aria-controls="penilaian_4" aria-selected="false">Rekap Penilaian Kinerja</button>
                                    </li>
                                </ul>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <?php $this->load->view('administrator/penilaian_kinerja/tab_pelaksanaan'); ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="penilaian_5-tab" data-bs-toggle="tab" data-bs-target="#penilaian_5" type="button" role="tab" aria-controls="penilaian_5" aria-selected="true">Penilaian Satgas / Area Manager</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_6-tab" data-bs-toggle="tab" data-bs-target="#penilaian_6" type="button" role="tab" aria-controls="penilaian_6" aria-selected="false">Penilaian Manager / Section Head</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_7-tab" data-bs-toggle="tab" data-bs-target="#penilaian_7" type="button" role="tab" aria-controls="penilaian_7" aria-selected="false">Penilaian Department Head</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penilaian_8-tab" data-bs-toggle="tab" data-bs-target="#penilaian_8" type="button" role="tab" aria-controls="penilaian_8" aria-selected="false">Rekap Penilaian Kinerja</button>
                                    </li>
                                </ul>
                            </ul>

                            <div class="tab-content">
                                <?php $this->load->view('administrator/penilaian_kinerja/tab_pemeliharaan'); ?>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</main>
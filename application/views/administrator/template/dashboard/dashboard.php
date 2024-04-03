<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-gauge-high px-1"></i>
                            <small><strong>Dashboard Administrator</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="card border-dark">
                        <div class="card-header border-dark bg-warning">
                            <h6 class="card-title">
                                <span class="text-dark">
                                    <i class="fa-solid fa-square-poll-horizontal px-1"></i>
                                    <small><strong>Info Grafis</strong></small>
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Rekanan Belum Tervalidasi</small></p>
                                                    <h4 class="my-1 text-danger"><?= $blm_tervalidasi ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa-solid fa-user-shield fa-beat-fade"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-info">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Rekanan Tervalidasi</small></p>
                                                    <h4 class="my-1 text-info"><?= $tervalidasi ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa-solid fa-user-tag fa-beat"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-success">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Data RUP</small></p>
                                                    <h4 class="my-1 text-success"><?= $rup ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa-solid fa-money-check fa-fade"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Paket Tender</small></p>
                                                    <h4 class="my-1 text-warning"><?= $paket_tender ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa-solid fa-briefcase fa-flip"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-info">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Paket Terder Berjalan</small></p>
                                                    <h4 class="my-1 text-info"><?= $paket_tender_berjalan ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa-solid fa-bullhorn fa-fade"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-success">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Paket Tender Selesai</small></p>
                                                    <h4 class="my-1 text-success"><?= $paket_tender_selesai ?></h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa-solid fa-envelope-circle-check fa-shake"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Penilaian Kinerja</small></p>
                                                    <h4 class="my-1 text-warning">0</h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa-solid fa-pen-to-square fa-flip"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 text-secondary"><small>Total Daftar Hitam Rekanan</small></p>
                                                    <h4 class="my-1 text-danger">0</h4>
                                                </div>
                                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa-solid fa-address-book"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-dark">
                        <div class="card-header border-dark bg-gradient-green">
                            <h6 class="card-title">
                                <span class="text-white">
                                    <i class="fa-solid fa-chart-pie px-1"></i>
                                    <small><strong>Info Grafik</strong></small>
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary border-primary">
                                            <strong class="text-white">
                                                <i class="fa-solid fa-chart-area px-1"></i>
                                                Grafik Area Rekanan Tervalidasi
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-secondary">
                                        <div class="card-header bg-secondary border-secondary">
                                            <strong class="text-white">
                                                <i class="fa-solid fa-chart-line px-1"></i>
                                                Grafik Line Paket Tender Selesai
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
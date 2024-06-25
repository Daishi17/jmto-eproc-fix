<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-info">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>File Laporan Rekapitulasi Rencana Umum Pengadaan (RUP) Tahun Anggaran <label class="tahun_anggaran"></label></strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <!-- <div class="card-header border-dark bg-info d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small class="text-white"><strong>Data Tabel - Laporan Pengadaan Vendor </strong></small>
                        </span>
                    </div>

                </div> -->

                <ul class="nav nav-pills mb-3 mt-3 ml-3" id="pills-tab" role="tablist" style="margin-left:10px">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab1-tab" data-bs-toggle="pill" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Rekap Nilai RUP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab2-tab" data-bs-toggle="pill" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Monitoring Opex-Capek</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab3-tab" data-bs-toggle="pill" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Rekap Jumlah Paket RUP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab3-tab" data-bs-toggle="pill" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab3" aria-selected="false">Rekap Jumlah Realisasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab3-tab" data-bs-toggle="pill" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab3" aria-selected="false">Rekap Perbandingan RUP</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <div class="card-body">
                            <br>
                            <center>
                                <h5>Laporan Rekapitulasi Rencana Umum Pengadaan (RUP) Tahun Anggaran <label for="" class="tahun_anggaran"></label></h5>
                                <h5>PT JASAMARGA TOLLROAD OPERATOR <label for="" class="tahun_anggaran"></label></h5>

                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" id="filter" onclick="filter_tahun_realisasi()" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table id="tbl_pengadaan_tkdn" class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja (Departemen)</th>
                                            <th>Jumlah Pengadaan (Paket)</th>
                                            <th>Nilai RUP (Rp)</th>
                                            <th>Rekapitulasi Nilai KDN <br> Unit Kerja (Rp)</th>
                                            <th>Rekapitulasi Nilai <br> TKDN Unit Kerja (%)</th>
                                        </tr>

                                    </thead>
                                    <tbody id="table_departemen">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <div class="card-body">
                            <br>
                            <center>
                                <h5>LAPORAN MONITORING OPEX-CAPEX<label for="" class="tahun_anggaran_opex_capex"></label></h5>
                                <h5>PT JASAMARGA TOLLROAD OPERATOR</h5>

                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="tahun_pengadaan_opex_capex" id="tahun_pengadaan_opex_capex" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" onclick="filter_capex_opex()" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered">
                                    <thead class="text-center" style="vertical-align: middle;">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Unit Kerja</th>
                                            <th colspan="4">Rencana Umum Pengadaan (RUP)</th>
                                            <th colspan="4">Realisasi Pengadaan</th>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Pengadaan <br>OPEX (Paket)</th>
                                            <th>Nilai RUP OPEX (Rp)</th>
                                            <th>Jumlah Pengadaan <br>CAPEX (Paket)</th>
                                            <th>Nilai RUP CAPEX <br> (Rp)</th>
                                            <th>Jumlah Pengadaan <br>OPEX (Paket)</th>
                                            <th>Nilai RUP OPEX (Rp)</th>
                                            <th>Jumlah Pengadaan <br>CAPEX (Paket)</th>
                                            <th>Nilai RUP CAPEX <br> (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_capex_opex">

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                        <div class="card-body">
                            <br>
                            <center>
                                <h5>REKAP JUMLAH PAKET RUP TAHUN <label for="" class="tahun_anggaran_jml_paket"></label></h5>
                                <h5>PT JASAMARGA TOLLROAD OPERATOR</h5>

                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="tahun_pengadaan_jml_paket" id="tahun_pengadaan_jml_paket" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" onclick="filter_jml_paket()" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">

                                <table class="table table-bordered">
                                    <thead style="vertical-align: middle; text-align:center">
                                        <tr>
                                            <th rowspan="3">No</th>
                                            <th rowspan="3">Unit Kerja (Departemen)</th>
                                            <th rowspan="3">Jumlah Total <br> Pengadaan <br> (Paket)</th>
                                            <th colspan="16">Metode Pengadaan</th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Pengadaan Langsung</th>
                                            <th colspan="4">Penunjukan Langsung</th>
                                            <th colspan="4">Tender / Seleksi Terbatas</th>
                                            <th colspan="4">Tender / Seleksi Umum</th>
                                        </tr>
                                        <tr>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_jml_paket">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab3-tab">
                        <div class="card-body">
                            <br>
                            <center>
                                <h5>REKAP JUMLAH PAKET REALISASI PENGADAAN TAHUN ANGGARAN <label for="" class="tahun_anggaran_realisasi_pengadaan"></label></h5>
                                <h5>PT JASAMARGA TOLLROAD OPERATOR</h5>

                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="tahun_pengadaan_realisasi_pengadaan" id="tahun_pengadaan_realisasi_pengadaan" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" onclick="filter_realisasi_pengadaan()" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">

                                <table class="table table-bordered">
                                    <thead style="vertical-align: middle; text-align:center">
                                        <tr>
                                            <th rowspan="3">No</th>
                                            <th rowspan="3">Unit Kerja (Departemen)</th>
                                            <th rowspan="3">Jumlah Total <br> Realisasi <br> Pengadaan</th>
                                            <th rowspan="3">Selisih <br> Realisasi <br> Pengadaan</th>
                                            <th colspan="16">Metode Pengadaan</th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Pengadaan Langsung</th>
                                            <th colspan="4">Penunjukan Langsung</th>
                                            <th colspan="4">Tender / Seleksi Terbatas</th>
                                            <th colspan="4">Tender / Seleksi Umum</th>
                                        </tr>
                                        <tr>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                            <th>TW 1</th>
                                            <th>TW 2</th>
                                            <th>TW 3</th>
                                            <th>TW 4</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_realisasi_pengadaan">

                                    </tbody>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <thead style="vertical-align: middle; text-align:center">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja (Departemen)</th>
                                            <th>Jumlah Total <br> Realisasi Pengadaan</th>
                                            <th>Jumlah Total <br> RUP</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_realisasi_pengadaan2">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab3-tab">
                        <div class="card-body">
                            <br>
                            <center>
                                <h5>PERBANDINGAN RUP DAN REALISASI PENGADAAN <label for="" class="tahun_anggaran_perbandingan_rup"></label></h5>
                                <h5>PT JASAMARGA TOLLROAD OPERATOR</h5>

                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="tahun_pengadaan_perbandingan_rup" id="tahun_pengadaan_perbandingan_rup" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" onclick="filter_perbandingan_rup()" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">

                                <br>
                                <table class="table table-bordered">
                                    <thead style="vertical-align: middle; text-align:center">
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja (Departemen)</th>
                                            <th>Jumlah Total <br> Realisasi Pengadaan</th>
                                            <th>Jumlah Total <br> RUP</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_perbandingan_rup2">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
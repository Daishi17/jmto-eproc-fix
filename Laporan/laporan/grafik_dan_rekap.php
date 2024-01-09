<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>File Grafik Dan Total Pengadaan</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>Data Tabel - Total Pengadaan</strong></small>
                        </span>
                    </div>
                   
                </div>
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table  class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <td rowspan="2"><small>Departemen</small></td>
                                <td colspan="5"><small>Jenis Pengadaan (Buah)</small></td>
                                <td colspan="4"><small>Metode Pemilihan (Buah)</small></td>
                            </tr>
                            <tr>
                                    <th><small>Barang</small></th>
                                    <th><small>Jasa Konstruksi / Pemborongan</small></th>
                                    <th><small>Jasa Konsultasi</small></th>
                                    <th><small>Jasa Lain</small></th>
                                    <th><small>Total</small></th>
                                    <th><small>Penunjukan Langsung</small></th>
                                    <th><small>Pengadaan Langsung</small></th>
                                    <th><small>E-Tender</small></th>
                                    <th><small>Total</small></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($departemen as $key => $value) { ?>
                                    <?php $kontrak_juksung = $this->M_total->nilai_kontrak_juksung($value['id_departemen']) ?>
                                    <?php $kontrak_pensung = $this->M_total->nilai_kontrak_pensung($value['id_departemen']) ?>
                                    <?php $kontrak_tender = $this->M_total->nilai_kontrak_tender($value['id_departemen']) ?>
                                    <?php $kontrak_total = $this->M_total->nilai_kontrak_total($value['id_departemen']) ?>
                                    <tr>
                                        <td><?= $value['nama_departemen'] ?></td>
                                        <td><small><?= $this->M_total->query_count_jenis_pengadaan($value['id_departemen'], 4);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_jenis_pengadaan($value['id_departemen'], 3);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_jenis_pengadaan($value['id_departemen'], 2);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_jenis_pengadaan($value['id_departemen'], 1);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_jenis_pengadaan_keseluruhan($value['id_departemen']);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_metode_pengadaan($value['id_departemen'], 3);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_metode_pengadaan($value['id_departemen'], 6);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_metode_pengadaan_tender($value['id_departemen']);  ?></small></td>
                                        <td><small><?= $this->M_total->query_count_metode_pengadaan_total($value['id_departemen']);  ?></small></td>
                                    </tr>
                                 <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong class="text-white">Data Chart - Total Pengadaan</strong></small>
                        </span>
                    </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex">
                            <div class="col-md-6">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Doughnuts Chart</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Bar Chart</button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Polar Area Chart</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Pie Chart</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <center>
                                            <div style="width: 500px; height:500px">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <center>
                                            <div  style="width: 500px; height:500px">
                                                <canvas id="myChart2"></canvas>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <center>
                                            <div  style="width: 500px; height:500px">
                                                <canvas id="myChart3"></canvas>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <center>
                                            <div  style="width: 500px; height:500px">
                                                <canvas id="myChart4"></canvas>
                                            </div>
                                        </center>
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
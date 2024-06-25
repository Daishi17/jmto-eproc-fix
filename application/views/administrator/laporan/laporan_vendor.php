<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-info">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>File Laporan Pengadaan Vendor</strong></small>
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
                <div class="card-body">
                    <br>
                    <center>
                        <h5>DATA PENYEDIA JASA PENGADAAN PT JMTO TAHUN <label for="" id="tahun_pengadaan_label"></label></h5>
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
                            <button type="button" id="filter" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                        </div>
                    </div>
                    <br>
                    <div style="overflow-x: auto;">
                        <table id="tbl_pengadaan_vendor" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Departemen</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Metode Pengadaan</th>
                                    <th>Nilai Anggaran (HPS)</th>
                                    <th>Nilai Kontrak</th>
                                    <th>Nama Penyedia</th>
                                    <th>Jangka Waktu Kontrak</th>
                                    <th>TKDN Minimum</th>
                                    <th>TKDN Penawaran</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
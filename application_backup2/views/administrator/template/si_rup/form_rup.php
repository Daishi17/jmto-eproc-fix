<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-cash-register"></i>
                            <small><strong>Sistem Informasi Rencana Umum Pengadaan (SI-RUP)</strong></small>
                        </span>
                    </h6>
                </div>
            </div><hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-money-check px-1"></i>
                            <small><strong>Form - Rencana Umum Pengadaan (RUP)</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <a href="http://localhost/etender-jmto/administrator/Sirup_rup">
                            <button type="button" class="btn btn-primary btn-sm shadow-lg">
                                <i class="fa-solid fa-angles-left px-1"></i>
                                Kembali Kemenu Tabel RUP
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <table class="table table-bordered table-sm shadow-lg">
                            <tr>
                                <th class="bg-light">
                                    <small>Kode & Tahun</small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <input type="text" class="form-control" placeholder="CP.2023.101.201.00001" disabled>    
                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input type="number" class="form-control" placeholder="Tahun">
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Departemen & Sections</small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Pilih Departemen</option>
                                                <option value="1">Human Capital & General Affair</option>
                                                <option value="2">Finance & Accounting</option>
                                                <option value="3">Operation 1</option>
                                            </select>  
                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Sections</option>
                                                <option value="1">Human Capital & General Affair</option>
                                                <option value="2">Finance & Accounting</option>
                                                <option value="3">Operation 1</option>
                                            </select>  
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Nama Program RKA</small>
                                </th>
                                <td colspan="2">
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <input type="text" class="form-control" placeholder="Nama Program RKAP" disabled>   
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Nama Paket & Deskripsi Pekerjaan</small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <textarea class="form-control" placeholder="Nama Paket Pengadaan" rows="2"></textarea>    
                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <textarea class="form-control" placeholder="Deskripsi Pekerjaan Pengadaan" rows="2"></textarea> 
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Proses Pengadaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Proses Pengadaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jenis Pengadaan</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Metode Pengadaan</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jenis Anggaran</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Pilih Jenis Pengadaan</option>
                                                                <option value="1">Jasa Lain</option>
                                                                <option value="2">Jasa Konsultasi</option>
                                                                <option value="3">Jasa Pemborongan / Konstruksi</option>
                                                                <option value="4">Pengadaan Barang</option>
                                                            </select>  
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Pilih Metode Pengadaan</option>
                                                                <option value="1">Tender Umum</option>
                                                                <option value="2">Seleksi Umum</option>
                                                                <option value="3">Penunjukan Langsung</option>
                                                                <option value="4">Tender Terbatas</option>
                                                                <option value="5">Seleksi Terbatas</option>
                                                                <option value="6">Pengadaan Langsung</option>
                                                            </select>  
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-money-bill-transfer"></i></span>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Pilih Jenis Anggaran</option>
                                                                <option value="1">Capex</option>
                                                                <option value="2">Opex</option>
                                                                <option value="3">Capex - Opex</option>
                                                            </select>  
                                                        </div>
                                                    <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Lokasi Pekerjaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Lokasi Pekerjaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Provinsi</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Kabupaten / Kota</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Detail Lokasi</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <select class="form-control select2bs4" style="width: 100%;">
                                                            <option></option>
                                                            <option>DKI Jakarta</option>
                                                            <option>Jawa Barat</option>
                                                            <option>Bali</option>
                                                        </select>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <select class="form-control select2bs4" style="width: 100%;">
                                                            <option></option>
                                                            <option>Jakarta Selatan</option>
                                                            <option>Bandung</option>
                                                            <option>Deparsar</option>
                                                        </select>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                                                            <input type="text" class="form-control" placeholder="Detail Lokasi">
                                                        </div>
                                                    <small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                            <input type="text" class="form-control" placeholder="Ruas Toll">
                                                        </div>
                                                    <small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <small>
                                                        <button type="button" class="btn btn-sm btn-success" id="insertRow">
                                                            <i class="fa-solid fa-road-circle-check"></i>
                                                            Tambah Ruas Toll
                                                        </button>
                                                    <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Kualifikasi Usaha & Jenis Produk </small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Pilih Kualifikasi Usaha</option>
                                                <option value="1">Besar</option>
                                                <option value="2">Menengah</option>
                                                <option value="3">Kecil</option>
                                            </select>  
                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-recycle"></i></span>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Jenis Produk</option>
                                                <option value="1">Menggunakan Produk Dalam Negri</option>
                                                <option value="2"> Menggunakan Produk Luar Negri</option>
                                            </select>  
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Status Pencatatan (TKDN/PDN/Import) </small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-right-left"></i></span>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Pilih Status Pencatatan</option>
                                                <option value="1">TKDN</option>
                                                <option value="2">PDN</option>
                                                <option value="3">Import</option>
                                            </select>  
                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">%</span>
                                            <input type="number" class="form-control" placeholder="Persentase">
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Waktu Pelaksanaan Pekerjaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Waktu Pelaksanaan Pekerjaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" colspan="2">
                                                    <small>Tahun Jamak</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jangka Waktu Pelaksanaan Pekerjaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days px-2"></i>Awal</span>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                    <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days px-2"></i> Akhir</span>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                                            <input type="number" class="form-control" placeholder="360" disabled>
                                                            <span class="input-group-text">Hari</span>
                                                        </div>
                                                    <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Sumber Dana</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Sumber Dana</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Departemen</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col" >
                                                    <small>Total Pagu RKAP</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Total Pagu RUP</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                            <input type="text" class="form-control" placeholder="Departemen" disabled>
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="number" class="form-control" placeholder="0" disabled>
                                                        </div>
                                                    <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="number" class="form-control">
                                                            <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                                                            <input type="number" class="form-control" disabled>
                                                        </div>
                                                    <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-footer bg-transparent border-dark">
                    <button type="button" class="btn btn-default btn-success">
                        <i class="fa-solid fa-floppy-disk px-1"></i>
                        Simpan Data RUP
                    </button>
                    <button type="button" class="btn btn-default btn-warning" onclick="history.back()">
                        <i class="fa-solid fa-angles-left px-1"></i>
                        Kembali Kemenu Sebelumnya
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
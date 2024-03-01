<div class="card-body">
    <table class="table table-sm table-bordered border-dark table-sm shadow-lg">
        <thead class="bg-secondary text-white text-center">
            <tr>
                <th class="col-sm-4"><small>Nama Perusahaan</small></th>
                <th class="col-sm-3"><small>Jenis Usaha</small></th>
                <th class="col-sm-2"><small>Kualifikasi Usaha</small></th>
                <th class="col-sm-2"><small>NIK Pelaksana</small></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cek_vendor_terundang as $key => $value) { ?>
                <tr>
                    <td>
                        <small>
                            <span><?= $value['id_vendor'] ?> || <?= $value['username'] ?></span>
                        </small>
                    </td>
                    <td>
                        <small>
                            <span>Jasa Lain & Jasa Konsultasi & Pengadaan Barang</span>
                        </small>
                    </td>
                    <td>
                        <small>
                            <span>Menengah</span>
                        </small>
                    </td>
                    <td>
                        <small>
                            <span>36740711223344</span>
                        </small>
                    </td>
                </tr>
            <?php   } ?>
        </tbody>
    </table>
</div>
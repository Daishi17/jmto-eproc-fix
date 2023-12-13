<!-- GET RUP PAKET FINAL -->
<!-- url_get_rup_finalisasi -->
<input type="hidden" name="url_get_rup_finalisasi" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_rup_terfinalisasi') ?>">

<!-- by rup -->
<input type="hidden" name="url_by_id_rup" value="<?= base_url('panitia/daftar_paket/daftar_paket/by_id_rup/') ?>">

<!-- url_buat_paket_penyedia -->
<input type="hidden" name="url_buat_paket_penyedia" value="<?= base_url('panitia/daftar_paket/daftar_paket/form_daftar_paket/') ?>">

<!-- url update -->

<input type="hidden" name="url_update_rup_hps" value="<?= base_url('panitia/daftar_paket/daftar_paket/update_hps/') ?>">
<input type="hidden" name="url_update_dok_hps" value="<?= base_url('panitia/daftar_paket/daftar_paket/update_dok_hps') ?>">
<input type="hidden" name="url_update_rup" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_update_rup') ?>">
<input type="hidden" name="url_cek_dokumen_hps" value="<?= base_url('file_paket/') ?>">

<!-- url jadwal -->
<input type="hidden" name="url_update_jadwal" value="<?= base_url('panitia/daftar_paket/daftar_paket/simpan_jadwal_20baris/') ?>">

<!-- INI UTNUK URL PERSYATAN IZIN USAHA ADMINISTRASI -->
<input type="hidden" name="url_update_syarat_klasifikasi" value="<?= base_url('panitia/daftar_paket/daftar_paket/update_syarat_klasifikasi') ?>">
<input type="hidden" name="url_update_syarat_izin_usaha_tender" value="<?= base_url('panitia/daftar_paket/daftar_paket/update_syarat_izin_usaha_tender') ?>">
<!-- INI UNTUK KBLI SYARAT TENDER -->
<input type="hidden" name="url_get_tambah_syarat_kbli" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_get_tambah_syarat_kbli') ?>">
<input type="hidden" name="url_get_syarat_kbli_tender" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_kbli_syarat_tender') ?>">
<input type="hidden" name="url_hapus_syarat_kbli" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_hapus_syarat_kbli') ?>">
<!-- INI UNTUK SBU SYARAT TENDER -->
<input type="hidden" name="url_get_tambah_syarat_sbu" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_get_tambah_syarat_sbu') ?>">
<input type="hidden" name="url_get_syarat_sbu_tender" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_sbu_syarat_tender') ?>">
<input type="hidden" name="url_hapus_syarat_sbu" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_hapus_syarat_sbu') ?>">
<!-- INI UTNUK URL PERSYATAN TEKNIS ADMINISTRASI -->
<input type="hidden" name="url_update_syarat_izin_teknis_tender" value="<?= base_url('panitia/daftar_paket/daftar_paket/update_syarat_izin_teknis_tender') ?>">

<!-- URL UNTUK DOKUMEN PENGADAAN -->
<input type="hidden" name="url_dokumen_pengadaan" value="<?= base_url('panitia/daftar_paket/daftar_paket/add_dok_pengadaan/') ?>">
<input type="hidden" name="url_get_dok_pengadaan" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_dok_pengadaan/') ?>">
<input type="hidden" name="url_hapus_dok_pengadaan" value="<?= base_url('panitia/daftar_paket/daftar_paket/hapus_dok_pengadaan/') ?>">

<input type="hidden" name="url_dokumen_prakualifikasi" value="<?= base_url('panitia/daftar_paket/daftar_paket/add_dok_prakualifikasi/') ?>">
<input type="hidden" name="url_get_dok_prakualifikasi" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_dok_prakualifikasi/') ?>">
<input type="hidden" name="url_hapus_dok_prakualifikasi" value="<?= base_url('panitia/daftar_paket/daftar_paket/hapus_dok_prakualifikasi/') ?>">

<!-- redirect setelah simpan paket -->
<input type="hidden" name="redirect_daftar_paket" value="<?= base_url('panitia/daftar_paket/daftar_paket') ?>">

<!-- url daftar paket -->
<input type="hidden" name="url_daftar_paket" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_draft_paket') ?>">
<input type="hidden" name="url_simpan_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/simpan_syarat_tambahan') ?>">
<input type="hidden" name="url_get_syarat_tambahan_tender" value="<?= base_url('panitia/daftar_paket/daftar_paket/get_syarat_tambahan') ?>">
<input type="hidden" name="url_hapus_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_hapus_syarat_tambahan') ?>">
<input type="hidden" name="url_download_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_download_syarat_tambahan') ?>">
<!-- url tok -->
<input type="hidden" name="url_buka_penawaran" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/acces_penawaran') ?>">
<input type="hidden" name="url_buka_penawaran_token" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/buka_penawaran' . '/') ?>">

<input type="hidden" name="url_dapatkan_token_penawaran" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/kirim_token_penawaran') ?>">
<input type="hidden" name="url_kirim_pengumuman" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/kirim_pengumuman_pemenang') ?>">
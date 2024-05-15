<!-- row_rup -->
<input type="hidden" name="url_row_rup" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_row_rup/') ?>">

<!-- url evaluasi ya -->
<input type="hidden" name="url_byid_mengikuti" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_byid_mengikuti/') ?>">
<input type="hidden" name="url_simpan_evaluasi_kualifikasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_kualifikasi/') ?>">
<input type="hidden" name="url_simpan_evaluasi_penawaran" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_penawaran/') ?>">
<input type="hidden" name="url_simpan_evaluasi_penawaran_ba" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_penawaran_ba/') ?>">
<input type="hidden" name="url_simpan_evaluasi_hea_tkdn" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_akhir_tkdn/') ?>">
<input type="hidden" name="url_simpan_evaluasi_hea_tkdn_tak_dihitung" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_akhir_tkdn_tak_dihitung/') ?>">
<input type="hidden" name="url_simpan_evaluasi_akhir_hea" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_akhir_hea/') ?>">
<input type="hidden" name="url_simpan_evaluasi_harga_terendah" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_harga_terendah/') ?>">
<input type="hidden" name="url_simpan_evaluasi_harga_terendah_hea" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_harga_terendah_hea/') ?>">

<!-- new evaluasi hea harga terendah -->
<input type="hidden" name="url_simpan_evaluasi_hea_tkdn_terendah" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_akhir_tkdn_terendah/') ?>">

<!-- syarat tambahan -->
<input type="hidden" name="url_byid_syarat_tambahan" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_byid_syarat_tambahan/') ?>">


<input type="hidden" name="url_simpan_evaluasi_syarat_tambahan" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_evaluasi_syarat_tambahan/') ?>">

<!-- berita acara url -->
<input type="hidden" name="url_simpan_berita_acara_tender" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_berita_acara_tender/') ?>">
<input type="hidden" name="url_hapus_berita_acara_tender" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'hapus_berita_acara_tender/') ?>">
<input type="hidden" name="url_get_berita_acara_tender" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_berita_acara_tender/') ?>">
<input type="hidden" name="url_open_berita_acara_tender" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/BERITA_ACARA_PENGADAAN' . '/') ?>">

<!-- undangan pembuktian -->
<input type="hidden" name="url_simpan_undangan_pembuktian" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_undangan_pembuktian/') ?>">
<input type="hidden" name="url_open_undangan" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/UNDANGAN_PEMBUKTIAN' . '/') ?>">

<!-- pengumuman hasi prakualifikasi -->
<input type="hidden" name="url_simpan_hasil_prakualifikasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_hasil_prakualifikasi/') ?>">
<input type="hidden" name="url_open_hasil_prakualifikasi" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/SURAT_PENUNJUKAN_PEMENANG' . '/') ?>">

<!-- surat penunjukan pemenang -->
<input type="hidden" name="url_simpan_penunjukan_pemenang" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_penunjukan_pemenang/') ?>">
<input type="hidden" name="url_open_penunjukan_pemenang" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/SURAT_PENUNJUKAN_PEMENANG' . '/') ?>">

<!-- ulang dan batal -->
<input type="hidden" name="redirect" value="<?= base_url('panitia/beranda/beranda') ?>">
<input type="hidden" name="url_ulang_pengadaan" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'ulang_pengadaan/') ?>">
<input type="hidden" name="url_batal_pengadaan" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'batal_pengadaan/') ?>">

<!-- undangan pembuktian -->
<input type="hidden" name="url_post_undangan_pembuktian" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_undangan_pembuktian') ?>">
<input type="hidden" name="url_post_undangan_pembuktian_vendor_waktu" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_undangan_pembuktian_vendor_waktu') ?>">
<input type="hidden" name="url_post_undangan_pembuktian_vendor_metode" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_undangan_pembuktian_vendor_metode') ?>">


<input type="hidden" name="url_post_ba_kualifikasi_hadir" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_ba_pembuktian_hadir') ?>">
<input type="hidden" name="url_post_ba_kualifikasi_dok" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_ba_pembuktian_dok') ?>">
<input type="hidden" name="url_post_ba_kualifikasi_ket" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_ba_pembuktian_ket') ?>">

<input type="hidden" name="url_post_waktu_undangan" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_waktu_undangan') ?>">


<!-- hasil prakualifikasi -->
<input type="hidden" name="url_post_pengumuman_hasil_kualifikasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_pengumuman_hasil_kualifikasi') ?>">

<!-- status ba -->
<input type="hidden" name="url_post_status_ba" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_status_ba') ?>">

<!-- status ba -->
<input type="hidden" name="url_post_status_kirim" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/save_status_kirim') ?>">

<input type="hidden" name="url_kirim_notif_perubahan_dokumen" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/kirim_notif_perubahan_dokumen') ?>">

<input type="hidden" name="url_simpan_kelengkapan_file2" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_kelengkapan_file2/') ?>">


<input type="hidden" name="url_byid_neraca" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'by_id_neraca/') ?>">
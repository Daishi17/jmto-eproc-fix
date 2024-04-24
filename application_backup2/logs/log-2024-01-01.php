<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-01-01 18:42:43 --> 404 Page Not Found: panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_pemenang_tender
ERROR - 2024-01-01 18:56:20 --> Query error: Unknown column 'id_rup.id_vendor_pemenang' in 'on clause' - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_departemen` ON `tbl_rup`.`id_departemen` = `tbl_departemen`.`id_departemen`
LEFT JOIN `tbl_jadwal_tender` ON `tbl_rup`.`id_jadwal_tender` = `tbl_jadwal_tender`.`id_jadwal_tender`
LEFT JOIN `tbl_section` ON `tbl_rup`.`id_section` = `tbl_section`.`id_section`
LEFT JOIN `tbl_rkap` ON `tbl_rup`.`id_rkap` = `tbl_rkap`.`id_rkap`
LEFT JOIN `tbl_provinsi` ON `tbl_rup`.`id_provinsi` = `tbl_provinsi`.`id_provinsi`
LEFT JOIN `tbl_kabupaten` ON `tbl_rup`.`id_kabupaten` = `tbl_kabupaten`.`id_kabupaten`
LEFT JOIN `tbl_jenis_pengadaan` ON `tbl_rup`.`id_jenis_pengadaan` = `tbl_jenis_pengadaan`.`id_jenis_pengadaan`
LEFT JOIN `tbl_metode_pengadaan` ON `tbl_rup`.`id_metode_pengadaan` = `tbl_metode_pengadaan`.`id_metode_pengadaan`
LEFT JOIN `tbl_jenis_anggaran` ON `tbl_rup`.`id_jenis_anggaran` = `tbl_jenis_anggaran`.`id_jenis_anggaran`
LEFT JOIN `mst_ruas` ON `tbl_rup`.`id_ruas` = `mst_ruas`.`id_ruas`
LEFT JOIN `tbl_vendor` ON `id_rup`.`id_vendor_pemenang` = `tbl_vendor`.`id_vendor`
WHERE `id_rup` = '200'
ERROR - 2024-01-01 18:56:44 --> Query error: Unknown column 'id_rup.id_vendor_pemenang' in 'on clause' - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_vendor` ON `id_rup`.`id_vendor_pemenang` = `tbl_vendor`.`id_vendor`
WHERE `id_rup` = '200'
ERROR - 2024-01-01 18:57:31 --> Query error: Unknown column 'id_rup.id_vendor_pemenang' in 'on clause' - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_vendor` ON `id_rup`.`id_vendor_pemenang` = `tbl_vendor`.`id_vendor`
WHERE `id_rup` = '200'
ERROR - 2024-01-01 19:13:53 --> Query error: Not unique table/alias: 'tbl_vendor' - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_vendor` ON `tbl_rup`.`id_vendor_pemenang` = `tbl_vendor`.`id_vendor`
LEFT JOIN `tbl_vendor` ON `tbl_vendor_mengikuti_paket`.`id_vendor` = `tbl_vendor`.`id_vendor`
WHERE `id_rup` = '200'
ERROR - 2024-01-01 19:14:38 --> Query error: Column 'id_rup' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_vendor` ON `tbl_rup`.`id_vendor_pemenang` = `tbl_vendor`.`id_vendor`
LEFT JOIN `tbl_vendor_mengikuti_paket` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_mengikuti_paket`.`id_vendor`
WHERE `id_rup` = '200'
ERROR - 2024-01-01 19:20:06 --> Query error: Unknown column 'tbl_rup.id_rup' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor_mengikuti_paket`
WHERE `tbl_rup`.`id_rup` = '200'
ERROR - 2024-01-01 20:12:11 --> 404 Page Not Found: panitia/info_tender/Informasi_tender_umum_pra_2_file/ba_pemenang_tender
ERROR - 2024-01-01 21:05:21 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 387
ERROR - 2024-01-01 14:30:38 --> 404 Page Not Found: Assets/logo_ba
ERROR - 2024-01-01 23:54:49 --> 404 Page Not Found: panitia/info_tender/Informasi_tender_terbatas_pra_1_file/undangan_penawaran

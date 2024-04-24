<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-01-16 08:50:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP B...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_neraca_keuangan`
WHERE `tbl_vendor_neraca_keuangan`.`tahun_mulai` > `IS` `NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP BY `tbl_vendor_neraca_keuangan`.`id_vendor`
ERROR - 2024-01-16 09:36:10 --> Severity: error --> Exception: Call to undefined method M_panitia::row_syarat_tambaha() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\print_ba\ba_pembuktian_kualifikasi.php 270
ERROR - 2024-01-16 09:53:04 --> Query error: Unknown column 'naa_syarat_tambahan' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor_syarat_tambahan`
WHERE `id_vendor` IS NULL
AND `id_rup` = '205'
AND `naa_syarat_tambahan` = 'ISO'
ERROR - 2024-01-16 13:14:46 --> Query error: Unknown column 'name' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `name` = 'file1_administrasi_sts', `value_name` = '1'
WHERE `id_vendor_mengikuti_paket` = '81'
ERROR - 2024-01-16 13:33:10 --> Query error: Unknown column 'btn_file1_pabrikan' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `btn_file1_pabrikan` = NULL
WHERE `id_vendor_mengikuti_paket` = '81'
ERROR - 2024-01-16 13:33:20 --> Query error: Unknown column 'btn_file1_personil_sts' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `btn_file1_personil_sts` = NULL
WHERE `id_vendor_mengikuti_paket` = '81'
ERROR - 2024-01-16 13:33:23 --> Query error: Unknown column 'file1_peralatan_sts' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `file1_peralatan_sts` = NULL
WHERE `id_vendor_mengikuti_paket` = '81'
ERROR - 2024-01-16 13:33:31 --> Query error: Unknown column 'btn_file1_pabrikan' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `btn_file1_pabrikan` = NULL
WHERE `id_vendor_mengikuti_paket` = '81'
ERROR - 2024-01-16 13:35:35 --> Query error: Unknown column 'btn_file1_pabrikan' in 'field list' - Invalid query: UPDATE `tbl_vendor_mengikuti_paket` SET `btn_file1_pabrikan` = NULL
WHERE `id_vendor_mengikuti_paket` = '81'

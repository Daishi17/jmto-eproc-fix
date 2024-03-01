<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-01-02 16:23:04 --> Query error: Column 'id_rup' in order clause is ambiguous - Invalid query: SELECT *
FROM `tbl_rup`
LEFT JOIN `tbl_panitia` ON `tbl_rup`.`id_rup` = `tbl_panitia`.`id_rup`
LEFT JOIN `tbl_departemen` ON `tbl_rup`.`id_departemen` = `tbl_departemen`.`id_departemen`
LEFT JOIN `tbl_section` ON `tbl_rup`.`id_section` = `tbl_section`.`id_section`
LEFT JOIN `tbl_rkap` ON `tbl_rup`.`id_rkap` = `tbl_rkap`.`id_rkap`
LEFT JOIN `tbl_provinsi` ON `tbl_rup`.`id_provinsi` = `tbl_provinsi`.`id_provinsi`
LEFT JOIN `tbl_kabupaten` ON `tbl_rup`.`id_kabupaten` = `tbl_kabupaten`.`id_kabupaten`
LEFT JOIN `tbl_jenis_pengadaan` ON `tbl_rup`.`id_jenis_pengadaan` = `tbl_jenis_pengadaan`.`id_jenis_pengadaan`
LEFT JOIN `tbl_metode_pengadaan` ON `tbl_rup`.`id_metode_pengadaan` = `tbl_metode_pengadaan`.`id_metode_pengadaan`
LEFT JOIN `tbl_jenis_anggaran` ON `tbl_rup`.`id_jenis_anggaran` = `tbl_jenis_anggaran`.`id_jenis_anggaran`
LEFT JOIN `mst_ruas` ON `tbl_rup`.`id_ruas` = `mst_ruas`.`id_ruas`
WHERE `tbl_rup`.`status_paket_diumumkan` = 1
AND `tbl_rup`.`id_metode_pengadaan` = 4
AND `tbl_panitia`.`id_manajemen_user` = '26'
ORDER BY `id_rup` ASC
 LIMIT 10

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-03-20 10:28:18 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 383
ERROR - 2024-03-20 10:53:37 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor`
LEFT JOIN `tbl_vendor_siup` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siup`.`id_vendor`
LEFT JOIN `tbl_vendor_nib` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_nib`.`id_vendor`
LEFT JOIN `tbl_vendor_sbu` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_sbu`.`id_vendor`
LEFT JOIN `tbl_vendor_siujk` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siujk`.`id_vendor`
LEFT JOIN `tbl_vendor_skdp` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_skdp`.`id_vendor`
WHERE `tbl_vendor`.`sts_terundang` = 1
AND `tbl_vendor`.`sts_daftar_hitam` IS NULL
AND `tbl_vendor`.`kualifikasi_usaha` = 'Besar'
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '78', '80', '81', '82', '83', '84', '85', '86', '89', '90', '91', '92', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '128', '130', '133', '136', '137', '138', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '152', '153', '154', '160', '162', '172', '177', '186')
AND `tbl_vendor`.`id_vendor` IN('66', '77', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '149', '150', '152', '153', '160', '180')
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '73', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '99', '100', '101', '103', '106', '107', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '139', '141', '142', '143', '144', '146', '147', '149', '150', '152', '153', '160', '172', '180')
AND `tbl_vendor`.`id_vendor` IN('79', '81', '86', '92', '94', '95', '96', '103', '107', '116', '139', '142', '145', '169', '170', '87', '91', '99', '100', '101', '104', '112', '113', '120', '126', '136', '144', '158', '160', '172', '173', '187')
AND `tbl_vendor`.`id_vendor` IN(Array, Array, Array, Array, Array)
AND `tbl_vendor_siup`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
AND `tbl_vendor_nib`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
ERROR - 2024-03-20 10:53:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_keuangan`.`tahun_lapor` < `IS` `NULL`
GROUP BY `tbl_ve...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_keuangan`
WHERE `tbl_vendor_keuangan`.`tahun_lapor` > `IS` `NULL`
AND `tbl_vendor_keuangan`.`tahun_lapor` < `IS` `NULL`
GROUP BY `tbl_vendor_keuangan`.`id_vendor`
ERROR - 2024-03-20 10:56:57 --> Severity: error --> Exception: Too few arguments to function M_panitia::result_vendor_terundang(), 7 passed in C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php on line 204 and exactly 8 expected C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 511
ERROR - 2024-03-20 11:05:02 --> Severity: error --> Exception: Too few arguments to function M_panitia::gabung_keseluruhan_vendor_terundang(), 3 passed in C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php on line 199 and exactly 4 expected C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 472
ERROR - 2024-03-20 11:20:48 --> Query error: MySQL server has gone away - Invalid query: SELECT *
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
WHERE `id_url_rup` = '8bd4d1c4468643c5b786cb3014990635'
ERROR - 2024-03-20 11:20:49 --> Query error: Unknown column 'sts_checked_sbu.tgl_berlaku' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor`
LEFT JOIN `tbl_vendor_siup` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siup`.`id_vendor`
LEFT JOIN `tbl_vendor_nib` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_nib`.`id_vendor`
LEFT JOIN `tbl_vendor_sbu` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_sbu`.`id_vendor`
LEFT JOIN `tbl_vendor_siujk` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siujk`.`id_vendor`
LEFT JOIN `tbl_vendor_skdp` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_skdp`.`id_vendor`
WHERE `tbl_vendor`.`sts_terundang` = 1
AND `tbl_vendor`.`sts_daftar_hitam` IS NULL
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '78', '80', '81', '82', '83', '84', '85', '86', '89', '90', '91', '92', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '128', '130', '133', '136', '137', '138', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '152', '153', '154', '160', '162', '172', '177', '186')
AND `tbl_vendor`.`id_vendor` IN('66', '77', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '149', '150', '152', '153', '160', '180')
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '73', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '99', '100', '101', '103', '106', '107', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '139', '141', '142', '143', '144', '146', '147', '149', '150', '152', '153', '160', '172', '180')
AND `tbl_vendor`.`id_vendor` IN('79', '81', '86', '92', '94', '95', '96', '103', '107', '116', '139', '142', '145', '169', '170', '87', '91', '99', '100', '101', '104', '112', '113', '120', '126', '136', '144', '158', '160', '172', '173', '187')
AND `tbl_vendor_siup`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
AND `tbl_vendor_nib`.`tgl_berlaku` >= '2024-03-20'
AND `tbl_vendor_nib`.`sts_seumur_hidup` IN(1, 2)
AND `sts_checked_sbu`.`tgl_berlaku` >= '2024-03-20'
AND `sts_checked_sbu`.`sts_seumur_hidup` IN(1, 2)
ERROR - 2024-03-20 11:20:52 --> Query error: Unknown column 'sts_checked_sbu.tgl_berlaku' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor`
LEFT JOIN `tbl_vendor_siup` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siup`.`id_vendor`
LEFT JOIN `tbl_vendor_nib` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_nib`.`id_vendor`
LEFT JOIN `tbl_vendor_sbu` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_sbu`.`id_vendor`
LEFT JOIN `tbl_vendor_siujk` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siujk`.`id_vendor`
LEFT JOIN `tbl_vendor_skdp` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_skdp`.`id_vendor`
WHERE `tbl_vendor`.`sts_terundang` = 1
AND `tbl_vendor`.`sts_daftar_hitam` IS NULL
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '78', '80', '81', '82', '83', '84', '85', '86', '89', '90', '91', '92', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '128', '130', '133', '136', '137', '138', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '152', '153', '154', '160', '162', '172', '177', '186')
AND `tbl_vendor`.`id_vendor` IN('66', '77', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '149', '150', '152', '153', '160', '180')
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '73', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '99', '100', '101', '103', '106', '107', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '139', '141', '142', '143', '144', '146', '147', '149', '150', '152', '153', '160', '172', '180')
AND `tbl_vendor`.`id_vendor` IN('79', '81', '86', '92', '94', '95', '96', '103', '107', '116', '139', '142', '145', '169', '170', '87', '91', '99', '100', '101', '104', '112', '113', '120', '126', '136', '144', '158', '160', '172', '173', '187')
AND `tbl_vendor_siup`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
AND `tbl_vendor_nib`.`tgl_berlaku` >= '2024-03-20'
AND `tbl_vendor_nib`.`sts_seumur_hidup` IN(1, 2)
AND `sts_checked_sbu`.`tgl_berlaku` >= '2024-03-20'
AND `sts_checked_sbu`.`sts_seumur_hidup` IN(1, 2)
ERROR - 2024-03-20 11:22:21 --> Query error: Unknown column 'sts_checked_sbu.tgl_berlaku' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor`
LEFT JOIN `tbl_vendor_siup` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siup`.`id_vendor`
LEFT JOIN `tbl_vendor_nib` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_nib`.`id_vendor`
LEFT JOIN `tbl_vendor_sbu` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_sbu`.`id_vendor`
LEFT JOIN `tbl_vendor_siujk` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siujk`.`id_vendor`
LEFT JOIN `tbl_vendor_skdp` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_skdp`.`id_vendor`
WHERE `tbl_vendor`.`sts_terundang` = 1
AND `tbl_vendor`.`sts_daftar_hitam` IS NULL
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '78', '80', '81', '82', '83', '84', '85', '86', '89', '90', '91', '92', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '128', '130', '133', '136', '137', '138', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '152', '153', '154', '160', '162', '172', '177', '186')
AND `tbl_vendor`.`id_vendor` IN('66', '77', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '149', '150', '152', '153', '160', '180')
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '73', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '99', '100', '101', '103', '106', '107', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '139', '141', '142', '143', '144', '146', '147', '149', '150', '152', '153', '160', '172', '180')
AND `tbl_vendor`.`id_vendor` IN('79', '81', '86', '92', '94', '95', '96', '103', '107', '116', '139', '142', '145', '169', '170', '87', '91', '99', '100', '101', '104', '112', '113', '120', '126', '136', '144', '158', '160', '172', '173', '187')
AND `tbl_vendor_siup`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
AND `tbl_vendor_nib`.`tgl_berlaku` >= '2024-03-20'
AND `tbl_vendor_nib`.`sts_seumur_hidup` IN(1, 2)
AND `sts_checked_sbu`.`tgl_berlaku` >= '2024-03-20'
AND `sts_checked_sbu`.`sts_seumur_hidup` IN(1, 2)
ERROR - 2024-03-20 11:22:51 --> Query error: Unknown column 'sts_checked_sbu.tgl_berlaku_sbu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_vendor`
LEFT JOIN `tbl_vendor_siup` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siup`.`id_vendor`
LEFT JOIN `tbl_vendor_nib` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_nib`.`id_vendor`
LEFT JOIN `tbl_vendor_sbu` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_sbu`.`id_vendor`
LEFT JOIN `tbl_vendor_siujk` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_siujk`.`id_vendor`
LEFT JOIN `tbl_vendor_skdp` ON `tbl_vendor`.`id_vendor` = `tbl_vendor_skdp`.`id_vendor`
WHERE `tbl_vendor`.`sts_terundang` = 1
AND `tbl_vendor`.`sts_daftar_hitam` IS NULL
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '78', '80', '81', '82', '83', '84', '85', '86', '89', '90', '91', '92', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '128', '130', '133', '136', '137', '138', '141', '142', '143', '144', '145', '146', '147', '148', '149', '150', '152', '153', '154', '160', '162', '172', '177', '186')
AND `tbl_vendor`.`id_vendor` IN('66', '77', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '96', '100', '101', '103', '106', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '138', '139', '140', '141', '142', '143', '144', '145', '146', '147', '149', '150', '152', '153', '160', '180')
AND `tbl_vendor`.`id_vendor` IN(NULL, '66', '73', '78', '79', '80', '81', '82', '84', '85', '86', '89', '90', '91', '92', '94', '95', '99', '100', '101', '103', '106', '107', '115', '117', '119', '123', '124', '126', '129', '130', '133', '136', '137', '139', '141', '142', '143', '144', '146', '147', '149', '150', '152', '153', '160', '172', '180')
AND `tbl_vendor`.`id_vendor` IN('79', '81', '86', '92', '94', '95', '96', '103', '107', '116', '139', '142', '145', '169', '170', '87', '91', '99', '100', '101', '104', '112', '113', '120', '126', '136', '144', '158', '160', '172', '173', '187')
AND `tbl_vendor_siup`.`tgl_berlaku` >= '2024-02-20'
AND `tbl_vendor_siup`.`sts_seumur_hidup` IN(1, 2)
AND `tbl_vendor_nib`.`tgl_berlaku` >= '2024-03-20'
AND `tbl_vendor_nib`.`sts_seumur_hidup` IN(1, 2)
AND `sts_checked_sbu`.`tgl_berlaku_sbu` >= '2024-03-20'
AND `sts_checked_sbu`.`sts_seumur_hidup` IN(1, 2)

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-02-07 12:16:10 --> Severity: Notice --> Trying to get property 'nip' of non-object C:\laragon\www\jmto-eproc\application\libraries\Role_login.php 21
ERROR - 2024-02-07 12:21:54 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:23:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
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
WHERE `id_url_rup` = '9c6b7499b23549e8ad92befa97faca86'
ERROR - 2024-02-07 12:23:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
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
WHERE `id_url_rup` = '9c6b7499b23549e8ad92befa97faca86'
ERROR - 2024-02-07 12:23:41 --> Query error: MySQL server has gone away - Invalid query: SELECT *
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
WHERE `id_url_rup` = '9c6b7499b23549e8ad92befa97faca86'
ERROR - 2024-02-07 12:24:51 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:52:50 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 526
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 528
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 530
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 532
ERROR - 2024-02-07 12:53:05 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 534
ERROR - 2024-02-07 12:53:14 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:53:14 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1400
ERROR - 2024-02-07 12:53:14 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1447
ERROR - 2024-02-07 12:53:14 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1695
ERROR - 2024-02-07 12:54:12 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:54:12 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1402
ERROR - 2024-02-07 12:54:12 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1449
ERROR - 2024-02-07 12:54:12 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1697
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 526
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 528
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 530
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 532
ERROR - 2024-02-07 12:54:16 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 534
ERROR - 2024-02-07 12:54:26 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 12:54:26 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1402
ERROR - 2024-02-07 12:54:26 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1449
ERROR - 2024-02-07 12:54:26 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 1697
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 526
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 528
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 530
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 532
ERROR - 2024-02-07 12:55:20 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 534
ERROR - 2024-02-07 12:55:52 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:55:52 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 507
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 526
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 528
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 530
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 532
ERROR - 2024-02-07 12:56:44 --> Severity: Notice --> Undefined index: syarat_tender_kualifikasi C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 534
ERROR - 2024-02-07 12:56:45 --> Severity: Notice --> Undefined variable: row C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 12:56:45 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\models\M_panitia\M_panitia.php 492
ERROR - 2024-02-07 13:23:28 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:26:19 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:27:01 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:28:56 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:31:12 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:32:25 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:33:32 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:34:19 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:35:10 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:37:05 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:37:50 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:38:33 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:38:53 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:40:46 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:42:45 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:48:20 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:48:58 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:54:05 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:54:32 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2108
ERROR - 2024-02-07 13:54:32 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2109
ERROR - 2024-02-07 13:57:06 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:57:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP B...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_neraca_keuangan`
WHERE `tbl_vendor_neraca_keuangan`.`tahun_mulai` > `IS` `NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP BY `tbl_vendor_neraca_keuangan`.`id_vendor`
ERROR - 2024-02-07 13:57:15 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:57:24 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 13:57:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP B...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_neraca_keuangan`
WHERE `tbl_vendor_neraca_keuangan`.`tahun_mulai` > `IS` `NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP BY `tbl_vendor_neraca_keuangan`.`id_vendor`
ERROR - 2024-02-07 13:57:42 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:38:01 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:39:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2108
ERROR - 2024-02-07 15:39:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2109
ERROR - 2024-02-07 15:39:43 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2108
ERROR - 2024-02-07 15:39:43 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\controllers\post_jadwal\Post_jadwal.php 2109
ERROR - 2024-02-07 15:43:34 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:44:16 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:44:16 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:44:17 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:44:18 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:44:18 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:44:18 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:46:08 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:46:17 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:46:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP B...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_neraca_keuangan`
WHERE `tbl_vendor_neraca_keuangan`.`tahun_mulai` > `IS` `NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP BY `tbl_vendor_neraca_keuangan`.`id_vendor`
ERROR - 2024-02-07 15:46:24 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:46:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP B...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_neraca_keuangan`
WHERE `tbl_vendor_neraca_keuangan`.`tahun_mulai` > `IS` `NULL`
AND `tbl_vendor_neraca_keuangan`.`tahun_selesai` < `IS` `NULL`
GROUP BY `tbl_vendor_neraca_keuangan`.`id_vendor`
ERROR - 2024-02-07 15:46:30 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-07 15:48:10 --> Query error: Unknown column 'kode_rup' in 'order clause' - Invalid query: SELECT *
FROM `tbl_panitia`
LEFT JOIN `tbl_manajemen_user` ON `tbl_manajemen_user`.`id_manajemen_user` = `tbl_panitia`.`id_manajemen_user`
LEFT JOIN `tbl_pegawai` ON `tbl_pegawai`.`id_pegawai` = `tbl_manajemen_user`.`id_pegawai`
WHERE `tbl_panitia`.`id_rup` = '225'
AND `tbl_manajemen_user`.`role` = 5
ORDER BY `kode_rup` ASC
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:49:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:49:42 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:42 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:42 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:49:42 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 15:49:43 --> Severity: Notice --> Undefined variable: peserta_tender_pq_penawaran C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1016
ERROR - 2024-02-07 15:49:43 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1772
ERROR - 2024-02-07 15:49:43 --> Severity: Notice --> Trying to access array offset on value of type null C:\laragon\www\jmto-eproc\application\views\panitia\info_tender\Informasi_tender_penunjukan_langsung\index.php 1773
ERROR - 2024-02-07 16:14:48 --> Severity: Notice --> Trying to get property 'nip' of non-object C:\laragon\www\jmto-eproc\application\libraries\Role_login.php 21

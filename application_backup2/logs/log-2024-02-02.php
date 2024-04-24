<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-02-02 11:08:10 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-02 11:37:24 --> Severity: error --> Exception: Too few arguments to function Daftar_paket::by_id_rup(), 0 passed in C:\laragon\www\jmto-eproc\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\laragon\www\jmto-eproc\application\controllers\panitia\daftar_paket\Daftar_paket.php 388
ERROR - 2024-02-02 14:36:51 --> Query error: Unknown column 'tbl_vendor_neraca_keuangan.id_vendor' in 'on clause' - Invalid query: SELECT *
FROM `tbl_vendor_keuangan`
LEFT JOIN `tbl_vendor` ON `tbl_vendor_neraca_keuangan`.`id_vendor` = `tbl_vendor`.`id_vendor`
WHERE `tbl_vendor_keuangan`.`id_vendor` = '119'
ORDER BY `tbl_vendor_keuangan`.`id_vendor` ASC
 LIMIT 10

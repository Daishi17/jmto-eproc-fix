<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-03-15 13:49:52 --> Severity: Notice --> Trying to get property 'nip' of non-object C:\laragon\www\jmto-eproc\application\libraries\Role_login.php 21
ERROR - 2024-03-15 13:50:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND `tbl_vendor_keuangan`.`tahun_lapor` < `IS` `NULL`
GROUP BY `tbl_ve...' at line 3 - Invalid query: SELECT *
FROM `tbl_vendor_keuangan`
WHERE `tbl_vendor_keuangan`.`tahun_lapor` > `IS` `NULL`
AND `tbl_vendor_keuangan`.`tahun_lapor` < `IS` `NULL`
GROUP BY `tbl_vendor_keuangan`.`id_vendor`
ERROR - 2024-03-15 15:56:39 --> Unable to connect to the database

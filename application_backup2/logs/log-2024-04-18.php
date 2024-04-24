<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_panitia`
WHERE `id_rup` = '223'
AND `sts_ba_penjelasan_kualifikasi` IS NULL
ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_ba_teknis_detail`
WHERE `id_rup` = '223'
ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_panitia`
LEFT JOIN `tbl_manajemen_user` ON `tbl_panitia`.`id_manajemen_user` = `tbl_manajemen_user`.`id_manajemen_user`
LEFT JOIN `tbl_pegawai` ON `tbl_manajemen_user`.`id_pegawai` = `tbl_pegawai`.`id_pegawai`
WHERE `id_rup` = '223'
AND `tbl_manajemen_user`.`role` = 5
ORDER BY `tbl_panitia`.`role_panitia` ASC
ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_vendor_mengikuti_paket`
LEFT JOIN `tbl_vendor` ON `tbl_vendor_mengikuti_paket`.`id_vendor` = `tbl_vendor`.`id_vendor`
WHERE `tbl_vendor_mengikuti_paket`.`id_rup` = '223'
AND `tbl_vendor_mengikuti_paket`.`sts_mengikuti_paket` = 1
ORDER BY `tbl_vendor_mengikuti_paket`.`id_rup` DESC
 LIMIT 10
ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_vendor_mengikuti_paket`
LEFT JOIN `tbl_rup` ON `tbl_vendor_mengikuti_paket`.`id_rup` = `tbl_rup`.`id_rup`
LEFT JOIN `tbl_vendor` ON `tbl_vendor_mengikuti_paket`.`id_vendor` = `tbl_vendor`.`id_vendor`
WHERE `tbl_vendor_mengikuti_paket`.`id_rup` = '223'
AND `tbl_vendor_mengikuti_paket`.`ev_keuangan` > 60
AND `tbl_vendor_mengikuti_paket`.`ev_teknis` > 60
AND `tbl_vendor_mengikuti_paket`.`file1_administrasi_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_pabrikan_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_organisasi_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_peralatan_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_personil_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_makalah_teknis_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_pra_rk3_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_spek_sts` IN(1, 3)
ORDER BY `tbl_rup`.`id_rup` DESC
 LIMIT 10
ERROR - 2024-04-18 09:55:37 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `tbl_vendor_mengikuti_paket`
LEFT JOIN `tbl_rup` ON `tbl_vendor_mengikuti_paket`.`id_rup` = `tbl_rup`.`id_rup`
LEFT JOIN `tbl_vendor` ON `tbl_vendor_mengikuti_paket`.`id_vendor` = `tbl_vendor`.`id_vendor`
WHERE `tbl_vendor_mengikuti_paket`.`id_rup` = '223'
AND `tbl_vendor_mengikuti_paket`.`ev_keuangan` > 60
AND `tbl_vendor_mengikuti_paket`.`ev_teknis` > 60
AND `tbl_vendor_mengikuti_paket`.`file1_administrasi_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_pabrikan_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_organisasi_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_peralatan_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_personil_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_makalah_teknis_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_pra_rk3_sts` IN(1, 3)
AND `tbl_vendor_mengikuti_paket`.`file1_spek_sts` IN(1, 3)
ORDER BY `tbl_rup`.`id_rup` DESC
 LIMIT 10
ERROR - 2024-04-18 10:00:35 --> Unable to connect to the database
ERROR - 2024-04-18 10:10:39 --> Unable to connect to the database
ERROR - 2024-04-18 13:24:50 --> Severity: Notice --> Trying to get property 'nip' of non-object C:\laragon\www\jmto-eproc\application\libraries\Role_login.php 21

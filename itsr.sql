-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table itsr.accessories
DROP TABLE IF EXISTS `accessories`;
CREATE TABLE IF NOT EXISTS `accessories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_manufacture` int(11) DEFAULT NULL,
  `accessories_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.accessories: ~1 rows (approximately)
/*!40000 ALTER TABLE `accessories` DISABLE KEYS */;
INSERT INTO `accessories` (`id`, `id_manufacture`, `accessories_name`, `order_number`, `warranty`, `qty`, `min_qty`, `notes`, `id_location`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 'keyboard', '05165465sd4gsd546', '1 Tahun', 20, 5, 'dipergunakan untuk pergantian keyboard yang rusak', 2, '1567947540.JPG', 'Galih Prasetio', '2019-09-08 19:59:00', '2019-09-08 19:59:00', NULL);
/*!40000 ALTER TABLE `accessories` ENABLE KEYS */;

-- Dumping structure for table itsr.assets
DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_manufacture` int(11) DEFAULT NULL,
  `asset_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL COMMENT 'for execution soft deletion',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.assets: ~3 rows (approximately)
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` (`id`, `id_manufacture`, `asset_tag`, `id_category`, `serial`, `asset_name`, `order_number`, `warranty`, `qty`, `min_qty`, `notes`, `id_location`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '121654654651DBDD', 3, '213246sd5g46s5dg4sd865sd', 'TESTING', '05165465sd4gsd546', '1 Tahun', 12, 4, 'ffff', 1, '1567493669.jpg', 'Galih Prasetio', '2019-09-03 09:10:31', '2019-09-03 16:24:48', NULL),
	(2, 3, '121654654651DBDD', 3, '213246sd5g46s5dg4sd865sdf', 'TESTING', '05165465sd4gsd546', '1 Tahun', 10, 2, 'dddddd', 5, '1567493652.jpg', 'Galih Prasetio', '2019-09-03 13:05:06', '2019-09-03 16:26:40', NULL),
	(3, 3, '121654654651DBDD', 4, '213246sd5g46s5dg4sd865sd', 'TESTING', '05165465sd4gsd546', '1 Tahun', 10, 50, 'dsgsdg', 4, NULL, 'Galih Prasetio', '2019-09-03 16:30:24', '2019-09-06 15:02:24', '2019-09-06 15:02:24');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;

-- Dumping structure for table itsr.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `category`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'Desktop PC', 'Galih Prasetio', '2019-08-27 14:09:16', '2019-08-27 14:09:16', NULL),
	(5, 'Server', 'Galih Prasetio', '2019-08-27 14:09:25', '2019-08-27 14:09:25', NULL),
	(6, 'Printer', 'Galih Prasetio', '2019-08-27 14:09:39', '2019-08-27 14:09:39', NULL),
	(7, 'ms office', 'Galih Prasetio', '2019-09-06 22:12:39', '2019-09-06 22:12:39', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table itsr.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.department: ~13 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `department`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Engineering Maintenance', '2019-07-19 13:26:48', '2019-07-22 08:17:57', NULL),
	(3, 'Information Technology', '2019-07-19 13:27:54', '2019-07-19 13:27:54', NULL),
	(4, 'Logistic', '2019-07-19 13:31:57', '2019-07-19 13:31:57', NULL),
	(5, 'HRPA', '2019-07-19 13:32:07', '2019-07-19 13:32:07', NULL),
	(6, 'Finance & Accounting', '2019-07-19 13:32:31', '2019-07-19 13:32:31', NULL),
	(7, 'General Affairs', '2019-07-19 13:32:46', '2019-07-19 13:32:46', NULL),
	(8, 'Marketing', '2019-07-19 13:32:56', '2019-07-19 13:32:56', NULL),
	(9, 'Purchasing', '2019-07-19 13:33:02', '2019-07-19 13:33:02', NULL),
	(10, 'Distribution', '2019-07-19 13:33:09', '2019-07-19 13:33:09', NULL),
	(11, 'Shipping & Receiving', '2019-07-19 13:33:19', '2019-07-19 13:33:19', NULL),
	(12, 'Production', '2019-07-19 13:33:28', '2019-07-19 13:33:28', NULL),
	(14, 'Safety & Environment', '2019-07-19 13:33:52', '2019-07-19 13:33:52', NULL),
	(15, 'Quality Assurance', '2019-07-19 13:34:07', '2019-07-19 13:34:07', NULL);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for function itsr.doc_get_first_approval
DROP FUNCTION IF EXISTS `doc_get_first_approval`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `doc_get_first_approval`(
        `in_email` VARCHAR(250),
        `in_step_number` INTEGER
    ) RETURNS varchar(250) CHARSET latin1
BEGIN
Declare approval varchar(255);
select `wfd`.author from work_flow_detail wfd
left join work_flow wf
on wfd.`id_work_flow` = wf.id
left join department d
on wf.name = d.`id`
left join users u
on d.id = u.`id_department`
where u.email = in_email
and wfd.step_number = in_step_number into approval;
  RETURN(approval) ;
END//
DELIMITER ;

-- Dumping structure for procedure itsr.doc_update_document_approval
DROP PROCEDURE IF EXISTS `doc_update_document_approval`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `doc_update_document_approval`(
        IN `in_id_document` INTEGER,
        IN `in_id_user` INTEGER,
        IN `in_status` VARCHAR(255),
        IN `in_date_action` DATETIME
    )
BEGIN
declare checking INT(11);

select count(*) from 
`document_approval` 
where id_document = in_id_document
and id_user = in_id_user into checking;

if checking < 1 THEN
insert into document_approval(id_document,id_user,status,date_action)
values(in_id_document,in_id_user,in_status,in_date_action);
else
update document_approval set date_action = in_date_action 
where id_document = in_id_document 
and id_user = in_id_user;
end if;
END//
DELIMITER ;

-- Dumping structure for procedure itsr.doc_update_next_approval
DROP PROCEDURE IF EXISTS `doc_update_next_approval`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `doc_update_next_approval`(
	IN `in_department` VARCHAR(255),
	IN `in_step_number` INTEGER,
	IN `in_doc_number` VARCHAR(255)
    
)
BEGIN
declare author varchar(255);
declare status varchar(255);
declare total_approval int(11);
declare id_approval  int(11);

select wfd.author from work_flow_detail wfd
left join `work_flow` wf
on wf.`id` = wfd.`id_work_flow`
left join `department` d
on `wf`.id_department = d.id
where d.department = in_department
and wfd.`step_number` = in_step_number + 1 into author;

select wfd.`status` from work_flow_detail wfd
left join `work_flow` wf
on wf.`id` = wfd.`id_work_flow`
left join `department` d
on `wf`.id_department = d.id
where d.department = in_department
and wfd.`step_number` = in_step_number + 1 into status;

select count(*) from work_flow_detail wfd
left join work_flow wf
on wfd.`id_work_flow`= wf.id
left join department d
on wf.id_department = d.`id`
where d.department = in_department into total_approval;

IF in_step_number >= total_approval THEN
set status = 'Completed' ;
End if;

select id from users where 
email = author into id_approval;
UPDATE service_request
set doc_current_author = id_approval, 
doc_status_number = doc_status_number + 1,
doc_status = status,
updated_at = now()
where doc_number = in_doc_number;
END//
DELIMITER ;

-- Dumping structure for function itsr.generate_doc
DROP FUNCTION IF EXISTS `generate_doc`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `generate_doc`() RETURNS varchar(255) CHARSET latin1
BEGIN
declare run_number int;
declare code_apps varchar(20);
declare code_years varchar(20);
declare doc_number varchar(255);
select count(*) from `service_request`
where doc_status != 'Draft' into run_number;
set code_apps = 'ITSR';
select YEAR(now()) into code_years;
set doc_number =  concat(run_number,'-',code_apps,'-',code_years);
  RETURN (doc_number) ;
END//
DELIMITER ;

-- Dumping structure for table itsr.licenses
DROP TABLE IF EXISTS `licenses`;
CREATE TABLE IF NOT EXISTS `licenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `software_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `product_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `id_manufacture` int(11) DEFAULT NULL,
  `license_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `purchase_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_cost` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.licenses: ~2 rows (approximately)
/*!40000 ALTER TABLE `licenses` DISABLE KEYS */;
INSERT INTO `licenses` (`id`, `software_name`, `id_category`, `product_key`, `seats`, `id_manufacture`, `license_name`, `license_email`, `id_supplier`, `purchase_order`, `purchase_cost`, `purchase_date`, `expiration_date`, `termination_date`, `notes`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'microsoft office 2013', 7, 'P2T8W-MRKTR-4WWTR-D68C4-H2CCG', NULL, 2, 'microfost office olp', 'riko@grahatrindo.com', 2, '9049094049kfkf09090', 1231568796, '2019-09-06', NULL, NULL, 'testing license', 'Galih Prasetio', '2019-09-07 08:17:25', '2019-09-08 10:39:01', '2019-09-08 10:39:01'),
	(2, 'microsoft office 2013', 4, 'P2T8W-MRKTR-4WWTR-D68C4-H2CCG', NULL, 2, 'microfost office olp', 'galihprasetio89@gmail.com', NULL, '9049094049kfkf09090', 22427525, '2019-09-09', NULL, NULL, NULL, 'Galih Prasetio', '2019-09-08 14:17:24', '2019-09-09 08:48:27', NULL);
/*!40000 ALTER TABLE `licenses` ENABLE KEYS */;

-- Dumping structure for table itsr.location
DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.location: ~8 rows (approximately)
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `location`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Main Building 1st Floor', 'Galih Prasetio', '2019-08-27 14:25:49', '2019-08-27 14:31:40', NULL),
	(2, 'Main Building 2nd Floor', 'Galih Prasetio', '2019-08-27 14:26:10', '2019-08-27 14:26:10', NULL),
	(4, 'Admin Building 2st Floor', 'Galih Prasetio', '2019-09-03 09:25:46', '2019-09-03 09:25:46', NULL),
	(5, 'Control Building 1st Floor', 'Galih Prasetio', '2019-09-03 09:26:01', '2019-09-03 09:26:01', NULL),
	(6, 'Control Building 2st Floor', 'Galih Prasetio', '2019-09-03 09:26:08', '2019-09-03 09:26:08', NULL),
	(7, 'Bussiness Building 1st Floor', 'Galih Prasetio', '2019-09-03 09:26:22', '2019-09-03 09:26:22', NULL),
	(8, 'Bussiness Building 2st Floor', 'Galih Prasetio', '2019-09-03 09:26:28', '2019-09-03 09:26:28', NULL),
	(9, 'Bussiness Building 3st Floor', 'Galih Prasetio', '2019-09-03 09:26:35', '2019-09-03 09:26:35', NULL);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Dumping structure for table itsr.manufacture
DROP TABLE IF EXISTS `manufacture`;
CREATE TABLE IF NOT EXISTS `manufacture` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `manufacture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.manufacture: ~2 rows (approximately)
/*!40000 ALTER TABLE `manufacture` DISABLE KEYS */;
INSERT INTO `manufacture` (`id`, `manufacture`, `url`, `phone`, `email`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Acer', 'https://acer.co.id/product', '1231354654987', 'services@acer.co.id', 'Galih Prasetio', '2019-08-27 15:01:33', '2019-09-02 14:37:00', NULL),
	(3, 'LOGITECH', NULL, '85722427525', 'galihprasetio89@gmail.com', 'Galih Prasetio', '2019-09-03 13:04:20', '2019-09-03 13:04:20', NULL);
/*!40000 ALTER TABLE `manufacture` ENABLE KEYS */;

-- Dumping structure for table itsr.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.migrations: ~30 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_06_21_035627_create_permission_tables', 2),
	(4, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
	(5, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
	(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
	(7, '2016_06_01_000004_create_oauth_clients_table', 3),
	(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
	(9, '2019_06_24_055317_create_products_table', 4),
	(10, '2019_07_16_142936_create_sessions_table', 5),
	(11, '2019_07_19_090249_create_department_table', 6),
	(12, '2019_07_19_090346_create_section_table', 6),
	(13, '2019_07_22_082125_create_section_table', 7),
	(14, '2019_07_23_142811_create_province_table', 8),
	(15, '2019_07_25_091532_create_documents_table', 9),
	(16, '2019_07_25_111345_create_flow_document_table', 10),
	(17, '2019_07_25_111418_create_button_type_table', 10),
	(18, '2019_07_30_104406_create_work_flow_table', 11),
	(19, '2019_07_30_105038_create_work_flow_detail_table', 12),
	(20, '2019_08_09_101041_create_history_document', 13),
	(21, '2019_08_22_094706_create_document_approval_table', 14),
	(22, '2019_08_27_130302_create_manufacture_table', 15),
	(23, '2019_08_27_130621_create_category_table', 15),
	(24, '2019_08_27_130732_create_location_table', 15),
	(25, '2019_08_27_130840_create_assets_table', 16),
	(26, '2019_09_04_074516_create_licenses_table', 17),
	(27, '2019_09_04_075154_create_supplier_table', 17),
	(28, '2019_09_08_122827_create_accessories_table', 18),
	(29, '2019_09_16_145901_create_service_request_table', 19),
	(30, '2019_10_15_093953_create_service_request_history_table', 20);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table itsr.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table itsr.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.model_has_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(4, 'App\\User', 38),
	(5, 'App\\User', 29),
	(5, 'App\\User', 37),
	(5, 'App\\User', 39);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table itsr.oauth_access_tokens
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `oauth_access_tokens_user_id_index` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.oauth_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table itsr.oauth_auth_codes
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table itsr.oauth_clients
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `oauth_clients_user_id_index` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.oauth_clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'ev8BexYTS0ZxIq1GYLKmYsc8ctvHUgmKS0pU02En', 'http://localhost', 1, 0, 0, '2019-06-21 04:09:07', '2019-06-21 04:09:07'),
	(2, NULL, 'Laravel Password Grant Client', 'li6jrBQ5Jw7NZth78YmYLCAbWmWfV07ZQAjY1EAG', 'http://localhost', 0, 1, 0, '2019-06-21 04:09:07', '2019-06-21 04:09:07');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table itsr.oauth_personal_access_clients
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.oauth_personal_access_clients: ~1 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2019-06-21 04:09:07', '2019-06-21 04:09:07');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table itsr.oauth_refresh_tokens
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table itsr.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.password_resets: ~18 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30'),
	('galihprasetio89@gmail.com', '$2y$10$btV1y04yeZ7KwtOJHGgNGOAcfYe5OfH1nPups..lOoxJSBr6EJwtq', '2019-07-02 08:39:04'),
	('approvalsupervisor@gmail.com', '$2y$10$Veu1ErS7bS0A3ipx1hFmAesv8/qj4NiW5xqYz4XhaOP.cx2tEQF.K', '2019-08-15 08:44:30');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table itsr.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.permissions: ~11 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'role-list', 'web', '2019-06-21 04:00:29', '2019-06-21 04:00:29'),
	(2, 'role-create', 'web', '2019-06-21 04:00:29', '2019-06-21 04:00:29'),
	(3, 'role-edit', 'web', '2019-06-21 04:00:29', '2019-06-21 04:00:29'),
	(4, 'role-delete', 'web', '2019-06-21 04:00:29', '2019-06-21 04:00:29'),
	(5, 'permission-list', 'web', '2019-07-05 02:49:46', '2019-07-05 02:49:46'),
	(6, 'permission-create', 'web', '2019-07-05 02:49:46', '2019-07-05 02:49:46'),
	(7, 'permission-edit', 'web', '2019-07-05 02:49:46', '2019-07-05 02:49:46'),
	(8, 'permission-delete', 'web', '2019-07-05 02:49:46', '2019-07-05 02:49:46'),
	(69, 'department-list', 'web', '2019-07-19 09:18:40', '2019-07-19 09:18:40'),
	(70, 'department-create', 'web', '2019-07-19 09:18:40', '2019-07-19 09:18:40'),
	(71, 'department-edit', 'web', '2019-07-19 09:18:40', '2019-07-19 09:18:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table itsr.province
DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.province: ~34 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `province`, `created_at`, `updated_at`) VALUES
	(64, 'Aceh\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(65, 'Bali\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(66, 'Banten\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(67, 'Bengkulu\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(68, 'Gorontalo\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(69, 'Jakarta\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(70, 'Jambi\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(71, 'Jawa Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(72, 'Jawa Tengah\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(73, 'Jawa Timur\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(74, 'Kalimantan Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(75, 'Kalimantan Selatan\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(76, 'Kalimantan Tengah\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(77, 'Kalimantan Timur\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(78, 'Kalimantan Utara\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(79, 'Kepulauan Bangka Belitung\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(80, 'Kepulauan Riau\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(81, 'Lampung\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(82, 'Maluku\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(83, 'Maluku Utara\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(84, 'Nusa Tenggara Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(85, 'Nusa Tenggara Timur\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(86, 'Papua\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(87, 'Papua Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(88, 'Riau\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(89, 'Sulawesi Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(90, 'Sulawesi Selatan\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(91, 'Sulawesi Tengah\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(92, 'Sulawesi Tenggara\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(93, 'Sulawesi Utara\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(94, 'Sumatera Barat\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(95, 'Sumatera Selatan\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(96, 'Sumatera Utara\r', '2019-07-23 14:44:32', '2019-07-23 14:44:32'),
	(97, 'Yogyakarta', '2019-07-23 14:44:32', '2019-07-23 14:44:32');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table itsr.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(4, 'Operator', 'web', '2019-07-12 10:52:01', '2019-07-22 07:20:02'),
	(5, 'administrator', 'web', '2019-07-19 08:05:44', '2019-07-19 08:05:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table itsr.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.role_has_permissions: ~15 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 5),
	(2, 5),
	(3, 5),
	(4, 5),
	(5, 4),
	(5, 5),
	(6, 4),
	(6, 5),
	(7, 4),
	(7, 5),
	(8, 4),
	(8, 5),
	(69, 5),
	(70, 5),
	(71, 5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table itsr.section
DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_department` int(11) DEFAULT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.section: ~4 rows (approximately)
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`, `id_department`, `section`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 3, 'Staff IT Infrasturcture', '2019-07-22 19:51:29', '2019-07-22 19:51:29', NULL),
	(10, 3, 'Staff IT Software Development', '2019-07-22 19:51:46', '2019-07-22 19:51:46', NULL),
	(11, 2, 'Staff Engineering Mechanical', '2019-07-22 19:52:08', '2019-07-22 19:52:08', NULL),
	(13, 3, 'Head Department Information Technology', '2019-08-19 15:46:53', '2019-08-19 15:46:53', NULL);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;

-- Dumping structure for table itsr.service_request
DROP TABLE IF EXISTS `service_request`;
CREATE TABLE IF NOT EXISTS `service_request` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doc_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_requestor` int(11) DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `id_work_flow` int(11) DEFAULT NULL,
  `step_number` int(11) DEFAULT NULL,
  `doc_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.service_request: ~3 rows (approximately)
/*!40000 ALTER TABLE `service_request` DISABLE KEYS */;
INSERT INTO `service_request` (`id`, `doc_number`, `id_requestor`, `submit_date`, `id_work_flow`, `step_number`, `doc_status`, `id_author`, `subject`, `description`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(28, NULL, 37, NULL, NULL, NULL, 'Draft', 37, 'Pointing Domain', 'testing update draft\ntesting update 1\ntesting update 2\ntesting update 3\ntesting update 4', 'Galih Prasetio', '2019-10-15 09:33:51', '2019-10-15 12:51:56', NULL),
	(29, NULL, 37, NULL, NULL, NULL, 'Draft', 37, 'Pembelian domain customapps.id', 'sdgsdgsdg\n\ntesting', 'Galih Prasetio', '2019-10-11 14:05:46', '2019-10-15 12:51:52', NULL),
	(30, NULL, 37, NULL, NULL, NULL, 'Draft', 37, 'Printer Error', 'sdgsdgsdg', 'Galih Prasetio', '2019-10-11 13:42:29', '2019-10-15 12:51:49', NULL);
/*!40000 ALTER TABLE `service_request` ENABLE KEYS */;

-- Dumping structure for table itsr.service_request_history
DROP TABLE IF EXISTS `service_request_history`;
CREATE TABLE IF NOT EXISTS `service_request_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_service_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itsr.service_request_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `service_request_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_request_history` ENABLE KEYS */;

-- Dumping structure for table itsr.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table itsr.supplier
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.supplier: ~4 rows (approximately)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `supplier_name`, `address`, `city`, `state`, `country`, `zip`, `contact_name`, `phone`, `fax`, `email`, `url`, `notes`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'grahatrindo', 'jl Jakarta no 5', 'jakarta', 'dki jakarta', 'indonesia', 45465465, 'ricko', '123456879', NULL, 'riko@grahatrindo.com', NULL, NULL, 'Galih Prasetio', '2019-09-04 09:15:38', '2019-09-04 09:15:38', NULL),
	(2, 'PT MSAN', 'JL Jurang Timur no. 6', 'Cimahi', 'Jawa Barat', 'Indonesia', 40514, 'galih', '85722427525', NULL, 'galihprasetio89@gmail.com', NULL, NULL, 'Galih Prasetio', '2019-09-04 09:16:48', '2019-09-06 15:17:43', NULL),
	(4, 'Mitsubhishi chemical indonesia', 'jl raya merak cilegon banten', 'cilegon', 'banten', 'indonesia', 24735, 'Rachman', '1234156489', NULL, 'rachman@gmail.com', NULL, NULL, 'Galih Prasetio', '2019-09-04 16:16:14', '2019-09-04 16:16:14', NULL),
	(6, 'liu kang', 'lkksldkgls;dg', 'Cimahi', 'Jawa Barat', 'Indonesia', 40514, 'galih', '85722427525', NULL, 'galihprasetio89@gmail.com', NULL, NULL, 'Galih Prasetio', '2019-09-06 21:59:53', '2019-09-06 21:59:57', '2019-09-06 21:59:57');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table itsr.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_department` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `office_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_department`, `id_section`, `tittle`, `position`, `dateofbirth`, `office_phone`, `cell_phone`, `region`, `job_description`, `image`, `sign`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(37, 'Galih Prasetio', 'galihprasetio89@gmail.com', NULL, '$2y$10$e1t5SSIOYtGsE8lFbQvveuZ/ZP1yTmOjYLvYNH/QpTbjYrKC5U6P.', 3, 10, 'Senior IT', 'It development', '2019-08-14', '085722427525', '85722427525', 'Jawa Barat', 'sdgsdgsdg', '1566878132.png', 'data:image/png;base64,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', '2019-08-12 10:16:28', '2019-09-02 15:45:54', NULL),
	(38, 'Supervisor', 'approvalsupervisor@gmail.com', NULL, '$2y$10$NDluwDEjNN8USVcWRuMk3ehDPPiwm6c0pVgbMnwJGx.AvNFdG4IZK', 3, 9, 'Supervisor Information Technology', 'Supervisor Information Technology', '2019-08-14', '085722427525', '85722427525', 'placeholder', 'Testing', '1567406020.png', 'data:image/png;base64,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', NULL, '2019-08-13 08:46:25', '2019-09-02 13:33:40', NULL),
	(39, 'Head Department', 'approvalheaddepartment@gmail.com', NULL, '$2y$10$OHQmt1XbzTiEFLazJoTvEO3Uy314ImIhHFKWrrsawSmORD7PTAQu6', 3, 9, 'Head Department Information Technology', 'Head Department Information Technology', '2019-08-13', '085722427525', '85722427525', 'Jawa Barat', 'dsgsdgsdgsd', '1567405987.png', 'data:image/png;base64,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', NULL, '2019-08-13 08:47:42', '2019-09-02 13:33:07', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table itsr.work_flow
DROP TABLE IF EXISTS `work_flow`;
CREATE TABLE IF NOT EXISTS `work_flow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_department` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.work_flow: ~1 rows (approximately)
/*!40000 ALTER TABLE `work_flow` DISABLE KEYS */;
INSERT INTO `work_flow` (`id`, `name`, `id_department`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(35, 'Information Technology', 3, '2019-09-10 13:59:49', '2019-09-10 13:59:49', NULL);
/*!40000 ALTER TABLE `work_flow` ENABLE KEYS */;

-- Dumping structure for table itsr.work_flow_detail
DROP TABLE IF EXISTS `work_flow_detail`;
CREATE TABLE IF NOT EXISTS `work_flow_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_work_flow` int(11) NOT NULL,
  `step_number` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sentBack` tinyint(1) NOT NULL,
  `check` tinyint(1) NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `reject` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table itsr.work_flow_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `work_flow_detail` DISABLE KEYS */;
INSERT INTO `work_flow_detail` (`id`, `id_work_flow`, `step_number`, `status`, `author`, `sentBack`, `check`, `approve`, `reject`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(79, 35, 1, 'Waiting Accepted by Supervisor', 'approvalsupervisor@gmail.com', 1, 1, 0, 0, '2019-10-15 10:03:42', NULL, NULL),
	(80, 35, 2, 'Waiting Accepted by Head Department', 'approvalheaddepartment@gmail.com', 1, 0, 1, 1, '2019-10-15 10:04:03', NULL, NULL);
/*!40000 ALTER TABLE `work_flow_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

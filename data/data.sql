-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table newjob.accounts: ~3 rows (approximately)
INSERT INTO `accounts` (`id`, `role_id`, `name`, `phone`, `gender`, `status`, `address`, `password`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Tra my', '123456', 0, 1, '10', '$2y$10$BBvrzhtDymf2hEpe4EQvXuKrrDe/d/L2aQIKXbD/P/vyxxDPx/uuu', '2022-11-29 02:55:42', '2022-11-29 02:55:42'),
	(3, 2, 'Nguyen van a', '12345', 1, 1, '12345', '$2y$10$e6tIzbscpgZaofkiEK.PsuByPDPpKYtzrj6nV97p17V5Ig0P9KWYe', '2022-11-29 02:55:57', '2022-11-29 02:55:57'),
	(4, 2, 'Nguyen van a', '123', 1, 1, '123', '$2y$10$WE2IhTj68.R8OD8ifpMaEOrMk4qPR7IHhmnEW8jPtbXGNPe6O0V5a', '2022-11-29 18:37:20', '2022-11-29 18:37:20');

-- Dumping data for table newjob.failed_jobs: ~0 rows (approximately)

-- Dumping data for table newjob.items: ~2 rows (approximately)
INSERT INTO `items` (`id`, `id_menuItem`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Admin', '/permission/role', 1, '2022-11-29 10:02:08', '2022-11-29 10:02:09'),
	(2, 1, 'Super admin', '/permission/superadmin', 1, '2022-11-30 01:20:11', '2022-11-30 01:20:12');

-- Dumping data for table newjob.members: ~2 rows (approximately)
INSERT INTO `members` (`id`, `name`, `phone`, `gender`, `status`, `address`, `created_at`, `updated_at`) VALUES
	('1', 'My', '123', 1, 1, '13', '2022-11-30 01:30:49', '2022-11-30 01:30:50'),
	('f12fa9ff-4075-441a-ba5d-863562acff0c', 'Nguyen van a', '0969740147', 1, 1, '10', '2022-11-29 20:34:09', '2022-11-29 20:34:09');

-- Dumping data for table newjob.menu_items: ~4 rows (approximately)
INSERT INTO `menu_items` (`id`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Permission', 'null', 1, '2022-11-29 09:58:07', '2022-11-29 09:58:08'),
	(2, 'Memeber manage', '/members', 1, '2022-11-29 09:58:59', '2022-11-29 09:59:00'),
	(3, 'Admin manage', '/accounts/2', 1, '2022-11-29 09:59:36', '2022-11-29 09:59:36'),
	(4, 'Super admin manage', '/accounts/1', 1, '2022-11-29 10:00:02', '2022-11-29 10:00:03');

-- Dumping data for table newjob.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(80, '2022_11_15_011544_create_roles_table', 1),
	(95, '2014_10_12_000000_create_users_table', 2),
	(96, '2014_10_12_100000_create_password_resets_table', 2),
	(97, '2019_08_19_000000_create_failed_jobs_table', 2),
	(98, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(99, '2022_11_15_011404_create_members_table', 2),
	(100, '2022_11_15_011556_create_accounts_table', 2),
	(101, '2022_11_16_090527_create_permission_tables', 2),
	(102, '2022_11_23_025042_create_tasks_table', 2),
	(103, '2022_11_25_025839_create_menu_items_table', 2),
	(104, '2022_11_25_094541_create_items_table', 2),
	(105, '2022_11_29_092833_create_routes_table', 2),
	(106, '2022_11_29_092903_create_route_items_table', 2);

-- Dumping data for table newjob.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table newjob.model_has_roles: ~3 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\Account', 1),
	(1, 'App\\Models\\Account', 2),
	(2, 'App\\Models\\Account', 4);

-- Dumping data for table newjob.password_resets: ~0 rows (approximately)

-- Dumping data for table newjob.permissions: ~9 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Create member', 'web', '2022-11-29 02:44:21', '2022-11-29 02:44:21'),
	(2, 'Edit member', 'web', '2022-11-29 02:44:50', '2022-11-29 02:44:50'),
	(3, 'Delete member', 'web', '2022-11-29 02:44:58', '2022-11-29 02:44:58'),
	(4, 'Create admin', 'web', '2022-11-29 02:45:12', '2022-11-29 02:45:12'),
	(5, 'Edit admin', 'web', '2022-11-29 02:45:21', '2022-11-29 02:45:21'),
	(6, 'Delete admin', 'web', '2022-11-29 02:45:28', '2022-11-29 02:45:28'),
	(7, 'Create super admin', 'web', '2022-11-29 02:45:37', '2022-11-29 02:45:37'),
	(8, 'Edit super admin', 'web', '2022-11-29 02:45:44', '2022-11-29 02:45:44'),
	(9, 'Delete super admin', 'web', '2022-11-29 02:45:51', '2022-11-29 02:45:51');

-- Dumping data for table newjob.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table newjob.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Super admin', 'web', '2022-11-29 09:43:31', '2022-11-29 09:43:32'),
	(2, 'Admin', 'web', '2022-11-29 09:43:49', '2022-11-29 09:43:50');

-- Dumping data for table newjob.role_has_permissions: ~12 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(1, 2),
	(2, 2),
	(3, 2);

-- Dumping data for table newjob.routes: ~3 rows (approximately)
INSERT INTO `routes` (`id`, `controller`, `created_at`, `updated_at`) VALUES
	(1, 'MemberController', '2022-11-30 01:49:03', '2022-11-30 01:49:04'),
	(2, 'AccountController', '2022-11-30 01:49:16', '2022-11-30 01:49:17'),
	(3, 'PermissionController', '2022-11-30 01:49:34', '2022-11-30 01:49:34');

-- Dumping data for table newjob.route_items: ~17 rows (approximately)
INSERT INTO `route_items` (`id`, `route`, `uri`, `action`, `method`, `name`, `created_at`, `updated_at`, `permission`) VALUES
	(1, 'App\\Http\\Controllers\\MemberController', '/members', 'store', 'post', 'storeMember', '2022-11-30 01:50:31', '2022-11-30 01:50:31', 'permission:Create member'),
	(2, 'App\\Http\\Controllers\\MemberController', '/members', 'index', 'get', 'indexMember', '2022-11-30 01:54:43', '2022-11-30 01:54:44', 'role:Super admin|Admin'),
	(3, 'App\\Http\\Controllers\\MemberController', '/members/{id}', 'show', 'get', 'showMember', '2022-11-30 01:56:00', '2022-11-30 01:56:01', 'permission:Edit member'),
	(4, 'App\\Http\\Controllers\\MemberController', '/members/{id}', 'update', 'post', 'updateMember', '2022-11-30 01:56:39', '2022-11-30 01:56:40', 'permission:Edit member'),
	(5, 'App\\Http\\Controllers\\MemberController', '/members/{id}', 'destroy', 'delete', 'destroyMember', '2022-11-30 01:57:33', '2022-11-30 01:57:34', 'permission:Delete member'),
	(6, 'App\\Http\\Controllers\\AccountController', '/accounts', 'store', 'post', 'storeAccount', '2022-11-30 03:21:32', '2022-11-30 03:21:33', 'permission:Create admin|Create super admin'),
	(7, 'App\\Http\\Controllers\\AccountController', '/accounts/{id}', 'index', 'get', 'indexAccount', '2022-11-30 03:22:59', '2022-11-30 03:23:03', 'role:Super admin|Admin'),
	(8, 'App\\Http\\Controllers\\AccountController', '/account/{id}', 'show', 'get', 'showAccount', '2022-11-30 03:24:23', '2022-11-30 03:24:24', 'permission:Edit admin|Edit super admin'),
	(9, 'App\\Http\\Controllers\\AccountController', '/account/{id}', 'update', 'post', 'updateAccount', '2022-11-30 03:24:30', '2022-11-30 03:24:34', 'permission:Edit admin|Edit super admin'),
	(10, 'App\\Http\\Controllers\\AccountController', '/account/{id}', 'destroy', 'delete', 'destroyAccount', '2022-11-30 03:26:02', '2022-11-30 03:26:03', 'permission:Delete admin|Delete super admin'),
	(11, 'App\\Http\\Controllers\\AccountController', '/authlogin', 'login', 'post', 'login', '2022-11-30 03:27:37', '2022-11-30 03:27:40', NULL),
	(12, 'App\\Http\\Controllers\\AccountController', '/', 'getlogin', 'get', 'getlogin', '2022-11-30 03:28:32', '2022-11-30 03:28:33', NULL),
	(13, 'App\\Http\\Controllers\\PermissionController', '/permission/admin', 'getPermissonAdmin', 'get', 'getPermissonAdmin', '2022-11-30 03:29:38', '2022-11-30 03:29:38', NULL),
	(14, 'App\\Http\\Controllers\\PermissionController', '/permission/role', 'show', 'get', 'show', '2022-11-30 03:30:52', '2022-11-30 03:30:53', NULL),
	(15, 'App\\Http\\Controllers\\PermissionController', '/permission/superadmin', 'getPermissonSuperadmin', 'get', 'getPermissonSuperadmin', '2022-11-30 03:31:33', '2022-11-30 03:31:34', NULL),
	(16, 'App\\Http\\Controllers\\PermissionController', '/permission', 'index', 'post', 'indexPermission', '2022-11-30 03:32:34', '2022-11-30 03:32:34', 'role:Super admin|Admin'),
	(17, 'App\\Http\\Controllers\\PermissionController', '/permission/{id}', 'update', 'post', 'updatePermission', '2022-11-30 03:32:40', '2022-11-30 03:32:39', 'role:Super admin|Admin');

-- Dumping data for table newjob.tasks: ~0 rows (approximately)

-- Dumping data for table newjob.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

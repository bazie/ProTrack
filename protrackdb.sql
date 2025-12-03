-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2025 at 06:54 PM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protrackdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_groups`
--

DROP TABLE IF EXISTS `access_groups`;
CREATE TABLE IF NOT EXISTS `access_groups` (
  `id` char(36) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_groups`
--

INSERT INTO `access_groups` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'Root User', 'root', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
('2', 'Administrator', 'admin', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
('3', 'User', 'user', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
('9eac1dbf-96d1-44ce-b860-98b6cd621105', 'Staff CO', 'staff-co', '2025-04-14 15:51:46', '2025-10-02 17:04:13', '2025-10-02 17:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `access_menus`
--

DROP TABLE IF EXISTS `access_menus`;
CREATE TABLE IF NOT EXISTS `access_menus` (
  `id` char(36) NOT NULL,
  `access_group_id` char(36) DEFAULT NULL,
  `menu_id` char(36) DEFAULT NULL,
  `access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`access`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_menus_access_group_id_foreign` (`access_group_id`),
  KEY `access_menus_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_menus`
--

INSERT INTO `access_menus` (`id`, `access_group_id`, `menu_id`, `access`, `created_at`, `updated_at`) VALUES
('9ea42138-0255-493a-875c-d5e74159d22e', '1', '9ea42137-def4-4a2d-be96-b798d36c461a', NULL, '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-0398-44fc-97af-d51881d3c309', '1', '9ea42137-d208-4053-80fc-1ae9d9ba8fc0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-09b5-4222-94d2-9a4c8fd991b4', '1', '9ea42137-d09e-44f3-a025-6d439a11c544', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-0d3f-4304-ad2d-a374a52f68ea', '1', '9ea42137-cd93-47f2-be86-56f7060a459a', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-0e35-48ba-a408-6b39bca00a9f', '1', '9ea42137-e17e-4e05-983b-506de9be09d0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-0f50-4334-994a-f5493ca7f8f5', '1', '9ea42137-e3f5-4c28-aafc-a9b0ac984ef9', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-11f3-4eeb-a4c3-36618522db93', '2', '9ea42137-d09e-44f3-a025-6d439a11c544', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-158f-401c-b5e4-6307568ecd3b', '2', '9ea42137-cd93-47f2-be86-56f7060a459a', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-1687-46d6-931c-55cc6e7f42a9', '2', '9ea42137-e17e-4e05-983b-506de9be09d0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-177d-45fc-bca4-de66ae0e1d19', '2', '9ea42137-e3f5-4c28-aafc-a9b0ac984ef9', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-19c4-42e4-8c8e-1dc5a087c198', '3', '9ea42137-e17e-4e05-983b-506de9be09d0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9ea42138-1b05-44cc-a6a3-513cb4d3ed51', '3', '9ea42137-e3f5-4c28-aafc-a9b0ac984ef9', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-10 16:34:51', '2025-04-10 16:34:51'),
('9eac43aa-a094-4b47-bdf5-5da50bb8dbfd', '1', '9eac43aa-9e13-45bf-9a42-4384217865de', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-14 17:37:48', '2025-04-14 17:37:48'),
('9eac43aa-a160-4781-8869-21eff810c34c', '2', '9eac43aa-9e13-45bf-9a42-4384217865de', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-14 17:37:48', '2025-04-14 17:37:48'),
('9eac556b-a3b7-4423-a966-9f4dcf90cf6b', '1', '9eac556b-9fb0-4875-82a2-064643c7c810', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-14 18:27:26', '2025-04-14 18:27:26'),
('9eac556b-a495-4ec5-972b-e1a7a1064360', '2', '9eac556b-9fb0-4875-82a2-064643c7c810', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-14 18:27:26', '2025-04-14 18:27:26'),
('9eac556b-a56e-493c-b67b-927eef28c91a', '3', '9eac556b-9fb0-4875-82a2-064643c7c810', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-04-14 18:27:26', '2025-04-14 18:27:26'),
('9f4d4bd2-b9aa-4f9c-ae43-dc45436d1341', '1', '9f4d4306-7ea9-4a62-9e43-4582eb828738', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-07-03 18:48:54', '2025-07-03 18:48:54'),
('9f4d4bd2-bffe-488e-b2c9-1b7055a96961', '2', '9f4d4306-7ea9-4a62-9e43-4582eb828738', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-07-03 18:48:54', '2025-07-03 18:48:54'),
('9f4d4bd2-c185-44fc-9e82-3f68527f4cf7', '3', '9f4d4306-7ea9-4a62-9e43-4582eb828738', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-07-03 18:48:54', '2025-07-03 18:48:54'),
('9fb19890-7acb-4824-9ac4-81509f58a892', '1', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:26:16', '2025-08-22 15:26:16'),
('9fb19890-7c70-40d4-924c-de76cdb9d175', '2', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:26:16', '2025-08-22 15:26:16'),
('9fb19890-7dca-40e3-9388-5d0a298c14e5', '3', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:26:16', '2025-08-22 15:26:16'),
('9fb19890-7f57-44f2-81cc-12536883353b', '9eac1dbf-96d1-44ce-b860-98b6cd621105', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:26:16', '2025-08-22 15:26:16'),
('9fb19954-d7d5-428f-9817-47fb5ebf7b83', '1', '9fb19954-cf3d-4a48-93f9-73f0e780b4c8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:28:25', '2025-08-22 15:28:25'),
('9fb19954-d954-400d-8b6d-0d0dfe5ff1a6', '2', '9fb19954-cf3d-4a48-93f9-73f0e780b4c8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:28:25', '2025-08-22 15:28:25'),
('9fb19954-daa3-4599-b75d-f206df7df9bc', '3', '9fb19954-cf3d-4a48-93f9-73f0e780b4c8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:28:25', '2025-08-22 15:28:25'),
('9fb19954-dbc5-4b72-8587-82d8a36fac48', '9eac1dbf-96d1-44ce-b860-98b6cd621105', '9fb19954-cf3d-4a48-93f9-73f0e780b4c8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-08-22 15:28:25', '2025-08-22 15:28:25'),
('a0143b77-5263-4c85-bafb-8e91bafe97b4', '1', 'a0143b76-487e-48b7-8aeb-2b0afc754e9e', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:12:54', '2025-10-10 16:12:54'),
('a0143b77-5419-4a07-9189-225c56b086d4', '2', 'a0143b76-487e-48b7-8aeb-2b0afc754e9e', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:12:54', '2025-10-10 16:12:54'),
('a0143cbd-1836-493a-9de6-cae064c15446', '1', 'a0143c93-59a2-487f-a098-e4e034f233d9', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:16:28', '2025-10-10 16:16:28'),
('a0143cbd-1a5c-4c10-8043-323a83837681', '2', 'a0143c93-59a2-487f-a098-e4e034f233d9', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:16:28', '2025-10-10 16:16:28'),
('a0143e05-e509-4809-af22-207c574a70bd', '1', 'a0143e05-e221-41f6-9b9c-7ecd2dd1b0ae', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:20:03', '2025-10-10 16:20:03'),
('a0143e05-e5dc-4e32-ae10-c7f1bc0cba1d', '2', 'a0143e05-e221-41f6-9b9c-7ecd2dd1b0ae', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-10 16:20:03', '2025-10-10 16:20:03'),
('a0368a82-bcd7-4225-b186-f17362fd4798', '1', 'a0368a82-b9b9-463a-a0ab-3194dd16d0ef', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 17:32:05', '2025-10-27 17:32:05'),
('a0368a82-bdd1-42ad-b8fb-2ebc67ec70eb', '2', 'a0368a82-b9b9-463a-a0ab-3194dd16d0ef', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 17:32:05', '2025-10-27 17:32:05'),
('a0368a82-bf5a-451d-986d-d2f1761f1030', '3', 'a0368a82-b9b9-463a-a0ab-3194dd16d0ef', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 17:32:05', '2025-10-27 17:32:05'),
('a036987e-806d-4109-91ae-8569e85fc46a', '1', 'a03678c3-fd3b-47e6-bc8e-eb0169923169', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 18:11:11', '2025-10-27 18:11:11'),
('a036987f-8920-4900-b489-a632a62cb12c', '2', 'a03678c3-fd3b-47e6-bc8e-eb0169923169', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 18:11:11', '2025-10-27 18:11:11'),
('a036987f-8a39-43c0-a531-7694d7ff8209', '3', 'a03678c3-fd3b-47e6-bc8e-eb0169923169', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-10-27 18:11:11', '2025-10-27 18:11:11'),
('a062de96-4e11-4465-ad07-dca6aefd8853', '1', 'a03679b8-72c9-4d3a-8244-e4b975034b93', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-18 18:23:36', '2025-11-18 18:23:36'),
('a062de96-5101-48d0-9cce-0e2e3f4e9c89', '2', 'a03679b8-72c9-4d3a-8244-e4b975034b93', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-18 18:23:36', '2025-11-18 18:23:36'),
('a062de96-51ca-4201-b0bd-41b1c78da6d9', '3', 'a03679b8-72c9-4d3a-8244-e4b975034b93', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-18 18:23:36', '2025-11-18 18:23:36'),
('a067d4b6-4741-432c-bd8c-e15c03106a0e', '1', '9ea42137-d46a-48d9-823e-e3d22c5d44be', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:35:07', '2025-11-21 05:35:07'),
('a067d4db-367f-4172-8d69-b2b5b7f6bb88', '1', '9ea42137-d883-4e62-b05f-0548114ac758', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:35:32', '2025-11-21 05:35:32'),
('a067d5ba-6a50-4665-be88-3bb821530fb0', '1', '9ea42137-d66c-4cd5-838d-549377e43f97', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:37:58', '2025-11-21 05:37:58'),
('a067d5d4-0ed5-4a0f-82b3-cdf34ae06bb7', '1', '9fe26da9-1670-4b20-8ae7-f47143900be2', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:15', '2025-11-21 05:38:15'),
('a067d5d4-10c4-4b29-b94a-4bc5fb8d2adb', '2', '9fe26da9-1670-4b20-8ae7-f47143900be2', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:15', '2025-11-21 05:38:15'),
('a067d5d4-118d-4a74-a8fe-8a61a32f4b13', '3', '9fe26da9-1670-4b20-8ae7-f47143900be2', '[\"read\"]', '2025-11-21 05:38:15', '2025-11-21 05:38:15'),
('a067d5e6-9c8b-4e34-b485-3890b99b56f7', '1', '9fe26f0d-d198-4603-bbb3-a557610f20a8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:27', '2025-11-21 05:38:27'),
('a067d5e6-9e91-4968-a376-78cad205ac38', '2', '9fe26f0d-d198-4603-bbb3-a557610f20a8', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:27', '2025-11-21 05:38:27'),
('a067d5f9-a6b1-47f1-9859-9b478ff14a31', '1', '9ea42137-daae-4b2a-b038-f1d24208bfa2', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:39', '2025-11-21 05:38:39'),
('a067d5f9-a8c3-4e50-9ec7-dc64273c2940', '2', '9ea42137-daae-4b2a-b038-f1d24208bfa2', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:39', '2025-11-21 05:38:39'),
('a067d608-eb97-40bf-86c1-9c9a15e4b41c', '1', '9ea42137-dcef-4649-9e55-f5678bdd6781', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:49', '2025-11-21 05:38:49'),
('a067d608-edc2-4c98-9d38-739da3de3989', '2', '9ea42137-dcef-4649-9e55-f5678bdd6781', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:38:49', '2025-11-21 05:38:49'),
('a067d65a-90f5-4b79-abe1-395415b47429', '1', 'a036776c-605a-4cc7-864b-758cc56f75aa', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:39:43', '2025-11-21 05:39:43'),
('a067d65a-9355-44dd-a1c6-0a82cabd48f0', '2', 'a036776c-605a-4cc7-864b-758cc56f75aa', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:39:43', '2025-11-21 05:39:43'),
('a067d65a-942e-4ed6-bc8f-1f49d125729b', '3', 'a036776c-605a-4cc7-864b-758cc56f75aa', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:39:43', '2025-11-21 05:39:43'),
('a067da99-ba29-4384-8ebd-89bb2b6074a3', '1', '9ea42137-e046-4d11-9020-bcfde6d56061', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:51:35', '2025-11-21 05:51:35'),
('a067da99-bd9c-48b0-b528-43653d5637e3', '2', '9ea42137-e046-4d11-9020-bcfde6d56061', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:51:35', '2025-11-21 05:51:35'),
('a067db16-21e5-490b-a8e0-c75f0516ea5b', '1', '9eac4822-dc63-4b88-81e6-eff75239066e', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:52:57', '2025-11-21 05:52:57'),
('a067db16-2739-4043-8579-4a0dbd12eb69', '2', '9eac4822-dc63-4b88-81e6-eff75239066e', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:52:57', '2025-11-21 05:52:57'),
('a067db16-2873-4f8a-b0cc-b75a483c37c6', '3', '9eac4822-dc63-4b88-81e6-eff75239066e', '[\"read\"]', '2025-11-21 05:52:57', '2025-11-21 05:52:57'),
('a067db24-7aef-4ccb-9ed9-1ad82cf1dcf9', '1', '9eac4467-97d5-45aa-aaf9-4ee5e080198a', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:06', '2025-11-21 05:53:06'),
('a067db24-7e82-44c9-807e-45d75fff2dbd', '2', '9eac4467-97d5-45aa-aaf9-4ee5e080198a', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:06', '2025-11-21 05:53:06'),
('a067db24-7f6c-4ff8-a419-ac2f84314ca6', '3', '9eac4467-97d5-45aa-aaf9-4ee5e080198a', '[\"read\"]', '2025-11-21 05:53:06', '2025-11-21 05:53:06'),
('a067db43-0d12-442c-b3b6-1c43127e1483', '1', '9ec054be-c7dc-40ed-bde5-988451daad40', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:26', '2025-11-21 05:53:26'),
('a067db43-1052-45a7-9bb3-d4e57bb5c934', '2', '9ec054be-c7dc-40ed-bde5-988451daad40', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:26', '2025-11-21 05:53:26'),
('a067db5e-8b90-4772-9ee7-8143580a1ef7', '1', '9eb29032-47f0-4d8a-b6e5-3e24e0da8709', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:44', '2025-11-21 05:53:44'),
('a067db5e-8df4-4feb-a96a-850c4a4bac46', '2', '9eb29032-47f0-4d8a-b6e5-3e24e0da8709', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:44', '2025-11-21 05:53:44'),
('a067db5e-8ef7-46a1-8dc8-6e931829982c', '3', '9eb29032-47f0-4d8a-b6e5-3e24e0da8709', '[\"read\"]', '2025-11-21 05:53:44', '2025-11-21 05:53:44'),
('a067db6f-8312-40a5-9980-5d0fbaa9ac69', '1', '9ec055e8-9be2-4e43-acfa-da37050b8da0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:55', '2025-11-21 05:53:55'),
('a067db6f-8609-4da3-8dcb-da9e8b670d3e', '2', '9ec055e8-9be2-4e43-acfa-da37050b8da0', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:53:55', '2025-11-21 05:53:55'),
('a067db92-def9-4d38-bf6a-d662216db347', '1', '9eb17b6d-5353-45a5-8c35-12cde02ac12f', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:19', '2025-11-21 05:54:19'),
('a067db92-e296-4a99-a7c3-eb66db1fd47f', '2', '9eb17b6d-5353-45a5-8c35-12cde02ac12f', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:19', '2025-11-21 05:54:19'),
('a067dbaa-1f5d-4b63-b835-91bf26e93a6d', '1', '9eb17e37-7d4e-47cd-92b5-89d4830f5235', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:34', '2025-11-21 05:54:34'),
('a067dbaa-21a5-4d47-882b-7168c67aa23a', '2', '9eb17e37-7d4e-47cd-92b5-89d4830f5235', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:34', '2025-11-21 05:54:34'),
('a067dbbd-7d9c-4c98-81ce-b679ba676a8a', '1', '9eb17be3-506d-460b-bf81-ae3787e7bfdf', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:47', '2025-11-21 05:54:47'),
('a067dbbd-8162-4c17-a4f2-67a29afd4298', '2', '9eb17be3-506d-460b-bf81-ae3787e7bfdf', '[\"read\",\"create\",\"update\",\"delete\"]', '2025-11-21 05:54:47', '2025-11-21 05:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `annee_fiscales`
--

DROP TABLE IF EXISTS `annee_fiscales`;
CREATE TABLE IF NOT EXISTS `annee_fiscales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annee_fiscales`
--

INSERT INTO `annee_fiscales` (`id`, `libelle`, `description`, `date_debut`, `date_fin`, `statut`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FY26', 'Année Fiscale 2026', '2025-07-01', '2026-06-30', 'En cours', '2025-09-08 18:25:09', '2025-11-21 06:39:17', NULL),
(2, 'FY26', 'Année Fiscale 2027', '2025-07-01', '2026-07-01', 'En cours', '2025-09-11 19:55:25', '2025-09-11 19:57:55', '2025-09-11 19:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` char(36) NOT NULL,
  `menu_id` char(36) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `urgency` varchar(191) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_menu_id_foreign` (`menu_id`),
  KEY `announcements_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` char(36) NOT NULL,
  `annee_fiscale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `responsable_budget_id` char(36) DEFAULT NULL,
  `responsable_budget_nom` varchar(191) DEFAULT NULL,
  `type_entite` varchar(191) DEFAULT NULL,
  `projet_id` bigint(20) DEFAULT NULL,
  `departement_id` bigint(20) DEFAULT NULL,
  `statut` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `budgets_annee_fiscale_id_foreign` (`annee_fiscale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_items`
--

DROP TABLE IF EXISTS `budget_items`;
CREATE TABLE IF NOT EXISTS `budget_items` (
  `id` char(36) NOT NULL,
  `budget_id` char(36) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `activity_description` varchar(191) DEFAULT NULL,
  `categorie_approvisionnement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sap_output_code` varchar(191) DEFAULT NULL,
  `cost_centre` varchar(191) DEFAULT NULL,
  `gl_account` varchar(191) DEFAULT NULL,
  `grant` varchar(191) DEFAULT NULL,
  `fund` varchar(191) DEFAULT NULL,
  `number_of_unit` bigint(20) DEFAULT NULL,
  `unit_of_measure` varchar(191) DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `budget_items_budget_id_foreign` (`budget_id`),
  KEY `budget_items_categorie_approvisionnement_id_foreign` (`categorie_approvisionnement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_phasing_checks`
--

DROP TABLE IF EXISTS `budget_phasing_checks`;
CREATE TABLE IF NOT EXISTS `budget_phasing_checks` (
  `id` char(36) NOT NULL,
  `budget_item_id` char(36) DEFAULT NULL,
  `month` varchar(191) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `budget_phasing_checks_budget_item_id_foreign` (`budget_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie_approvisionnements`
--

DROP TABLE IF EXISTS `categorie_approvisionnements`;
CREATE TABLE IF NOT EXISTS `categorie_approvisionnements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorie_lib` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
CREATE TABLE IF NOT EXISTS `departements` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(191) DEFAULT NULL,
  `id_manager` char(36) DEFAULT NULL,
  `manager_name` varchar(191) DEFAULT NULL,
  `manager_email` varchar(191) DEFAULT NULL,
  `directory` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `dep_name`, `id_manager`, `manager_name`, `manager_email`, `directory`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '9eae9fcb-0631-43df-bd27-b8f8f00aac27', 'User SIMPLE', 'u.simple@pt.com', NULL, '2025-04-16 17:53:46', '2025-04-17 06:07:04', '2025-04-17 06:07:04'),
(2, 'Operation-IT', '9eae9fcb-0631-43df-bd27-b8f8f00aac27', 'User SIMPLE', 'u.simple@pt.com', NULL, '2025-04-17 06:06:19', '2025-09-13 02:41:15', NULL),
(3, 'Finance', 'a068e827-7133-472c-a011-794e051f16c7', 'Rafiou ABOUDOU', 'rafiou.aboudou@plan-international.org', NULL, '2025-11-21 18:26:29', '2025-11-21 18:26:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_etapes`
--

DROP TABLE IF EXISTS `document_etapes`;
CREATE TABLE IF NOT EXISTS `document_etapes` (
  `id` char(36) NOT NULL,
  `etape_id` bigint(20) DEFAULT NULL,
  `type_document_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_etapes`
--

INSERT INTO `document_etapes` (`id`, `etape_id`, `type_document_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a02cadfb-b74b-491c-8a4f-77b7cfcacc9f', 7, 2, '2025-10-22 19:53:00', '2025-10-22 19:53:00', NULL),
('a02caf15-cbca-4ebf-bac9-3aa0f2d9413d', 8, 2, '2025-10-22 19:56:04', '2025-10-22 19:56:04', NULL),
('a02cb310-0416-4870-b9d3-4f07f85bdccf', 10, 2, '2025-10-22 20:07:11', '2025-10-22 20:07:11', NULL),
('a03082f1-ce35-4063-a617-e75b0951a01d', 32, 2, '2025-10-24 17:35:58', '2025-10-24 17:35:58', NULL),
('a0308954-d940-4117-994e-4f58e5f5f75b', 33, 2, '2025-10-24 17:53:49', '2025-10-24 17:53:49', NULL),
('a0308c46-e38d-47aa-8c7c-be833ae5016e', 35, 2, '2025-10-24 18:02:03', '2025-10-24 18:02:03', NULL),
('a0308c48-abb6-4a33-91df-a77bcd4a1812', 35, 4, '2025-10-24 18:02:04', '2025-10-24 18:02:04', NULL),
('a0308d43-4fec-4cfb-8e55-400ea1886a37', 36, 3, '2025-10-24 18:04:48', '2025-10-24 19:51:41', '2025-10-24 19:51:41'),
('a0308d43-5462-4975-856b-959394889c66', 36, 4, '2025-10-24 18:04:48', '2025-10-24 19:51:41', '2025-10-24 19:51:41'),
('a030b37b-4396-4df1-a221-359d155db7eb', 36, 2, '2025-10-24 19:51:41', '2025-10-24 19:51:41', NULL),
('a030b430-6610-4b46-8f4b-4a3ee11c000e', 31, 2, '2025-10-24 19:53:39', '2025-10-24 19:54:04', '2025-10-24 19:54:04'),
('a030b456-295e-4676-a708-2e5c4c49c75b', 31, 3, '2025-10-24 19:54:04', '2025-10-24 19:54:58', '2025-10-24 19:54:58'),
('a030b4a8-b924-46d1-b8fa-da84e2f9d54e', 31, 2, '2025-10-24 19:54:58', '2025-10-24 19:54:58', NULL),
('a030b565-687a-44d1-aa29-9cf892b9f70d', 31, 3, '2025-10-24 19:57:01', '2025-10-24 19:57:20', '2025-10-24 19:57:20'),
('a030b565-6bf0-4d01-9264-136e396f4bb7', 31, 4, '2025-10-24 19:57:01', '2025-10-24 19:57:01', NULL),
('a0366f26-13cd-45b8-b396-4c8c9606cccb', 37, 5, '2025-10-27 16:15:35', '2025-10-27 16:15:35', NULL),
('a04ab27d-ecfc-4b8c-bf20-3ac39befe3b0', 37, 2, '2025-11-06 18:00:26', '2025-11-06 18:00:26', NULL),
('a04ab27e-c113-4ca7-a928-56a40c885f20', 37, 3, '2025-11-06 18:00:26', '2025-11-06 18:00:26', NULL),
('a0611ee1-f4d9-4c5d-8e1c-d69371e29e92', 43, 6, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
('a066b58e-abdc-4ed4-8a9e-136304e22c6d', 46, 7, '2025-11-20 16:12:11', '2025-11-20 16:12:11', NULL),
('a066b5e0-3c5f-4ed4-a66e-119828f316f8', 47, 7, '2025-11-20 16:13:04', '2025-11-20 16:13:04', NULL),
('a066b651-3dbc-474f-b043-3b5ad9bb7411', 48, 5, '2025-11-20 16:14:18', '2025-11-20 16:14:18', NULL),
('a066b6cf-c692-4f6a-9d29-f81c6139535d', 49, 4, '2025-11-20 16:15:41', '2025-11-20 16:15:41', NULL),
('a066b717-4d5d-463b-b590-4458a811b380', 50, 5, '2025-11-20 16:16:28', '2025-11-20 16:16:28', NULL),
('a066b781-74db-4296-b75d-259d01b90cc1', 51, 2, '2025-11-20 16:17:38', '2025-11-20 16:17:38', NULL),
('a066b781-7792-4ce1-9c25-c3ec539eb75b', 51, 4, '2025-11-20 16:17:38', '2025-11-20 16:17:38', NULL),
('a066b781-788d-4588-a590-69540b6c298a', 51, 7, '2025-11-20 16:17:38', '2025-11-20 16:17:38', NULL),
('a068f472-60c6-4609-aee5-8850b72ccf07', 52, 8, '2025-11-21 18:59:41', '2025-11-21 18:59:41', NULL),
('a068f472-6775-416b-b101-5a27a772c72e', 52, 9, '2025-11-21 18:59:41', '2025-11-21 18:59:41', NULL),
('a06ec61f-1455-479c-b01c-e0d949449674', 55, 8, '2025-11-24 16:25:09', '2025-11-24 16:25:09', NULL),
('a06ec6d0-f947-4014-97f2-1424fdd5d829', 57, 5, '2025-11-24 16:27:04', '2025-11-24 16:27:04', NULL),
('a0713f37-1894-4fe8-b104-022ecf3a7bb0', 58, 2, '2025-11-25 21:55:24', '2025-11-25 21:55:24', NULL),
('a0713f38-4d22-4df9-8a05-29ba61f4e1f7', 58, 8, '2025-11-25 21:55:24', '2025-11-25 21:55:24', NULL),
('a0713fa0-f2ce-46b7-8b5f-2f0c020bb2df', 59, 5, '2025-11-25 21:56:32', '2025-11-25 21:56:32', NULL),
('a0713fa0-f5f8-4a8a-8ac7-5ef2bfb18772', 59, 7, '2025-11-25 21:56:32', '2025-11-25 21:56:32', NULL),
('a0714003-63a9-48dc-9086-7bb2eaa33f37', 60, 3, '2025-11-25 21:57:37', '2025-11-25 21:57:37', NULL),
('a0714048-804b-4995-b41c-93b46bdcf201', 61, 7, '2025-11-25 21:58:22', '2025-11-25 21:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_etape_uploads`
--

DROP TABLE IF EXISTS `document_etape_uploads`;
CREATE TABLE IF NOT EXISTS `document_etape_uploads` (
  `id` char(36) NOT NULL,
  `document_etape_id` char(36) DEFAULT NULL,
  `processus_engage_id` char(36) DEFAULT NULL,
  `titre` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `document_etape_uploads_processus_engage_id_foreign` (`processus_engage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_etape_uploads`
--

INSERT INTO `document_etape_uploads` (`id`, `document_etape_id`, `processus_engage_id`, `titre`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a068f6f9-8120-4344-9950-de224c5c3681', 'a068f472-60c6-4609-aee5-8850b72ccf07', 'a068f6f5-96ba-4291-90e4-aad0df41764a', 'Memo_20251120_161023_1763726804.doc', 'http://127.0.0.1:8000/storage/Operation-IT/Avance petite caisse/FY26/11-2025/Memo_20251120_161023_1763726804.doc', '2025-11-21 19:06:45', '2025-11-21 19:06:45', NULL),
('a068f6f9-84bd-48f0-a207-1c4a21ffbb2e', 'a068f472-6775-416b-b101-5a27a772c72e', 'a068f6f5-96ba-4291-90e4-aad0df41764a', 'Demande_d_avance_20251121_185631_1763726805.xlsx', 'http://127.0.0.1:8000/storage/Operation-IT/Avance petite caisse/FY26/11-2025/Demande_d_avance_20251121_185631_1763726805.xlsx', '2025-11-21 19:06:45', '2025-11-21 19:06:45', NULL),
('a06ecb9a-ccc4-454c-a969-f03d80e9f815', 'a06ec61f-1455-479c-b01c-e0d949449674', 'a06ecb97-d5d3-45bb-ba66-fd9668e83729', 'Exprssion_de_besion_20251121_185556_1763977226.doc', 'http://127.0.0.1:8000/storage/Operation-IT/Creation de compte planapps/FY26/11-2025/Exprssion_de_besion_20251121_185556_1763977226.doc', '2025-11-24 16:40:27', '2025-11-24 16:40:27', NULL),
('a071449a-16c6-464f-b303-8c7c83cb6e4c', 'a0713f37-1894-4fe8-b104-022ecf3a7bb0', 'a0714498-0b7e-4925-9161-d93408cee291', 'TDR_digitalisation A-CAT_Cordaid_VF (1)_1764083426.pdf', 'http://127.0.0.1:8000/storage/Operation-IT/Payement des Fournisseur/FY26/11-2025/TDR_digitalisation A-CAT_Cordaid_VF (1)_1764083426.pdf', '2025-11-25 22:10:26', '2025-11-25 22:10:26', NULL),
('a071449a-195e-4287-a064-b2da9ae7d080', 'a0713f38-4d22-4df9-8a05-29ba61f4e1f7', 'a0714498-0b7e-4925-9161-d93408cee291', 'Cahier_de_Charge_digitalisation_A-CAT_VF_1764083426.pdf', 'http://127.0.0.1:8000/storage/Operation-IT/Payement des Fournisseur/FY26/11-2025/Cahier_de_Charge_digitalisation_A-CAT_VF_1764083426.pdf', '2025-11-25 22:10:26', '2025-11-25 22:10:26', NULL),
('a07145f6-adf8-4f12-aa12-89b53ff625ff', 'a0713fa0-f2ce-46b7-8b5f-2f0c020bb2df', 'a0714498-0b7e-4925-9161-d93408cee291', 'DOA Finance OK.docx review (2)_1764083655.docx', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/DOA Finance OK.docx review (2)_1764083655.docx', '2025-11-25 22:14:15', '2025-11-25 22:14:15', NULL),
('a07145f6-b421-4ad3-a912-864a8db82818', 'a0713fa0-f5f8-4a8a-8ac7-5ef2bfb18772', 'a0714498-0b7e-4925-9161-d93408cee291', 'FORMULAIRE_DEMANDE_DAUTORISATION_Preuve de vie_1764083655.pdf', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/FORMULAIRE_DEMANDE_DAUTORISATION_Preuve de vie_1764083655.pdf', '2025-11-25 22:14:15', '2025-11-25 22:14:15', NULL),
('a0714744-b16c-4041-b34b-72f6d5040764', 'a0713fa0-f2ce-46b7-8b5f-2f0c020bb2df', 'a0714498-0b7e-4925-9161-d93408cee291', 'FORMULAIRE_DEMANDE_DAUTORISATION_Preuve de vie_1764083874.pdf', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/FORMULAIRE_DEMANDE_DAUTORISATION_Preuve de vie_1764083874.pdf', '2025-11-25 22:17:54', '2025-11-25 22:17:54', NULL),
('a0714744-b5b8-46c4-9474-ac69244c664a', 'a0713fa0-f5f8-4a8a-8ac7-5ef2bfb18772', 'a0714498-0b7e-4925-9161-d93408cee291', 'Exprssion_de_besion_20251121_185556_1763977226_1764083874.doc', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/Exprssion_de_besion_20251121_185556_1763977226_1764083874.doc', '2025-11-25 22:17:54', '2025-11-25 22:17:54', NULL),
('a07147cd-218c-462c-b22b-1067ff65546d', 'a0714003-63a9-48dc-9086-7bb2eaa33f37', 'a0714498-0b7e-4925-9161-d93408cee291', 'BFA-Financial Authority Limits_Sep 2025 (2)_1764083963.xlsx', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/BFA-Financial Authority Limits_Sep 2025 (2)_1764083963.xlsx', '2025-11-25 22:19:23', '2025-11-25 22:19:23', NULL),
('a0714818-b4e1-4246-b7e4-f2f39eeca9b0', 'a0714048-804b-4995-b41c-93b46bdcf201', 'a0714498-0b7e-4925-9161-d93408cee291', 'Cahier_de_Charge_digitalisation_A-CAT_VF_1764084013.pdf', 'http://127.0.0.1:8000/storage/global/Payement des Fournisseur/FY26/11-2025/Cahier_de_Charge_digitalisation_A-CAT_VF_1764084013.pdf', '2025-11-25 22:20:13', '2025-11-25 22:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GIZ', '2025-09-11 22:08:19', '2025-09-11 22:08:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
CREATE TABLE IF NOT EXISTS `etapes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `processus_id` bigint(20) DEFAULT NULL,
  `nom_etape` varchar(191) DEFAULT NULL,
  `delai` int(11) DEFAULT NULL,
  `level_id` bigint(20) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etapes`
--

INSERT INTO `etapes` (`id`, `processus_id`, `nom_etape`, `delai`, `level_id`, `ordre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Etape 1', 2, NULL, 2, NULL, '2025-10-27 16:01:54', '2025-10-27 16:01:54'),
(3, 1, 'Etape 2', 1, NULL, 3, NULL, '2025-10-27 16:01:48', '2025-10-27 16:01:48'),
(4, 1, 'Etape 3', 4, NULL, 4, NULL, '2025-10-27 16:01:36', '2025-10-27 16:01:36'),
(5, 1, 'Etape 4', 2, NULL, 6, NULL, '2025-10-27 16:01:20', '2025-10-27 16:01:20'),
(6, 1, 'Etape 5', 3, NULL, 5, NULL, '2025-10-27 16:01:27', '2025-10-27 16:01:27'),
(7, 2, 'Envoyer une requete', 3, 3, 1, '2025-10-22 19:52:54', '2025-11-03 15:40:06', NULL),
(8, 2, 'Affecter une requete', 1, 4, 2, '2025-10-22 19:56:03', '2025-10-22 19:56:03', NULL),
(9, 2, 'Traitement 1', 1, 4, 3, '2025-10-22 20:04:10', '2025-11-05 19:02:24', NULL),
(10, 2, 'Affecter une requete 2', 1, 4, 4, '2025-10-22 20:07:11', '2025-11-05 19:02:24', NULL),
(11, 2, 'Traitement 2', 7, 1, 5, '2025-10-22 20:08:31', '2025-11-05 19:00:55', NULL),
(12, 2, 'Archivage', 3, 2, 6, '2025-10-22 20:14:18', '2025-11-05 19:01:17', NULL),
(13, 2, 'uuuu', 3, 2, 7, '2025-10-22 20:17:01', '2025-11-05 19:01:03', '2025-11-05 19:01:03'),
(14, 2, 'TY', 4, 2, 8, '2025-10-22 20:20:51', '2025-11-05 19:00:02', '2025-11-05 19:00:02'),
(15, 1, 'hh', 4, 1, 7, '2025-10-22 22:27:51', '2025-10-27 16:00:41', '2025-10-27 16:00:41'),
(16, 1, 'TYoooo', 1, 2, 8, '2025-10-22 23:39:23', '2025-10-27 16:00:36', '2025-10-27 16:00:36'),
(17, 1, 'kk', 66, 1, 9, '2025-10-22 23:40:00', '2025-10-27 16:00:30', '2025-10-27 16:00:30'),
(18, 1, 'jjkkl', 22, 2, 10, '2025-10-22 23:46:20', '2025-10-27 16:00:25', '2025-10-27 16:00:25'),
(19, 2, 'jj', 6, 1, 9, '2025-10-22 23:50:25', '2025-11-05 18:59:57', '2025-11-05 18:59:57'),
(20, 2, 'HHUU', 7, 2, 10, '2025-10-22 23:51:54', '2025-11-05 18:59:47', '2025-11-05 18:59:47'),
(21, 2, 'apaoo', 33, 4, 11, '2025-10-22 23:56:51', '2025-11-05 18:59:42', '2025-11-05 18:59:42'),
(22, 1, 'Load list', 2, 1, 11, '2025-10-23 00:16:57', '2025-10-27 16:00:20', '2025-10-27 16:00:20'),
(23, 1, 'Victoire a Jésus', 2, 2, 12, '2025-10-23 00:21:44', '2025-10-27 16:00:13', '2025-10-27 16:00:13'),
(24, 1, 'Test ok', 5, 1, 13, '2025-10-23 00:37:38', '2025-10-27 16:00:07', '2025-10-27 16:00:07'),
(25, 1, 'yyy', 4, 1, 14, '2025-10-23 00:45:09', '2025-10-27 16:00:01', '2025-10-27 16:00:01'),
(26, 1, 'jjj', 8, 1, 15, '2025-10-23 00:46:22', '2025-10-27 15:59:56', '2025-10-27 15:59:56'),
(27, 1, 'Merci Seigneur', 3, 1, 16, '2025-10-23 00:54:36', '2025-10-24 20:43:11', '2025-10-24 20:43:11'),
(28, 2, 'Merci seiggneur', 66, 2, 12, '2025-10-23 00:56:28', '2025-11-05 18:59:23', '2025-11-05 18:59:23'),
(29, 2, 'ooo', 2, 2, 13, '2025-10-23 00:58:34', '2025-11-05 18:59:34', '2025-11-05 18:59:34'),
(30, 2, 'Merci Seigneur Jésus', 5, 3, 14, '2025-10-23 01:00:40', '2025-10-24 20:39:11', '2025-10-24 20:39:11'),
(31, 1, 'Theo', 23, 4, 1, '2025-10-23 19:17:43', '2025-10-27 16:02:01', '2025-10-27 16:02:01'),
(32, 1, 'TY', 4, 1, 17, '2025-10-24 17:35:56', '2025-10-24 20:42:51', '2025-10-24 20:42:51'),
(33, 1, 'Affecter une requete 5', 3, 2, 18, '2025-10-24 17:53:48', '2025-10-24 20:42:44', '2025-10-24 20:42:44'),
(34, 1, 'Affecter une requete 5', 45, 1, 19, '2025-10-24 17:54:55', '2025-10-24 20:40:52', '2025-10-24 20:40:52'),
(35, 1, 'TY', 4, 1, 20, '2025-10-24 18:01:32', '2025-10-24 20:40:34', '2025-10-24 20:40:34'),
(36, 1, 'Envoyer une requete3', 53, 4, 21, '2025-10-24 18:04:46', '2025-10-24 20:37:12', '2025-10-24 20:37:12'),
(37, 1, 'Initier un rapport naratifs', 0, 1, 1, '2025-10-27 16:15:32', '2025-11-03 15:39:40', NULL),
(38, 1, 'Revu du rapport par les conseillés', 2, 2, 2, '2025-10-27 16:18:08', '2025-10-27 16:18:08', NULL),
(39, 1, 'Revue du rapport par le PIIAM', 3, 1, 3, '2025-10-27 16:19:24', '2025-10-27 16:19:24', NULL),
(40, 1, 'Revu du rapport par le HoP', 3, 4, 4, '2025-10-27 16:21:39', '2025-10-27 16:21:39', NULL),
(41, 1, 'Revue Grant', 2, 3, 5, '2025-10-27 16:23:58', '2025-10-27 16:23:58', NULL),
(42, 1, 'Envoie du rapport au NO', 0, 3, 6, '2025-10-27 16:25:28', '2025-10-27 16:25:28', NULL),
(43, 29, 'Elaboration et envoie du travel request', 0, 3, 1, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
(44, 29, 'Validation sécu', 1, 2, 2, '2025-11-17 21:33:05', '2025-11-17 21:35:09', NULL),
(45, 29, 'Validation Supervisaue', 1, 3, 3, '2025-11-17 21:34:01', '2025-11-21 07:25:44', NULL),
(46, 30, 'Demande d\'ouverture de position', 0, 3, 1, '2025-11-20 16:12:10', '2025-11-20 16:12:10', NULL),
(47, 30, 'Valider ouverture de position', 7, 4, 2, '2025-11-20 16:13:04', '2025-11-20 16:13:04', NULL),
(48, 30, 'Elaboration JD', 5, 2, 3, '2025-11-20 16:14:18', '2025-11-20 16:14:18', NULL),
(49, 30, 'Publication', 1, 3, 4, '2025-11-20 16:15:41', '2025-11-20 16:15:41', NULL),
(50, 30, 'Selection candidat', 6, 2, 5, '2025-11-20 16:16:28', '2025-11-20 16:16:28', NULL),
(51, 30, 'Adminsitrer Test', 1, 1, 6, '2025-11-20 16:17:38', '2025-11-20 16:17:38', NULL),
(52, 31, 'Demander une avance', 0, 3, 1, '2025-11-21 18:59:41', '2025-11-21 18:59:41', NULL),
(53, 31, 'Approbation superviseur', 1, 3, 2, '2025-11-21 19:01:00', '2025-11-21 19:01:00', NULL),
(54, 31, 'Decaissement des fond', 2, 2, 3, '2025-11-21 19:02:15', '2025-11-21 19:02:29', NULL),
(55, 32, 'Demande de creation de compte', 0, 3, 1, '2025-11-24 16:25:04', '2025-11-24 16:27:37', NULL),
(56, 32, 'Creation du compte', 1, 1, 2, '2025-11-24 16:26:01', '2025-11-24 16:27:37', NULL),
(57, 32, 'Communiquer au nouveau staff', 1, 3, 3, '2025-11-24 16:27:04', '2025-11-24 16:27:04', NULL),
(58, 33, 'Reception de la facture et du BL', 0, 3, 1, '2025-11-25 21:55:21', '2025-11-25 21:55:21', NULL),
(59, 33, 'Traitement Logistique', 3, 2, 2, '2025-11-25 21:56:32', '2025-11-25 21:58:53', NULL),
(60, 33, 'Traitement Finance', 2, 4, 3, '2025-11-25 21:57:37', '2025-11-25 21:57:37', NULL),
(61, 33, 'delivrance du payemenst', 1, 3, 4, '2025-11-25 21:58:22', '2025-11-25 21:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etape_metadonnees`
--

DROP TABLE IF EXISTS `etape_metadonnees`;
CREATE TABLE IF NOT EXISTS `etape_metadonnees` (
  `id` char(36) NOT NULL,
  `etape_id` bigint(20) DEFAULT NULL,
  `libelle` varchar(191) DEFAULT NULL,
  `field_name` varchar(191) DEFAULT NULL,
  `type_donnee` varchar(191) DEFAULT NULL,
  `obligatoire` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etape_metadonnees`
--

INSERT INTO `etape_metadonnees` (`id`, `etape_id`, `libelle`, `field_name`, `type_donnee`, `obligatoire`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a02caf17-9dc3-4244-a624-9b761de4b2c4', 8, 'm1', 'm1', 'Number', 1, '2025-10-22 19:56:05', '2025-10-22 19:56:05', NULL),
('a02cb311-7297-4969-9a19-d8b72334e236', 10, 'm1', 'm1', 'Number', 1, '2025-10-22 20:07:12', '2025-10-22 20:07:12', NULL),
('a02cb311-7597-4c46-8721-1ab4a991bba1', 10, 'm2', 'm2', 'Number', 1, '2025-10-22 20:07:12', '2025-10-22 20:07:12', NULL),
('a03082f2-b013-4374-b212-ad2d9b7dcca7', 32, 'm1', 'm1', 'Texte', 1, '2025-10-24 17:35:58', '2025-10-24 17:35:58', NULL),
('a03082f2-b187-4e1e-89f0-55e52c3b030a', 32, 'T2', 't2', 'Date', 0, '2025-10-24 17:35:58', '2025-10-24 17:35:58', NULL),
('a0308d43-558b-4c60-a058-258207975bae', 36, 'y1', 'y1', 'Texte', 0, '2025-10-24 18:04:48', '2025-10-24 18:04:48', NULL),
('a0308d43-56d2-41bf-8e52-4f4a362adbdf', 36, 'E2', 'e2', 'Number', 1, '2025-10-24 18:04:48', '2025-10-24 19:51:56', '2025-10-24 19:51:56'),
('a0308d43-578e-4562-a589-bff029da13eb', 36, 'T9', 't9', 'Date', 1, '2025-10-24 18:04:48', '2025-10-24 18:04:48', NULL),
('a030b393-b58c-4228-adc9-2cab394a0618', 36, 'W2', 'w2', 'Texte', 1, '2025-10-24 19:51:56', '2025-10-24 19:51:56', NULL),
('a030b430-690b-443e-92ee-e839a88c3986', 31, 'TT', 'tt', 'Texte', 1, '2025-10-24 19:53:39', '2025-10-24 19:57:50', '2025-10-24 19:57:50'),
('a030b430-69f6-489c-804a-7f18d7662244', 31, 'AA', 'aa', 'Date', 1, '2025-10-24 19:53:39', '2025-10-24 19:53:39', NULL),
('a030b5af-84a4-435a-b574-abb17e5e4109', 31, 'ZZ', 'zz', 'Number', 1, '2025-10-24 19:57:50', '2025-10-24 19:57:50', NULL),
('a0366f3e-7338-4a36-8c16-6b695333abfd', 37, 'Commentaire PM', 'commentaire_pm', 'Texte', 0, '2025-10-27 16:15:50', '2025-10-27 16:15:50', NULL),
('a0367010-6d03-491b-a1d3-1decf5419f70', 38, 'Commentaire conseillé', 'commentaire_conseille', 'Texte', 0, '2025-10-27 16:18:08', '2025-10-27 16:18:08', NULL),
('a0367085-5871-4da1-b77a-2b3b385039ea', 39, 'Commentaire PIIAM', 'commentaire_piiam', 'Texte', 0, '2025-10-27 16:19:24', '2025-10-27 16:19:24', NULL),
('a0367153-9e5e-4ec3-9df5-58ec6ab2ecc0', 40, 'Commentaire HoP', 'commentaire_hop', 'Texte', 0, '2025-10-27 16:21:39', '2025-10-27 16:21:39', NULL),
('a0367226-d6b0-4ca6-8cff-c196910c9bd3', 41, 'Commentaire Grant', 'commentaire_grant', 'Texte', 1, '2025-10-27 16:23:58', '2025-10-27 16:23:58', NULL),
('a03672b1-332c-4683-a986-4bc0d30c1d2d', 42, 'Date d\'envoie', 'date_d_envoie', 'Date', 1, '2025-10-27 16:25:28', '2025-10-27 16:25:28', NULL),
('a060b518-7a7f-46d5-bfb5-a8c310c5c941', 37, 'Date limite', 'date_limite', 'Date', 1, '2025-11-17 16:35:56', '2025-11-17 16:35:56', NULL),
('a060b519-6eef-4568-af87-a4f1fad58989', 37, 'Type de rapport', 'type_de_rapport', 'Number', 1, '2025-11-17 16:35:56', '2025-11-17 21:42:56', '2025-11-17 21:42:56'),
('a0611ee1-fa96-4336-b32e-d29c0c179f96', 43, 'Intitulé de la mission', 'intitule_de_la_mission', 'Texte', 1, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
('a0611ee1-fbad-4a98-97d9-a37d264fb24d', 43, 'Budget', 'budget', 'Number', 1, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
('a0611ee1-fc9e-4af8-b279-5b63f1864387', 43, 'date départ', 'date_depart', 'Date', 1, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
('a0611ee1-fd8c-49eb-8336-fa99a465ab3d', 43, 'Date de retour', 'date_de_retour', 'Date', 1, '2025-11-17 21:31:43', '2025-11-17 21:31:43', NULL),
('a0611f5d-e44c-4884-b4ae-f518ae55bed7', 44, 'Commentaire', 'commentaire', 'Texte', 0, '2025-11-17 21:33:05', '2025-11-17 21:33:05', NULL),
('a0611fb3-1a03-46c1-882b-3dd834e11485', 45, 'Commentaire', 'commentaire', 'Texte', 0, '2025-11-17 21:34:01', '2025-11-17 21:34:01', NULL),
('a066b58f-73cf-4739-b320-d49e062d0b9f', 46, 'Date d\'ouverture', 'date_d_ouverture', 'Date', 1, '2025-11-20 16:12:11', '2025-11-20 16:12:11', NULL),
('a066b651-4084-413e-b42c-6fcd7a682a89', 48, 'Date de prise de service', 'date_de_prise_de_service', 'Date', 1, '2025-11-20 16:14:18', '2025-11-20 16:14:18', NULL),
('a066b6cf-c8df-487f-b867-1ab1d276d57c', 49, 'Date publication', 'date_publication', 'Date', 1, '2025-11-20 16:15:41', '2025-11-20 16:15:41', NULL),
('a066b717-5079-47bd-9264-d1151847d138', 50, 'Date selection candidat', 'date_selection_candidat', 'Date', 1, '2025-11-20 16:16:28', '2025-11-20 16:16:28', NULL),
('a066b781-79d7-4868-b52a-27450e3a72bd', 51, 'Date test', 'date_test', 'Date', 1, '2025-11-20 16:17:38', '2025-11-20 16:17:38', NULL),
('a066cb33-0cc9-45bc-b294-0da92bf70973', 47, 'Commentaire PM', 'commentaire_pm', 'Texte', 1, '2025-11-20 17:12:42', '2025-11-20 17:12:42', NULL),
('a068f472-69f7-4b95-a009-b06729b97b48', 52, 'Objet de la demande', 'objet_de_la_demande', 'Texte', 1, '2025-11-21 18:59:41', '2025-11-21 18:59:41', NULL),
('a068f472-6b78-4905-9ed7-a133beb60496', 52, 'Date expressiond de besoin', 'date_expressiond_de_besoin', 'Date', 1, '2025-11-21 18:59:41', '2025-11-21 18:59:41', NULL),
('a068f4ed-f757-4d6f-8886-4e79932f0a09', 53, 'Commentaire', 'commentaire', 'Texte', 1, '2025-11-21 19:01:03', '2025-11-21 19:01:03', NULL),
('a068f55d-5dc9-4241-a1fc-6e6aaf8f1675', 54, 'Date decaissement', 'date_decaissement', 'Date', 1, '2025-11-21 19:02:15', '2025-11-21 19:02:15', NULL),
('a06ec621-4019-499b-bdee-3cea0ad40ba5', 55, 'Nom', 'nom', 'Texte', 1, '2025-11-24 16:25:09', '2025-11-24 16:25:09', NULL),
('a06ec621-42ea-4e97-8e9b-330e2b311e41', 55, 'adresse', 'adresse', 'Texte', 1, '2025-11-24 16:25:09', '2025-11-24 16:25:09', NULL),
('a06ec621-4467-4f6f-be21-be13ee6d37ef', 55, 'Date expiration', 'date_expiration', 'Date', 1, '2025-11-24 16:25:09', '2025-11-24 16:25:09', NULL),
('a06ec670-c683-46b4-a565-d0a3105099ce', 56, 'Date de creation', 'date_de_creation', 'Date', 1, '2025-11-24 16:26:01', '2025-11-24 16:26:01', NULL),
('a06ec6d1-0127-40c2-a62a-4a5b3a50fa64', 57, 'Date communication', 'date_communication', 'Date', 1, '2025-11-24 16:27:04', '2025-11-24 16:27:04', NULL),
('a0713f38-4ebd-464e-8966-ade1153f63f4', 58, 'Nom fournisseur', 'nom_fournisseur', 'Texte', 1, '2025-11-25 21:55:24', '2025-11-25 21:55:24', NULL),
('a0713f38-505d-4876-86e3-bb5b8d813306', 58, 'Adresse Fournsseur', 'adresse_fournsseur', 'Texte', 1, '2025-11-25 21:55:24', '2025-11-25 21:55:24', NULL),
('a0713f38-512f-4b34-86b5-c105714ffdc4', 58, 'Numero IFU', 'numero_ifu', 'Texte', 1, '2025-11-25 21:55:24', '2025-11-25 21:55:24', NULL),
('a0713fa0-f779-4bdb-bdd9-a2e4a44e40a8', 59, 'Ligne budgetaire', 'ligne_budgetaire', 'Texte', 1, '2025-11-25 21:56:32', '2025-11-25 21:56:32', NULL),
('a0714003-67cd-45d3-93c8-8e2610db1ca0', 60, 'Date emission chèque', 'date_emission_cheque', 'Date', 1, '2025-11-25 21:57:37', '2025-11-25 21:57:37', NULL),
('a0714048-85a0-4d2b-ab5d-9bf5d0809f77', 61, 'Date payement', 'date_payement', 'Date', 1, '2025-11-25 21:58:22', '2025-11-25 21:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` char(36) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `menu_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `visitors` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` char(36) NOT NULL,
  `fileable_type` varchar(191) NOT NULL,
  `fileable_id` char(36) NOT NULL,
  `alias` varchar(191) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_fileable_type_fileable_id_index` (`fileable_type`,`fileable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`access`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `code`, `access`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Root User', 'root', '{\"read\":true,\"create\":true,\"delete\":true,\"update\":true}', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
(2, 'Administrator', 'admin', '{\"read\":true,\"create\":true,\"delete\":true,\"update\":true}', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
(3, 'User', 'user', '{\"read\":true,\"create\":true,\"delete\":true,\"update\":true}', '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
(4, 'Country Director', 'country-director', '{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}', '2025-10-07 16:09:22', '2025-10-07 17:25:48', NULL),
(5, 'Deputy Country Director', 'deputy-country-director', '{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}', '2025-11-21 18:22:26', '2025-11-21 18:23:26', NULL),
(6, 'Country Finance manager', 'country-finance-manager', '{\"read\":true,\"create\":true,\"update\":true,\"delete\":true}', '2025-11-21 18:23:08', '2025-11-21 18:23:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` char(36) NOT NULL,
  `loggable_type` varchar(191) NOT NULL,
  `loggable_id` char(36) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_loggable_type_loggable_id_index` (`loggable_type`,`loggable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `loggable_type`, `loggable_id`, `ip`, `user_agent`, `data`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9ea4222a-0c6b-42be-8330-2b0291eb3a0e', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-10 16:37:30', '2025-04-10 16:37:30', NULL),
('9ea659a0-b679-41a3-b1c0-0d57015858cd', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-11 19:04:15', '2025-04-11 19:04:15', NULL),
('9ea75a7a-ab63-4a23-965a-ebfb71f99749', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-12 07:02:27', '2025-04-12 07:02:27', NULL),
('9eac18ce-6b01-4895-92a6-9e43d2724326', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-14 15:37:57', '2025-04-14 15:37:57', NULL),
('9eac8070-d09d-4759-9bf5-9d9931ad2700', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-14 20:27:44', '2025-04-14 20:27:44', NULL),
('9eaca2f4-f3ca-4446-891e-2b6b5f569262', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-14 22:04:15', '2025-04-14 22:04:15', NULL),
('9ead4e8d-a4ad-4f98-b0ad-3ed3a5beb75c', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-15 06:04:05', '2025-04-15 06:04:05', NULL),
('9eae8155-b184-4e96-b77b-a8fa5b98b61f', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-15 20:21:54', '2025-04-15 20:21:54', NULL),
('9eae9c67-3e82-4230-86d5-10f00b82017f', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-15 21:37:35', '2025-04-15 21:37:35', NULL),
('9eaf4935-9af8-49b6-a904-7200a57f3de9', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-16 05:40:47', '2025-04-16 05:40:47', NULL),
('9eb0375e-a2de-4ee7-91e8-73a651cf14df', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-16 16:46:44', '2025-04-16 16:46:44', NULL),
('9eb15370-6708-4098-a4fc-ace4513fe053', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-17 06:01:03', '2025-04-17 06:01:03', NULL),
('9eb2375d-f086-4590-841b-1b25d6748fc4', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-17 16:38:23', '2025-04-17 16:38:23', NULL),
('9ebe2c9d-b246-42bd-bd61-a1563b8dac45', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-23 15:18:15', '2025-04-23 15:18:15', NULL),
('9ebe9917-9dfd-4d4f-a512-a755f9a9502f', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-23 20:21:35', '2025-04-23 20:21:35', NULL),
('9ebecb90-97d5-4a6c-b2ea-a5ddf47be3cf', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-23 22:42:42', '2025-04-23 22:42:42', NULL),
('9ec03755-bb6e-4676-91d2-e24998ce2c1f', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-24 15:39:52', '2025-04-24 15:39:52', NULL),
('9ec0b5fe-297c-45b7-8c4e-509bf10f9a4e', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-24 21:34:02', '2025-04-24 21:34:02', NULL),
('9ec0c108-d941-4e8f-b13b-2b4e833aa223', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-24 22:04:54', '2025-04-24 22:04:54', NULL),
('9ec22f7b-55dc-40ff-91cf-85e01d70ab29', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/135.0.0.0 Safari\\/537.36\"}', '2025-04-25 15:09:34', '2025-04-25 15:09:34', NULL),
('9ee688b2-7808-42c0-b044-da6ff4c0a4a3', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/136.0.0.0 Safari\\/537.36\"}', '2025-05-13 16:48:51', '2025-05-13 16:48:51', NULL),
('9f3aef38-39f1-4d84-a925-c23ab2317791', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/137.0.0.0 Safari\\/537.36\"}', '2025-06-24 15:45:04', '2025-06-24 15:45:04', NULL),
('9f4b17cc-d26c-4dc7-bbdd-f10d968d0841', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/137.0.0.0 Safari\\/537.36\"}', '2025-07-02 16:31:47', '2025-07-02 16:31:47', NULL),
('9f4d344f-51f3-4d68-b55f-4ca6c940ff9e', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/137.0.0.0 Safari\\/537.36\"}', '2025-07-03 17:43:10', '2025-07-03 17:43:10', NULL),
('9f5d4072-404f-42ca-b47b-444786880294', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/138.0.0.0 Safari\\/537.36\"}', '2025-07-11 17:10:20', '2025-07-11 17:10:20', NULL),
('9f660c69-1d4f-4fef-82c7-8edf5986335a', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/138.0.0.0 Safari\\/537.36\"}', '2025-07-16 02:07:17', '2025-07-16 02:07:17', NULL),
('9f9e70a2-a08b-436c-b438-6ff1a7cae5e4', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/138.0.0.0 Safari\\/537.36\"}', '2025-08-13 02:53:54', '2025-08-13 02:53:54', NULL),
('9fa9b293-39f7-4327-a520-9068b06ce864', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/139.0.0.0 Safari\\/537.36\"}', '2025-08-18 17:12:24', '2025-08-18 17:12:24', NULL),
('9fa9eb94-972b-4b52-8c8d-5fd0ed922f93', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/139.0.0.0 Safari\\/537.36\"}', '2025-08-18 19:51:47', '2025-08-18 19:51:47', NULL),
('9fadb623-41b9-41ff-ae3d-28c844305e0e', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/139.0.0.0 Safari\\/537.36\"}', '2025-08-20 17:05:40', '2025-08-20 17:05:40', NULL),
('9fdbf05c-8eab-41d9-a6dc-f7631a3da080', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/139.0.0.0 Safari\\/537.36\"}', '2025-09-12 16:36:33', '2025-09-12 16:36:33', NULL),
('9fdcc6f1-8413-4b96-985a-987f95f04ab7', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/139.0.0.0 Safari\\/537.36\"}', '2025-09-13 02:36:33', '2025-09-13 02:36:33', NULL),
('9fe22611-1219-47d9-a9a9-ad07aacbbf41', 'App\\Models\\User', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/140.0.0.0 Safari\\/537.36\"}', '2025-09-15 18:41:41', '2025-09-15 18:41:41', NULL),
('a067d80a-3982-41b8-8407-3f81c99df48d', 'App\\Models\\User', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/142.0.0.0 Safari\\/537.36 Edg\\/142.0.0.0\"}', '2025-11-21 05:44:26', '2025-11-21 05:44:26', NULL),
('a067da1f-5f10-43a7-9f59-3d49a2a642eb', 'App\\Models\\User', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/142.0.0.0 Safari\\/537.36 Edg\\/142.0.0.0\"}', '2025-11-21 05:50:15', '2025-11-21 05:50:15', NULL),
('a068f853-90a6-4a38-af77-e6c21f731fb6', 'App\\Models\\User', 'a068e827-7133-472c-a011-794e051f16c7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/142.0.0.0 Safari\\/537.36 Edg\\/142.0.0.0\"}', '2025-11-21 19:10:32', '2025-11-21 19:10:32', NULL),
('a06ec8af-36c6-4280-a206-ed155eff6e3b', 'App\\Models\\User', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/142.0.0.0 Safari\\/537.36 Edg\\/142.0.0.0\"}', '2025-11-24 16:32:17', '2025-11-24 16:32:17', NULL),
('a0714650-48c7-454a-9aeb-d76041119336', 'App\\Models\\User', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '{\"platform\":\"web\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/142.0.0.0 Safari\\/537.36 Edg\\/142.0.0.0\"}', '2025-11-25 22:15:14', '2025-11-25 22:15:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membres_departements`
--

DROP TABLE IF EXISTS `membres_departements`;
CREATE TABLE IF NOT EXISTS `membres_departements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `departement_id` bigint(20) NOT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membres_departements`
--

INSERT INTO `membres_departements` (`id`, `departement_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-09-11 22:15:40', '2025-09-13 02:39:06', '2025-09-13 02:39:06'),
(2, 2, '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-11-03 16:06:35', '2025-11-03 16:06:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membres_projets`
--

DROP TABLE IF EXISTS `membres_projets`;
CREATE TABLE IF NOT EXISTS `membres_projets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membres_projets`
--

INSERT INTO `membres_projets` (`id`, `projet_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-09-11 22:15:09', '2025-09-13 02:38:42', '2025-09-13 02:38:42'),
(2, 1, '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-09-13 02:42:12', '2025-09-13 02:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` char(36) NOT NULL,
  `parent_id` char(36) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `model` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'backend',
  `show` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 0,
  `maintenance` tinyint(1) NOT NULL DEFAULT 0,
  `coming_soon` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `subtitle`, `code`, `url`, `model`, `icon`, `type`, `show`, `active`, `sort`, `maintenance`, `coming_soon`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9ea42137-cd93-47f2-be86-56f7060a459a', NULL, 'Question', 'Frequently Asked Questions', 'question', 'question', 'Faq', 'fa fa-question-circle-o', 'backend', 0, 1, 8, 0, 0, '2025-04-10 16:34:51', '2025-10-27 16:39:06', NULL),
('9ea42137-d09e-44f3-a025-6d439a11c544', NULL, 'Master', 'Master', 'master', 'master', 'Models', 'fa fa-cogs', 'backend', 1, 1, 6, 0, 0, '2025-04-10 16:34:51', '2025-10-27 16:39:06', NULL),
('9ea42137-d208-4053-80fc-1ae9d9ba8fc0', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Menu', 'Menu', 'menu', 'menu', 'Menu', 'fa fa-bars', 'backend', 1, 1, 1, 0, 0, '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
('9ea42137-d46a-48d9-823e-e3d22c5d44be', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Profil', 'Level', 'level', 'level', 'Level', 'fa fa-user', 'backend', 1, 1, 2, 0, 0, '2025-04-10 16:34:51', '2025-11-21 05:35:07', NULL),
('9ea42137-d66c-4cd5-838d-549377e43f97', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Access Group', 'Access Group', 'access-group', 'access-group', 'AccessGroup', 'fa fa-shield', 'backend', 0, 1, 3, 0, 0, '2025-04-10 16:34:51', '2025-11-21 05:37:58', NULL),
('9ea42137-d883-4e62-b05f-0548114ac758', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Access Menu', 'Access Menu', 'access-menu', 'access-menu', 'AccessMenu', 'fa fa-address-card', 'backend', 0, 1, 4, 0, 0, '2025-04-10 16:34:51', '2025-11-21 05:35:32', NULL),
('9ea42137-daae-4b2a-b038-f1d24208bfa2', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Announcement', 'Manage Announcement', 'announcement', 'announcement', 'Announcement', 'fa fa-bullhorn', 'backend', 0, 1, 7, 0, 0, '2025-04-10 16:34:51', '2025-11-21 05:38:39', NULL),
('9ea42137-dcef-4649-9e55-f5678bdd6781', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Faq', 'Frequently Asked Questions', 'faq', 'faq', 'Faq', 'fa fa-question-circle', 'backend', 0, 1, 8, 0, 0, '2025-04-10 16:34:51', '2025-11-21 05:38:49', NULL),
('9ea42137-def4-4a2d-be96-b798d36c461a', NULL, 'Dashboard', 'Dashboard', 'dashboard', 'dashboard', 'Models', 'fa fa-tachometer', 'backend', 1, 1, 1, 0, 0, '2025-04-10 16:34:51', '2025-04-14 17:38:04', NULL),
('9ea42137-e046-4d11-9020-bcfde6d56061', NULL, 'User', 'User', 'user', 'user', 'User', 'fa fa-users', 'backend', 1, 1, 7, 0, 0, '2025-04-10 16:34:51', '2025-10-27 16:39:06', NULL),
('9ea42137-e17e-4e05-983b-506de9be09d0', NULL, 'Hidden Menu', NULL, 'hidden-menu', 'hidden-menu', 'Models', 'fa fa-eye-slash', 'backend', 0, 1, 9, 0, 0, '2025-04-10 16:34:51', '2025-10-27 16:39:06', NULL),
('9ea42137-e3f5-4c28-aafc-a9b0ac984ef9', '9ea42137-e17e-4e05-983b-506de9be09d0', 'Notification', 'All Notification', 'notification', 'notification', 'Notification', 'fa fa-bullhorn', 'backend', 1, 1, 1, 0, 0, '2025-04-10 16:34:51', '2025-04-10 16:34:51', NULL),
('9eac43aa-9e13-45bf-9a42-4384217865de', '9eac556b-9fb0-4875-82a2-064643c7c810', 'Office', 'Les bureaux de Plan Int. Burkina Faso', 'office', 'office', 'Office', 'fa fa-building', 'backend', 1, 1, 4, 0, 0, '2025-04-14 17:37:48', '2025-08-22 15:27:02', NULL),
('9eac4467-97d5-45aa-aaf9-4ee5e080198a', '9eac556b-9fb0-4875-82a2-064643c7c810', 'Département', 'Les départements de Plan Int. Burkina', 'departement', 'departement', 'Departement', 'fa fa-flag', 'backend', 1, 1, 2, 0, 0, '2025-04-14 17:39:52', '2025-08-22 15:27:02', NULL),
('9eac4822-dc63-4b88-81e6-eff75239066e', '9eac556b-9fb0-4875-82a2-064643c7c810', 'Projet', 'Les projets de plan', 'projet', 'projet', 'Projet', 'fa fa-product-hunt', 'backend', 1, 1, 1, 0, 0, '2025-04-14 17:50:18', '2025-08-22 15:27:02', NULL),
('9eac556b-9fb0-4875-82a2-064643c7c810', NULL, 'Organisation', NULL, '#', '#', NULL, 'fa fa-sliders', 'backend', 1, 1, 5, 0, 0, '2025-04-14 18:27:26', '2025-10-27 16:39:06', NULL),
('9eb17b6d-5353-45a5-8c35-12cde02ac12f', '9eac556b-9fb0-4875-82a2-064643c7c810', 'Structures Externes', NULL, 'struc_ext', 'struc_ext', NULL, 'fa fa-bank', 'backend', 1, 1, 5, 0, 0, '2025-04-17 07:52:51', '2025-08-22 15:27:02', NULL),
('9eb17be3-506d-460b-bf81-ae3787e7bfdf', '9eb17b6d-5353-45a5-8c35-12cde02ac12f', 'Bailleurs', 'Les Bailleurs de Plan Int. BFA', 'donor', 'donor', 'Donor', 'fa fa-handshake-o', 'backend', 1, 1, 2, 0, 0, '2025-04-17 07:54:08', '2025-04-17 08:01:04', NULL),
('9eb17e37-7d4e-47cd-92b5-89d4830f5235', '9eb17b6d-5353-45a5-8c35-12cde02ac12f', 'National Organisation', 'Les NOs de Plan', 'national-organisation', 'national-organisation', 'NationalOrganisation', 'fa fa-map-marker', 'backend', 1, 1, 1, 0, 0, '2025-04-17 08:00:40', '2025-04-17 08:01:04', NULL),
('9eb29032-47f0-4d8a-b6e5-3e24e0da8709', '9ec054be-c7dc-40ed-bde5-988451daad40', 'Membres - Projets', 'membres-projet', 'membres-projet', 'membres-projet', 'MembresProjet', 'fa fa-address-card-o', 'backend', 1, 1, 1, 0, 0, '2025-04-17 20:46:46', '2025-04-24 17:07:07', NULL),
('9ec054be-c7dc-40ed-bde5-988451daad40', '9eac556b-9fb0-4875-82a2-064643c7c810', 'Equipes', NULL, 'equipe', 'equipe', NULL, 'fa fa-users', 'backend', 1, 1, 3, 0, 0, '2025-04-24 17:02:07', '2025-08-22 15:27:02', NULL),
('9ec055e8-9be2-4e43-acfa-da37050b8da0', '9ec054be-c7dc-40ed-bde5-988451daad40', 'Membres - Départements', 'Les membres des départements - PLAN BFA', 'membres-departement', 'membres-departement', 'MembresDepartement', 'fa fa-address-card', 'backend', 1, 1, 2, 0, 0, '2025-04-24 17:05:22', '2025-04-24 17:07:07', NULL),
('9f4d4306-7ea9-4a62-9e43-4582eb828738', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', 'Année Fiscale', 'Année Fiscale', 'annee-fiscale', 'annee-fiscale', 'AnneeFiscale', 'fa fa-calendar', 'backend', 1, 1, 2, 0, 0, '2025-07-03 18:24:17', '2025-10-13 18:42:48', NULL),
('9fb1988f-83c8-4b96-a122-f5f6b729ced3', NULL, 'Planning', NULL, 'planning', 'planning', NULL, 'fa fa-calendar', 'backend', 1, 1, 3, 0, 0, '2025-08-22 15:26:16', '2025-10-27 16:39:06', NULL),
('9fb19954-cf3d-4a48-93f9-73f0e780b4c8', '9fb1988f-83c8-4b96-a122-f5f6b729ced3', 'Budget', 'Budget', 'budget', 'budget', 'Budget', 'fa fa-money', 'backend', 1, 1, 1, 0, 0, '2025-08-22 15:28:25', '2025-10-13 18:42:48', NULL),
('9fe26da9-1670-4b20-8ae7-f47143900be2', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Modules', 'Modules application', 'module', 'module', 'Module', 'fa fa-cubes', 'backend', 0, 1, 5, 0, 0, '2025-09-15 22:01:52', '2025-11-21 05:38:15', NULL),
('9fe26f0d-d198-4603-bbb3-a557610f20a8', '9ea42137-d09e-44f3-a025-6d439a11c544', 'Roles', 'Les roles', 'role', 'role', 'Role', 'fa fa-check-circle', 'backend', 0, 1, 6, 0, 0, '2025-09-15 22:05:46', '2025-11-21 05:38:27', NULL),
('a0143b76-487e-48b7-8aeb-2b0afc754e9e', NULL, 'Workflow', 'Workflow', 'workflow', 'workflow', NULL, 'fa fa-code-fork', 'backend', 1, 1, 4, 0, 0, '2025-10-10 16:12:54', '2025-10-27 16:39:06', NULL),
('a0143c93-59a2-487f-a098-e4e034f233d9', 'a0143b76-487e-48b7-8aeb-2b0afc754e9e', 'Processus', 'Les processus de Plan BFA', 'processus', 'processus', 'Processus', 'fa fa-exchange', 'backend', 1, 1, 1, 0, 0, '2025-10-10 16:16:01', '2025-10-10 16:16:50', NULL),
('a0143e05-e221-41f6-9b9c-7ecd2dd1b0ae', 'a0143b76-487e-48b7-8aeb-2b0afc754e9e', 'Type de document', 'Les types de documents', 'type-document', 'type-document', 'TypeDocument', 'fa fa-file-text-o', 'backend', 1, 1, 2, 0, 0, '2025-10-10 16:20:03', '2025-10-10 16:20:18', NULL),
('a036776c-605a-4cc7-864b-758cc56f75aa', NULL, 'Mes Processus', 'Mes processus', '#mesprocessus', '#mesprocessus', NULL, 'fa fa-exchange', 'backend', 1, 1, 2, 0, 0, '2025-10-27 16:38:42', '2025-10-27 16:39:06', NULL),
('a03678c3-fd3b-47e6-bc8e-eb0169923169', 'a036776c-605a-4cc7-864b-758cc56f75aa', 'Initier un processus', 'Nouvelle requête', 'initier', 'processus-engage/initier', 'ProcessusEngage', 'fa fa-magic', 'backend', 1, 1, 1, 0, 0, '2025-10-27 16:42:27', '2025-10-27 18:11:09', NULL),
('a03679b8-72c9-4d3a-8244-e4b975034b93', 'a036776c-605a-4cc7-864b-758cc56f75aa', 'Traitements', 'Traitements', 'traitements', 'processus-engage/traitements', 'ProcessusEngage', 'fa fa-retweet', 'backend', 1, 1, 2, 0, 0, '2025-10-27 16:45:08', '2025-11-18 18:23:36', NULL),
('a0368a82-b9b9-463a-a0ab-3194dd16d0ef', '9ea42137-e17e-4e05-983b-506de9be09d0', 'Processus Engagés', 'Processus Engages', 'processus-engage', 'processus-engage', 'ProcessusEngage', 'fa fa-arrow-right', 'backend', 0, 1, 2, 0, 0, '2025-10-27 17:32:05', '2025-10-27 17:32:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_01_01_000000_create_access_groups_table', 1),
(3, '2023_01_01_000000_create_levels_table', 1),
(4, '2023_01_01_000001_create_users_table', 1),
(5, '2023_01_01_000004_create_failed_jobs_table', 1),
(6, '2023_01_10_112612_create_menus_table', 1),
(7, '2023_02_05_095311_create_access_menus_table', 1),
(8, '2023_02_06_070950_create_files_table', 1),
(9, '2023_02_09_075306_create_faqs_table', 1),
(10, '2023_02_20_083047_create_logs_table', 1),
(11, '2023_03_07_065613_create_announcements_table', 1),
(12, '2023_06_07_111952_create_notifications_table', 1),
(15, '2025_04_14_164749_create_departements_table', 2),
(16, '2025_04_14_171237_create_projets_table', 2),
(17, '2025_04_14_184337_add_statu_to_users_table', 3),
(18, '2025_04_14_184806_add_statu_to_user_2', 4),
(19, '2025_04_14_185345_add_office_to_user', 5),
(32, '2025_04_14_202416_create_offices_table', 6),
(33, '2025_04_15_062539_update_id_office', 6),
(34, '2025_04_17_061032_create_donors_table', 6),
(35, '2025_04_17_061243_create_national_organisations_table', 6),
(36, '2025_04_17_175441_create_membres_departements_table', 6),
(37, '2025_04_17_175555_create_membres_projets_table', 6),
(38, '2025_07_03_182045_create_annee_fiscales_table', 6),
(39, '2025_08_20_034956_create_categorie_approvisionnements_table', 6),
(40, '2025_08_20_041232_create_budgets_table', 7),
(41, '2025_08_20_043201_create_budget_items_table', 8),
(42, '2025_08_20_044036_create_budget_phasing_checks_table', 8),
(43, '2025_09_15_205502_create_modules_table', 9),
(45, '2025_09_15_212920_create_roles_table', 10),
(47, '2025_09_15_214616_create_user_roles_table', 11),
(48, '2025_10_02_163236_create_processuses_table', 12),
(52, '2025_10_07_172725_create_etapes_table', 13),
(53, '2025_10_07_205459_create_type_documents_table', 13),
(54, '2025_10_07_205934_create_document_etapes_table', 13),
(55, '2025_10_07_235153_create_processus_engages_table', 14),
(56, '2025_10_08_001345_create_document_etape_uploads_table', 14),
(57, '2025_10_08_003131_create_user_assigne_etapes_table', 14),
(58, '2025_10_21_225407_create_etape_metadonnees_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lib_module` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `lib_module`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Budget', '2025-09-15 22:07:31', '2025-09-15 22:07:31', NULL),
(2, 'Plan d\'action', '2025-09-15 22:07:44', '2025-09-15 22:07:44', NULL),
(3, 'Acquistion', '2025-09-15 22:08:22', '2025-09-15 22:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `national_organisations`
--

DROP TABLE IF EXISTS `national_organisations`;
CREATE TABLE IF NOT EXISTS `national_organisations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `short_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_organisations`
--

INSERT INTO `national_organisations` (`id`, `short_name`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DNO', 'Denemark National Organization', '2025-09-11 22:07:48', '2025-09-11 22:07:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` char(36) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `user_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id_office` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `office_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_office`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id_office`, `office_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Country Office BFA', '2025-11-13 04:15:23', '2025-11-13 04:15:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processuses`
--

DROP TABLE IF EXISTS `processuses`;
CREATE TABLE IF NOT EXISTS `processuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lib_processus` varchar(191) DEFAULT NULL,
  `collection_name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processuses`
--

INSERT INTO `processuses` (`id`, `lib_processus`, `collection_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rapportage Naratif Projet', 'rapportage_naratif_projet', 'Le processus de rapportage naratif projet est le processus qui à pour but de soumettre un rapport naratif d\'une periode bien determiné d\'un projet au NO et au bailleur. Il est initié par le chef de projet puis révisé par les conseillés, les PIIAM et le Head of Programme. Le processus se termine lorsque les Grants envoie le documents', '2025-10-10 17:13:36', '2025-11-17 18:03:01', NULL),
(2, 'Rapportage Financier Projet', 'rapportage_financier_projet', 'Le processus de rapportage financier projet est le processus qui à pour but de soumettre un rapport financierd\'une periode bien determiné d\'un projet au NO et au bailleur. Il est initié par le chef de projet puis révisé par le business analyste et le CFM. Le processus se termine lorsque les Grants envoie le rapport au bailleur et au NO', '2025-10-10 17:14:37', '2025-11-17 18:08:17', NULL),
(29, 'Travel Request', 'travel_request', 'Processus de validation des travel request', '2025-11-17 21:26:36', '2025-11-17 21:26:36', NULL),
(30, 'Recrutement Staff', 'recrutement_staff', 'Ce processus vis à .....', '2025-11-20 16:08:27', '2025-11-20 16:08:27', NULL),
(31, 'Avance petite caisse', 'avance_petite_caisse', 'Ce processus permet à un staff de prendre une avance', '2025-11-21 18:53:53', '2025-11-21 18:53:53', NULL),
(32, 'Creation de compte planapps', 'creation_de_compte_planapps', 'Il s\'agit du processus de creation des compte des nous SAP', '2025-11-24 15:25:54', '2025-11-24 15:25:54', NULL),
(33, 'Payement des Fournisseur', 'payement_des_fournisseur', 'Payement des fournisseur de Plan', '2025-11-25 21:51:55', '2025-11-25 21:51:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `processus_engages`
--

DROP TABLE IF EXISTS `processus_engages`;
CREATE TABLE IF NOT EXISTS `processus_engages` (
  `id` char(36) NOT NULL,
  `type_entite` varchar(191) DEFAULT NULL,
  `entite_id` bigint(20) DEFAULT NULL,
  `processus_id` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `etape_id` bigint(20) DEFAULT NULL,
  `etat` varchar(191) DEFAULT NULL,
  `initiate_by` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processus_engages`
--

INSERT INTO `processus_engages` (`id`, `type_entite`, `entite_id`, `processus_id`, `description`, `etape_id`, `etat`, `initiate_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a068f6f5-96ba-4291-90e4-aad0df41764a', 'departement', 2, 31, 'Demande d\'avance du 21/11/2025', 54, 'Terminé', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-11-21 19:06:43', '2025-11-21 19:14:57', NULL),
('a06ecb97-d5d3-45bb-ba66-fd9668e83729', 'departement', 2, 32, 'Compte pour le nouveau CD', 57, 'En cours', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-11-24 16:40:26', '2025-11-24 16:43:01', NULL),
('a0714498-0b7e-4925-9161-d93408cee291', 'departement', 2, 33, 'Payement d\'un routeur', 61, 'Terminé', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', '2025-11-25 22:10:25', '2025-11-25 22:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(191) DEFAULT NULL,
  `full_name` text DEFAULT NULL,
  `short_name` varchar(191) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `national_organisation_id` int(11) DEFAULT NULL,
  `country_office` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `grant_end_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `gik` varchar(191) DEFAULT NULL,
  `tracking_fad` varchar(191) DEFAULT NULL,
  `name_framework` text DEFAULT NULL,
  `approved_country_cost_ratio` decimal(8,2) DEFAULT NULL,
  `direct_cost` double DEFAULT NULL,
  `apportioned_cost` double DEFAULT NULL,
  `no_cost_in_co_buget` double DEFAULT NULL,
  `id_manager` char(36) DEFAULT NULL,
  `manager_name` varchar(191) DEFAULT NULL,
  `manager_email` varchar(191) DEFAULT NULL,
  `directory` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`id`, `code`, `full_name`, `short_name`, `donor_id`, `national_organisation_id`, `country_office`, `start_date`, `grant_end_date`, `project_end_date`, `gik`, `tracking_fad`, `name_framework`, `approved_country_cost_ratio`, `direct_cost`, `apportioned_cost`, `no_cost_in_co_buget`, `id_manager`, `manager_name`, `manager_email`, `directory`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BFA100400', 'BUUIII', 'OSEE', 1, 1, 'PLAN INT BFA', '2025-09-01', '2025-09-30', NULL, 'Yes', 'Yes', 'Name', 10000.00, 10000, 1000, 10000, '9eae9fcb-0631-43df-bd27-b8f8f00aac27', 'User SIMPLE', 'u.simple@pt.com', NULL, '2025-09-11 22:11:03', '2025-09-13 02:40:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `lib_role` varchar(191) DEFAULT NULL,
  `code_role` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_module_id_foreign` (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `module_id`, `lib_role`, `code_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Submit Budget', '', '2025-09-29 17:32:32', '2025-09-29 18:16:55', NULL),
(2, 1, 'Approve budget', '', '2025-09-29 17:32:55', '2025-09-29 18:17:12', NULL),
(3, 1, 'Reject budget', '', '2025-09-29 18:16:16', '2025-09-29 18:17:24', NULL),
(4, 2, 'Submit PA', '', '2025-09-29 18:16:29', '2025-09-29 18:17:56', NULL),
(5, 2, 'Approve PA', '', '2025-09-29 18:18:22', '2025-09-29 18:18:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_documents`
--

DROP TABLE IF EXISTS `type_documents`;
CREATE TABLE IF NOT EXISTS `type_documents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre_type` varchar(191) DEFAULT NULL,
  `template` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_documents`
--

INSERT INTO `type_documents` (`id`, `titre_type`, `template`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Requisition', 'C:\\Users\\Stephane\\AppData\\Local\\Temp\\phpAD4B.tmp', '2025-10-10 16:23:35', '2025-10-10 16:42:43', '2025-10-10 16:42:43'),
(2, 'Requisition', 'http://127.0.0.1:8000/storage/templates/Requisition_20251010_164256.xlsx', '2025-10-10 16:42:57', '2025-10-10 16:42:57', NULL),
(3, 'Lettre de motivation', 'http://127.0.0.1:8000/storage/templates/Lettre_de_motivation_20251010_170813.pdf', '2025-10-10 17:08:13', '2025-10-10 17:08:13', NULL),
(4, 'Lettre de motivation', 'http://127.0.0.1:8000/storage/templates/Lettre_de_motivation_20251015_184350.pdf', '2025-10-15 18:43:51', '2025-11-21 18:54:47', '2025-11-21 18:54:47'),
(5, 'Rapport naratif de projet', 'http://127.0.0.1:8000/storage/templates/Rapport_naratif_de_projet_20251027_160935.docx', '2025-10-27 16:09:35', '2025-10-27 16:09:35', NULL),
(6, 'Travel request', 'http://127.0.0.1:8000/storage/templates/Travel_request_20251117_212856.doc', '2025-11-17 21:28:56', '2025-11-17 21:28:56', NULL),
(7, 'Memo', 'http://127.0.0.1:8000/storage/templates/Memo_20251120_161023.doc', '2025-11-20 16:10:24', '2025-11-20 16:10:24', NULL),
(8, 'Exprssion de besion', 'http://127.0.0.1:8000/storage/templates/Exprssion_de_besion_20251121_185556.doc', '2025-11-21 18:55:56', '2025-11-21 18:55:56', NULL),
(9, 'Demande d\'avance', 'http://127.0.0.1:8000/storage/templates/Demande_d_avance_20251121_185631.xlsx', '2025-11-21 18:56:31', '2025-11-21 18:56:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `statu` int(11) DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_office` bigint(11) DEFAULT NULL,
  `access_group_id` char(36) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_level_id_foreign` (`level_id`),
  KEY `users_access_group_id_foreign` (`access_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `statu`, `level_id`, `id_office`, `access_group_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'User', 'Root', 'stephane.bazie@plan-international.org', NULL, '$2y$10$mn7CSpYIvC/IadshE/tpeOuMzIUUqCtEXC/5OYvKoW3rUJFb5jLVG', 1, 1, 1, '1', 'S3X6A0NyMwSXqmEHzSRSyjmyRiSx7DGPJbGqi67njL81HUrsQdP4s5ovtvt9', '2025-04-10 16:34:51', '2025-11-20 20:39:41', NULL),
('9eae9fcb-0631-43df-bd27-b8f8f00aac27', 'User', 'SIMPLE', 'baziestephane@gmail.com', NULL, '$2y$10$4cAL3YD3j45Jv3.C77iFyOhAZGYemmQjpEHwFyMUqdJH4sE8DwSje', 1, 4, 1, '3', NULL, '2025-04-15 21:47:03', '2025-11-20 20:39:54', NULL),
('a067d7b0-2595-47ed-9200-4b871fe20ed2', 'Wendyam', 'Bazie', 'wendyam.bazie@gmail.com', NULL, '$2y$10$MYtirfMgiLrbm2ymt2.EnOzSmNnsT9KO5nf0w/8l1hOSkPMgIfAZC', 1, 2, 1, '3', NULL, '2025-11-21 05:43:27', '2025-11-21 05:43:27', NULL),
('a068e827-7133-472c-a011-794e051f16c7', 'Rafiou', 'ABOUDOU', 'rafiou.aboudou@plan-international.org', NULL, '$2y$10$GA1lQD80/5jdXFFeR.NSYOqi.hJkllnHSxU/SC9MZsJ1D2nQTelk2', 1, 5, 1, '3', NULL, '2025-11-21 18:25:19', '2025-11-21 18:25:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_assigne_etapes`
--

DROP TABLE IF EXISTS `user_assigne_etapes`;
CREATE TABLE IF NOT EXISTS `user_assigne_etapes` (
  `id` char(36) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `processus_engage_id` char(36) DEFAULT NULL,
  `assignate_by` char(36) DEFAULT NULL,
  `etape_id` bigint(20) DEFAULT NULL,
  `date_assignation` date DEFAULT NULL,
  `approbation` varchar(191) DEFAULT NULL,
  `date_approbation` date DEFAULT NULL,
  `commentaire` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_assigne_etapes_user_id_foreign` (`user_id`),
  KEY `user_assigne_etapes_processus_engage_id_foreign` (`processus_engage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_assigne_etapes`
--

INSERT INTO `user_assigne_etapes` (`id`, `user_id`, `processus_engage_id`, `assignate_by`, `etape_id`, `date_assignation`, `approbation`, `date_approbation`, `commentaire`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a068f6f9-8674-45fd-be7f-19632c02962e', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a068f6f5-96ba-4291-90e4-aad0df41764a', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 52, '2025-11-21', 'OUI', NULL, NULL, '2025-11-21 19:06:45', '2025-11-21 19:06:45', NULL),
('a068f6f9-8874-4837-bc57-129b6228f986', 'a068e827-7133-472c-a011-794e051f16c7', 'a068f6f5-96ba-4291-90e4-aad0df41764a', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 53, '2025-11-21', 'OUI', NULL, NULL, '2025-11-21 19:06:45', '2025-11-21 19:12:50', NULL),
('a068f925-6e37-4c3a-94d7-bad3edd2a784', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a068f6f5-96ba-4291-90e4-aad0df41764a', 'a068e827-7133-472c-a011-794e051f16c7', 54, '2025-11-21', 'OUI', NULL, NULL, '2025-11-21 19:12:50', '2025-11-21 19:14:57', NULL),
('a06ecb9a-cd8d-474b-ae32-0cfa5a713cf5', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a06ecb97-d5d3-45bb-ba66-fd9668e83729', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 55, '2025-11-24', 'OUI', NULL, NULL, '2025-11-24 16:40:27', '2025-11-24 16:40:27', NULL),
('a06ecb9a-cf20-49b1-a680-c1f651919ebe', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a06ecb97-d5d3-45bb-ba66-fd9668e83729', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 56, '2025-11-24', 'OUI', NULL, NULL, '2025-11-24 16:40:27', '2025-11-24 16:43:01', NULL),
('a06ecc85-a438-4f5c-9981-e233474cfb0b', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', 'a06ecb97-d5d3-45bb-ba66-fd9668e83729', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 57, '2025-11-24', NULL, NULL, NULL, '2025-11-24 16:43:01', '2025-11-24 16:43:01', NULL),
('a071449a-1a75-4351-97ee-03aff3699e50', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a0714498-0b7e-4925-9161-d93408cee291', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 58, '2025-11-25', 'OUI', NULL, NULL, '2025-11-25 22:10:26', '2025-11-25 22:10:26', NULL),
('a071449a-1b70-40eb-8117-2a603d071da7', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a0714498-0b7e-4925-9161-d93408cee291', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 59, '2025-11-25', 'OUI', NULL, NULL, '2025-11-25 22:10:26', '2025-11-25 22:14:15', NULL),
('a07145f6-b6a2-4473-afeb-3e0cec254aa1', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', 'a0714498-0b7e-4925-9161-d93408cee291', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 60, '2025-11-25', 'NON', NULL, NULL, '2025-11-25 22:14:15', '2025-11-25 22:16:35', NULL),
('a07146cb-f595-412f-a952-8dd4c11ba401', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a0714498-0b7e-4925-9161-d93408cee291', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', 59, '2025-11-25', 'OUI', NULL, NULL, '2025-11-25 22:16:35', '2025-11-25 22:17:54', NULL),
('a0714744-b85a-4ccc-9d5a-34797732d44a', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', 'a0714498-0b7e-4925-9161-d93408cee291', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 60, '2025-11-25', 'OUI', NULL, NULL, '2025-11-25 22:17:54', '2025-11-25 22:19:23', NULL),
('a07147cd-24bd-4251-97cc-ab58452fed09', '2bf2fbf8-8ab7-4c07-97a5-c8bc88b6f9e4', 'a0714498-0b7e-4925-9161-d93408cee291', 'a067d7b0-2595-47ed-9200-4b871fe20ed2', 61, '2025-11-25', 'OUI', NULL, NULL, '2025-11-25 22:19:23', '2025-11-25 22:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` char(36) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_menus`
--
ALTER TABLE `access_menus`
  ADD CONSTRAINT `access_menus_access_group_id_foreign` FOREIGN KEY (`access_group_id`) REFERENCES `access_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `access_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `announcements_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_annee_fiscale_id_foreign` FOREIGN KEY (`annee_fiscale_id`) REFERENCES `annee_fiscales` (`id`);

--
-- Constraints for table `budget_items`
--
ALTER TABLE `budget_items`
  ADD CONSTRAINT `budget_items_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`),
  ADD CONSTRAINT `budget_items_categorie_approvisionnement_id_foreign` FOREIGN KEY (`categorie_approvisionnement_id`) REFERENCES `categorie_approvisionnements` (`id`);

--
-- Constraints for table `budget_phasing_checks`
--
ALTER TABLE `budget_phasing_checks`
  ADD CONSTRAINT `budget_phasing_checks_budget_item_id_foreign` FOREIGN KEY (`budget_item_id`) REFERENCES `budget_items` (`id`);

--
-- Constraints for table `document_etape_uploads`
--
ALTER TABLE `document_etape_uploads`
  ADD CONSTRAINT `document_etape_uploads_processus_engage_id_foreign` FOREIGN KEY (`processus_engage_id`) REFERENCES `processus_engages` (`id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_access_group_id_foreign` FOREIGN KEY (`access_group_id`) REFERENCES `access_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_assigne_etapes`
--
ALTER TABLE `user_assigne_etapes`
  ADD CONSTRAINT `user_assigne_etapes_processus_engage_id_foreign` FOREIGN KEY (`processus_engage_id`) REFERENCES `processus_engages` (`id`),
  ADD CONSTRAINT `user_assigne_etapes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

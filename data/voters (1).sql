-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2021 at 05:13 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1319006_bro`
--

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `holder_addr` varchar(42) NOT NULL,
  `voting_power` int(11) NOT NULL,
  `opt_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `proposal_id`, `holder_addr`, `voting_power`, `opt_id`, `created_at`) VALUES
(13, 1, '0x4e0843e8daa53406121588feebf0cde0f1fcefc1', 39, 13, '2021-12-06 16:28:21'),
(14, 2, '0x4e0843e8daa53406121588feebf0cde0f1fcefc1', 39, 16, '2021-12-06 18:38:40'),
(15, 2, '0xf5383b4e0d3edda3b6c091e51abe58f882c98ce3', 1, 16, '2021-12-07 17:53:50'),
(16, 2, '0x3d5188ad2353e24634fbfc651b9978485bf02e52', 7, 16, '2021-12-07 21:26:09'),
(17, 1, '0x3d5188ad2353e24634fbfc651b9978485bf02e52', 7, 11, '2021-12-07 21:26:23'),
(18, 2, '0x63a3f0d978d49febc1d94d00cd1e38355d77e09b', 1, 16, '2021-12-07 21:41:26'),
(19, 1, '0x63a3f0d978d49febc1d94d00cd1e38355d77e09b', 1, 13, '2021-12-07 21:41:46'),
(20, 2, '0xfeb727d1ab42bd163eaf7bacfb5155d54eeaa1b3', 1, 16, '2021-12-07 21:47:12'),
(21, 1, '0xfeb727d1ab42bd163eaf7bacfb5155d54eeaa1b3', 1, 13, '2021-12-07 21:47:26'),
(22, 2, '0xd3646b8e1278b938765ce8cbfe19369b6212b935', 1, 16, '2021-12-07 21:52:09'),
(23, 1, '0xd3646b8e1278b938765ce8cbfe19369b6212b935', 1, 12, '2021-12-07 21:53:59'),
(24, 1, '0x9daea748b52acd41e055fbb7e3985625f080b7a7', 5, 13, '2021-12-07 22:08:05'),
(25, 2, '0x9daea748b52acd41e055fbb7e3985625f080b7a7', 5, 16, '2021-12-07 22:08:15'),
(26, 2, '0x43cdf87f7ed22e243e6324deb283dc86defa89ba', 12, 16, '2021-12-07 22:19:50'),
(27, 1, '0x43cdf87f7ed22e243e6324deb283dc86defa89ba', 12, 11, '2021-12-07 22:20:19'),
(28, 2, '0x53c56147f56968b0a029c6413de0b03664b2dc53', 5, 16, '2021-12-07 22:25:03'),
(29, 1, '0x53c56147f56968b0a029c6413de0b03664b2dc53', 5, 12, '2021-12-07 22:27:13'),
(30, 1, '0x05eb81ca1490e0202398cd36950ff9323370ae4c', 8, 12, '2021-12-07 22:28:15'),
(31, 2, '0x05eb81ca1490e0202398cd36950ff9323370ae4c', 8, 16, '2021-12-07 22:28:41'),
(32, 2, '0xa4c9abe021d9079ee37d1c95a99d30fb9f783b4d', 3, 16, '2021-12-07 22:44:08'),
(33, 1, '0xa4c9abe021d9079ee37d1c95a99d30fb9f783b4d', 3, 13, '2021-12-07 22:44:25'),
(34, 2, '0x5a67e661ff008b3728593d415269b4e94f48040d', 2, 16, '2021-12-07 23:02:00'),
(35, 1, '0x5a67e661ff008b3728593d415269b4e94f48040d', 2, 11, '2021-12-07 23:05:42'),
(36, 2, '0xd49e8b1a9ac9b32570f91911a6a6a2bae0524902', 3, 16, '2021-12-07 23:06:49'),
(37, 1, '0xd49e8b1a9ac9b32570f91911a6a6a2bae0524902', 3, 11, '2021-12-07 23:07:16'),
(38, 2, '0xf74bb54823e60604d7e961444a4bef4cecc67c97', 24, 16, '2021-12-07 23:12:51'),
(39, 1, '0xf74bb54823e60604d7e961444a4bef4cecc67c97', 24, 13, '2021-12-07 23:13:05'),
(40, 2, '0x080353f64c6d7c8a4a592c6211224a5f4060fc53', 5, 16, '2021-12-08 00:47:26'),
(41, 1, '0xe892c77b96068b7da7ffaec494f1893134e55cd0', 1, 13, '2021-12-08 02:04:07'),
(42, 2, '0x1a414c8c94f7efdebcc2c0e8d02bf8d1da61d696', 2, 16, '2021-12-08 02:11:28'),
(43, 1, '0x1a414c8c94f7efdebcc2c0e8d02bf8d1da61d696', 2, 13, '2021-12-08 02:11:44'),
(44, 2, '0x1ad958123e501ebc867e8a8b65b98705eacbcd1f', 1, 16, '2021-12-08 02:26:43'),
(45, 1, '0x1ad958123e501ebc867e8a8b65b98705eacbcd1f', 1, 13, '2021-12-08 02:28:45'),
(46, 1, '0x080353f64c6d7c8a4a592c6211224a5f4060fc53', 5, 12, '2021-12-09 00:36:44'),
(47, 2, '0x631857e975cbea9e3107d69b805d4af9ea50eb88', 24, 16, '2021-12-12 04:11:53'),
(48, 2, '0xe9ee28c62281ce52e3ff5b5de6fadd08d0af11ba', 1, 16, '2021-12-12 04:13:18'),
(49, 2, '0x90e6bccf52fcbc7f835f5055404ce4a7bde0b2e3', 1, 16, '2021-12-12 04:17:33'),
(50, 2, '0x0b3f687e12b5194894cad97e87f155e9bbb4fbfa', 5, 16, '2021-12-12 04:22:37'),
(51, 2, '0x98ce912ea90388950bab6779dd104db6f2d540ed', 4, 15, '2021-12-12 05:31:43'),
(52, 2, '0x85ded585afd6d613b05ea3cea8d1a0138dae80c4', 1, 16, '2021-12-12 05:32:22'),
(53, 2, '0x5a16f60de002088d24122d238d132a08bf294fbf', 6, 16, '2021-12-12 05:34:16'),
(54, 2, '0xe892c77b96068b7da7ffaec494f1893134e55cd0', 1, 16, '2021-12-12 05:34:31'),
(55, 2, '0xf94ba062308ea92f7ab3cf55c4b410339717c74d', 1, 16, '2021-12-12 05:35:47'),
(56, 2, '0xcb5c730a85795b20c1fdb543b64b2ed164333803', 4, 16, '2021-12-12 05:37:14'),
(57, 2, '0x2c3bd732f1250e0105468a447676bb5a44c2869f', 1, 16, '2021-12-12 05:39:00'),
(58, 2, '0x1cab42555e264afa05051f5497b511a4b23200ff', 3, 16, '2021-12-12 05:43:39'),
(59, 2, '0x7e4a82326dcb5f40851dcf67b145a3ee68fb1d19', 2, 14, '2021-12-12 05:44:02'),
(60, 2, '0x60d405eb506452c133e01ee6a583ad4c5903aef9', 2, 14, '2021-12-12 05:59:07'),
(61, 2, '0xe658fc68f3334bf037c7b647bec6e7ca4b8e258a', 2, 16, '2021-12-12 05:59:26'),
(62, 2, '0x1fa339a12970a7c4f4da0a1cf1a24df9de4f8dae', 3, 16, '2021-12-12 06:08:20'),
(63, 2, '0xfb11f321f49a944c0e72f510bd584e4cc05a444b', 1, 16, '2021-12-12 06:18:01'),
(64, 2, '0x8693975917c99642938cf9481ac6829bf625de71', 1, 16, '2021-12-12 06:18:30'),
(65, 2, '0xe7b622e9a313e79a7b693485f0f5878740bc9249', 6, 16, '2021-12-12 06:40:51'),
(66, 2, '0x3430428804265db32b6ec54bb72fb0db3de31268', 1, 16, '2021-12-12 06:43:54'),
(67, 2, '0xf23e879edc94dd6efb71f0ccd3f0f752181661d1', 1, 16, '2021-12-12 06:45:39'),
(68, 2, '0x53314890b62273f75770bce5f2d6f1b6a7ed5cb7', 3, 16, '2021-12-12 06:51:52'),
(69, 2, '0x31e1d07361eb1806cda134c12b1bbbdd6ad7008d', 2, 16, '2021-12-12 06:56:41'),
(70, 2, '0x8f3fc038da33e825e763624384f123bfaf543818', 3, 16, '2021-12-12 07:00:42'),
(71, 2, '0x77771eb9efc4ffd5e8dc2eb952fbba20aee5975c', 1, 16, '2021-12-12 07:34:57'),
(72, 2, '0x38360bec8f9e1e11e115f760a1f26cc8e2a047fa', 1, 16, '2021-12-12 08:29:30'),
(73, 2, '0x3421fbacd45c4df3f08ef88a77343db47f130808', 1, 16, '2021-12-12 09:07:39'),
(74, 2, '0x4a413645f725ce16d6c0401e69c4021072d99983', 2, 16, '2021-12-12 09:22:30'),
(75, 2, '0x9c21764efdcbb604dcfcd974bd48164e301bee15', 1, 16, '2021-12-12 10:06:44'),
(76, 2, '0x47e3c182228d1dfd97e269f0c3ed39d40527f5c3', 1, 15, '2021-12-12 10:18:39'),
(77, 2, '0x9fd987a5e2428b9f683fecbff1e62fdffbae2046', 1, 16, '2021-12-12 10:35:52'),
(78, 2, '0x8214cdfb750b68fb3e57287e440b72211c96d0ba', 2, 16, '2021-12-12 10:54:32'),
(79, 2, '0x05b3e5ac87955a526a7ff8589c595bca81d4a341', 1, 16, '2021-12-12 11:06:43'),
(80, 2, '0x3ad23d89b0334c926a4fe0546baeaecd8566265f', 1, 16, '2021-12-12 11:07:13'),
(81, 2, '0x8090446c8288821477aafcb5f901fb975042edfd', 1, 16, '2021-12-12 11:42:12'),
(82, 2, '0x6c10e56522cafcaf220a9e5bb666e1d84102accb', 4, 16, '2021-12-12 12:03:43'),
(83, 2, '0xadb5ba21a4fc210e27ba443496a629d02452cd4c', 1, 16, '2021-12-12 12:15:04'),
(84, 2, '0x589231fce4456f09093f1cd3dd4d292f7d93d19f', 1, 16, '2021-12-12 12:33:37'),
(85, 2, '0x09306cfea01e396f89de0ee00474657b4c86d55b', 2, 16, '2021-12-12 13:04:05'),
(86, 2, '0x869b17fb35709bf9e8db65da600ebf6dc8aaddea', 1, 16, '2021-12-12 13:31:10'),
(87, 2, '0xc9de9f55e3f2a92e7d2e3bb0255765f2a88ef531', 1, 16, '2021-12-12 14:16:05'),
(88, 2, '0xeeadbc75edf512463df88ad25e289fc812585d4c', 1, 16, '2021-12-12 14:55:28'),
(89, 2, '0xab35becb4f0cfc408300131e802b9c51e868c5d8', 3, 16, '2021-12-12 15:37:18'),
(90, 2, '0xa14e18092beaa7196e794c339b81a54c8042fc1f', 1, 16, '2021-12-12 15:46:13'),
(91, 2, '0xaa20f7e1841cd90f99374ebba0a9f0e789ee686a', 1, 16, '2021-12-12 17:40:46'),
(92, 2, '0xf29a0b06bb927f6a58c6f3bba40c88cf305aacc7', 5, 15, '2021-12-12 17:51:45'),
(93, 2, '0xd2a7db4ad93d8a26e1024e2faa47f75b49d65228', 1, 16, '2021-12-12 18:19:01'),
(94, 2, '0x8d033ec65dcfd6fcccef68b1f4c895d1e88dc580', 1, 16, '2021-12-12 18:31:15'),
(95, 2, '0x724d2671550055b29ceecb91eaa9db46fda76880', 1, 15, '2021-12-12 18:58:57'),
(96, 2, '0x173a32983e78ab434a625d8e8174cbb084ebef0d', 2, 16, '2021-12-12 19:21:20'),
(97, 2, '0x046659bb263fd831e3e1383e7acb6c37b622b29f', 4, 16, '2021-12-12 20:20:48'),
(98, 2, '0x88b1460bc44733e700922cd2f9b4682e0b4905ad', 1, 16, '2021-12-12 23:10:38'),
(99, 2, '0x2edb4912041b9b5820d743623a2f4cc73dc38794', 1, 16, '2021-12-12 23:37:50'),
(100, 2, '0x009f40514aea4a2a6ba6535acf156703ea4345a9', 1, 16, '2021-12-13 00:26:07'),
(101, 2, '0xa9b9a28bec2e0dedcae6905a9408615250905550', 1, 16, '2021-12-13 00:49:15'),
(102, 2, '0xaf0daf65664922b0124287c256ae826d2e0b767a', 2, 16, '2021-12-13 02:29:55'),
(103, 2, '0x9b930c9289f4172ade3ac4ea0bc508c3eaed38ca', 1, 16, '2021-12-13 05:10:51'),
(104, 2, '0x80d9d98856d34b9df209af0e15d28f22673d2873', 3, 16, '2021-12-13 05:59:27'),
(105, 2, '0x2b9165d0569d0240b75e73675019bb8638404b90', 2, 16, '2021-12-13 07:20:48'),
(106, 2, '0x99bd572ba703acd5b0f5ee66cee344d095f47c28', 2, 16, '2021-12-13 07:56:33'),
(107, 2, '0x46eb5e1fc80b29a010df1b55aa0e2900225851ed', 1, 16, '2021-12-13 09:51:18'),
(108, 2, '0x43c8356fe2732512fffdde3c5beaf0f629a118cd', 1, 16, '2021-12-13 10:01:08'),
(109, 2, '0x6073b7411205d3ff4d3d8dcc52f01d3059c12670', 1, 16, '2021-12-13 10:36:08'),
(110, 2, '0xe4013b5bba21556cc1f30a581cb0b5d0e98a56b0', 1, 16, '2021-12-13 13:43:16'),
(111, 2, '0x900663b76d58e20587be71f69d8a9ce4a5090826', 1, 16, '2021-12-13 15:35:30'),
(112, 2, '0x1e2306fb9949e61938b70e6c576cde92bb35bb6f', 1, 16, '2021-12-13 16:56:15'),
(113, 2, '0x1a8ebf1cd455e111d88096a4488eaaf7a86fec47', 1, 16, '2021-12-13 17:52:08'),
(114, 2, '0x09b167622a5dcbabf6147fa624679704347657d8', 2, 16, '2021-12-14 01:10:53'),
(115, 2, '0x91f25cb40c9a22cee2a03efa9ae5ca1c48256418', 1, 16, '2021-12-14 02:11:40'),
(116, 2, '0x2f64b9c5e4b24eef6c2003406302f0dd92ae9b56', 2, 15, '2021-12-14 03:42:36'),
(117, 2, '0x4c0b01574cf36c2234f572dc873a8b6380b3366e', 1, 16, '2021-12-14 12:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
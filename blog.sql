-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2020 lúc 09:40 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'máy tính', 0, '2020-05-11 00:11:25', '2020-05-11 00:11:25'),
(2, 'điện thoại', 0, '2020-05-11 00:11:32', '2020-05-11 00:11:32'),
(5, 'xoa', 0, '2020-05-11 00:19:46', '2020-05-11 00:19:46'),
(6, 'aaa', 1, '2020-05-11 01:57:31', '2020-05-11 01:57:31'),
(7, 'aaaaa', 2, '2020-05-11 01:57:44', '2020-05-11 01:57:44'),
(8, 'bbbb', 6, '2020-05-11 20:01:26', '2020-05-11 20:01:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_05_06_044450_create_posts_table', 1),
(13, '2020_05_07_022747_create_categories_table', 1),
(14, '2020_05_07_024930_add_category_id_to_posts_table', 1),
(15, '2020_05_07_085054_edit_category_id_to_posts_table', 1),
(16, '2020_05_07_102651_create_post_category_table', 1),
(17, '2020_05_07_103417_del_category_id_to_posts_table', 1),
(18, '2020_05_08_022623_add_foreign_to_post_category_table', 1),
(19, '2020_05_12_022047_add_role_to_post_category_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(4, 'tieu đề 12', 'tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1tieu đề 1', 'images/lfZBe99gAOyLKT09yao7CuKNBmS864FeppVXI2zg.jpeg', '2020-05-11 00:15:38', '2020-05-11 00:20:23'),
(5, 'Tiêu ddề', 'noi dung 1noi dung 1noi dung 1noi dung 1noi dung 1noi dung 1noi dung 1', 'images/no-image.png', '2020-05-11 00:20:57', '2020-05-11 00:42:28'),
(6, 'them moi 1them moi', 'them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1them moi 1', 'images/t5p905dy8LY8mRP6f9LGXarS5zRIEcQVXXQ4l29w.jpeg', '2020-05-11 00:53:20', '2020-05-11 00:53:47'),
(7, 'them 1 them 1 them 1them 1', 'them 1 them 1 them 1 them 1 them 1 them 1 them 1 them 1', 'images/fSd8r5GHNdJMUKWh3cXWmhqf0LclYXgmA6ImQSRu.jpeg', '2020-05-11 00:57:19', '2020-05-11 00:57:55'),
(8, 'THEM', 'THEM THEM THEM THEM THEM THEM THEM', 'images/no-image.png', '2020-05-11 00:59:25', '2020-05-11 00:59:25'),
(9, 'THEM THEM', 'THEM THEM THEM THEM THEM THEM THEM THEM THEM', 'storage/images/XdIwjeKOtBEHjkUGpyDXUYkiihy07Jq07RKZurO2.jpeg', '2020-05-11 01:01:09', '2020-05-11 01:54:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_category`
--

CREATE TABLE `post_category` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `hot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`, `hot`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2020-05-11 00:20:23', '2020-05-11 00:20:23'),
(4, 2, 0, '2020-05-11 00:20:23', '2020-05-11 00:20:23'),
(4, 5, 0, '2020-05-11 00:20:23', '2020-05-11 00:20:23'),
(5, 2, 0, '2020-05-11 00:42:28', '2020-05-11 00:42:28'),
(5, 5, 0, '2020-05-11 00:42:28', '2020-05-11 00:42:28'),
(6, 1, 1, '2020-05-11 00:53:47', '2020-05-11 00:53:47'),
(6, 2, 0, '2020-05-11 00:53:47', '2020-05-11 00:53:47'),
(7, 1, 1, '2020-05-11 00:57:55', '2020-05-11 00:57:55'),
(7, 2, 0, '2020-05-11 00:57:55', '2020-05-11 00:57:55'),
(7, 5, 0, '2020-05-11 00:57:55', '2020-05-11 00:57:55'),
(8, 1, 0, '2020-05-11 00:59:26', '2020-05-11 00:59:26'),
(8, 2, 1, '2020-05-11 00:59:26', '2020-05-11 00:59:26'),
(9, 1, 1, '2020-05-11 01:54:58', '2020-05-11 01:54:58'),
(9, 5, 0, '2020-05-11 01:54:58', '2020-05-11 01:54:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'phuoc1111', 'phuctran@gmail.com2', NULL, '$2y$10$eUJJMk4Vi.XUVsXAcwblvunogJIC2LQv3OPszXOupicnUA60HOaMy', NULL, 1, '2020-05-12 01:21:43', '2020-05-12 02:44:54'),
(5, 'phuocphuoc111', 'phuoctrank51a6@gmail.com', NULL, '$2y$10$yew2rM.0yEnKD2aSDZepxep3prNf..tEdHdA/y/NJCa1Lt2XWBtb.', NULL, 1, '2020-05-12 02:24:32', '2020-05-12 23:42:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD KEY `post_category_post_id_foreign` (`post_id`),
  ADD KEY `post_category_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_category_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

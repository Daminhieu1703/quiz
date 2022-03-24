-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2022 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2-asm1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `content`, `is_correct`, `question_id`) VALUES
(209, 'Phương Anh Lê', 1, 83),
(210, 'Yên bái', 1, 83),
(211, 'Hương Mít', 1, 83),
(212, 'Cả 3 đáp án trên đều đúng ', 2, 83),
(213, 'Bò sữa Ba Vì', 1, 84),
(214, 'Người yêu của em Tuyết', 1, 84),
(215, 'Đối thủ của Khánh', 1, 84),
(216, 'Cả 3 đáp án trên đều đúng ', 2, 84),
(217, 'Người yêu của bé Tuyết', 1, 85),
(218, 'Phú Xuyên', 1, 85),
(219, 'Nát rượu', 1, 85),
(220, 'Cả 3 đáp án trên đều đúng ', 2, 85),
(221, 'Fuck boy', 1, 86),
(222, 'Ninh Bình', 1, 86),
(223, 'Mua rau giá 10tr 1 mớ', 1, 86),
(224, 'Cả 3 đáp án trên đều đúng ', 2, 86),
(225, 'Hưng Yên', 1, 87),
(226, 'Trùm vô duyên', 1, 87),
(227, 'Trùm ỉa', 1, 87),
(228, 'Cả 3 đáp án trên đều đúng ', 2, 87),
(229, 'Phú Xuyên', 1, 88),
(230, 'Lầm lì', 1, 88),
(231, 'Trùm soi gái', 1, 88),
(232, 'Cả 3 đáp án trên đều đúng ', 2, 88),
(233, 'Trùm PTS', 1, 89),
(234, 'Sóc Sơn', 1, 89),
(235, 'Trùm FrontEnd', 1, 89),
(236, 'Cả 3 đáp án trên đều đúng ', 2, 89);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `quiz_id`, `img`) VALUES
(83, 'Đức là ai ?', 29, ''),
(84, 'Tuyền là ai ?', 29, ''),
(85, 'Khánh là ai ?', 29, ''),
(86, 'Phố là ai ?', 30, ''),
(87, 'Toản là ai ?', 30, ''),
(88, 'Hùng là ai', 30, ''),
(89, 'Thế anh là ai ?', 29, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_shuffle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quizs`
--

INSERT INTO `quizs` (`id`, `name`, `subject_id`, `duration_minutes`, `start_time`, `end_time`, `status`, `is_shuffle`) VALUES
(29, 'quiz 1', 3, 2, '2022-02-19 00:00:00', '2022-02-20 00:00:00', 2, 0),
(30, 'quiz 1', 5, 12, '2022-02-17 00:00:00', '2022-02-24 00:00:00', 2, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Sinh Viên'),
(2, 'Giáo Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quizs`
--

CREATE TABLE `student_quizs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` float(2,1) DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quizs`
--

INSERT INTO `student_quizs` (`id`, `student_id`, `quiz_id`, `start_time`, `end_time`, `score`) VALUES
(488, 22, 30, '2022-02-20 15:45:04', '2022-02-20 15:45:07', 0.0),
(492, 22, 30, '2022-02-21 20:30:33', '2022-02-21 20:30:45', 9.9),
(494, 22, 30, '2022-02-21 21:39:09', '2022-02-21 21:39:17', 3.3),
(496, 27, 30, '2022-02-21 21:42:58', '2022-02-21 21:43:04', 9.9),
(498, 27, 30, '2022-02-21 21:43:40', '2022-02-21 21:43:46', 3.3),
(500, 28, 30, '2022-02-21 21:46:14', '2022-02-21 21:46:38', 6.7),
(501, 22, 29, '2022-02-21 21:50:35', '2022-02-21 21:50:42', 3.3),
(502, 22, 29, '2022-02-21 21:51:00', '2022-02-21 21:51:05', 9.9),
(503, 27, 29, '2022-02-21 21:51:39', '2022-02-21 21:51:44', 6.7),
(504, 28, 29, '2022-02-21 21:52:06', '2022-02-21 21:52:10', 9.9),
(505, 28, 30, '2022-02-22 12:11:12', '2022-02-22 12:11:20', 9.9),
(506, 30, 29, '2022-02-22 12:46:23', '2022-02-22 12:46:37', 7.5),
(507, 22, 29, '2022-02-26 16:55:02', '2022-02-26 16:55:45', 9.9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz_detail`
--

CREATE TABLE `student_quiz_detail` (
  `student_quiz_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quiz_detail`
--

INSERT INTO `student_quiz_detail` (`student_quiz_id`, `quiz_id`, `answer_id`) VALUES
(492, 30, 224),
(492, 30, 228),
(492, 30, 232),
(494, 30, 224),
(494, 30, 227),
(494, 30, 229),
(496, 30, 224),
(496, 30, 228),
(496, 30, 232),
(498, 30, 223),
(498, 30, 227),
(498, 30, 232),
(500, 30, 224),
(500, 30, 227),
(500, 30, 232),
(501, 29, 209),
(501, 29, 215),
(501, 29, 220),
(502, 29, 212),
(502, 29, 216),
(502, 29, 220),
(503, 29, 209),
(503, 29, 216),
(503, 29, 220),
(504, 29, 212),
(504, 29, 216),
(504, 29, 220),
(505, 30, 224),
(505, 30, 228),
(505, 30, 232),
(506, 29, 212),
(506, 29, 216),
(506, 29, 220),
(506, 29, 233),
(507, 29, 212),
(507, 29, 216),
(507, 29, 220),
(507, 29, 236);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `author_id`) VALUES
(3, 'Hỏi khéo phần 1', 14),
(5, 'Hỏi khéo phần 2', 14),
(31, 'Hỏi khéo phần 3', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role_id`) VALUES
(14, 'Đàm Minh Hiếu', 'admin@gmail.com', '$2y$10$GO.LS8haw7CLdLBrngDYIebfVdYYuo29FsF95Ls.mJc8j20c9SRt2', 'http://localhost/web16305-php2/asm1/app/views/img/MSHX1307.JPG', 2),
(22, 'Triệu Việt Đức', 'sv1@gmail.com', '$2y$10$VOWqP53uLT/t7QFAPQK8w.WaMDP5UIktH3BtUUrujrt.soHiVImlO', 'http://localhost/web16305-php2/asm1/app/views/img/ductv.jpg', 1),
(27, 'Phạm Quốc Toản', 'sv2@gmail.com', '$2y$10$Hzau7VqXJal4BKvIgpOO/uQrwOl1TxJU0QSCUctvjNcYWKu6c7fFK', 'http://localhost/web16305-php2/asm1/app/views/img/tỏn.JPG', 1),
(28, 'Lại Đức Phố', 'sv3@gmail.com', '$2y$10$bJ0Q6Nw4/AkOmFAhAd1ZH.w4YXIj14QpFGKsEiyY/x0lSzr9X4z3O', 'http://localhost/web16305-php2/asm1/app/views/img/phố.JPG', 1),
(30, 'Lê Duy Khánh', 'sv4@gmail.com', '$2y$10$WWtkX7ikmAHi6E2QIoliRuHGL43NW0ZpHeRAM7Eo9fOkU4Uf9Jy5e', 'http://localhost/web16305-php2/asm1/app/views/img/avatar_empty.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_ibfk_1` (`question_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Chỉ mục cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_quizs_ibfk_1` (`student_id`);

--
-- Chỉ mục cho bảng `student_quiz_detail`
--
ALTER TABLE `student_quiz_detail`
  ADD PRIMARY KEY (`student_quiz_id`,`quiz_id`,`answer_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  ADD CONSTRAINT `student_quizs_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `student_quiz_detail`
--
ALTER TABLE `student_quiz_detail`
  ADD CONSTRAINT `student_quiz_detail_ibfk_1` FOREIGN KEY (`student_quiz_id`) REFERENCES `student_quizs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

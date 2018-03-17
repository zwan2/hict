-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- 생성 시간: 17-09-04 22:43
-- 서버 버전: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP 버전: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `hict`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `booking_state` tinyint(1) DEFAULT NULL,
  `admin_name` char(10) DEFAULT NULL,
  `admin_tel` char(15) DEFAULT NULL,
  `message` text,
  `receive_time` datetime NOT NULL,
  `student_number` int(9) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `tel` char(15) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `total_number` tinyint(4) DEFAULT NULL,
  `purpose` char(50) DEFAULT NULL,
  `tool` char(50) DEFAULT NULL,
  `extra` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `fail_check`
--

CREATE TABLE `fail_check` (
  `fail_ip` char(20) NOT NULL DEFAULT '',
  `fail_time` int(10) UNSIGNED DEFAULT NULL,
  `fail_count` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `student_number` int(9) NOT NULL DEFAULT '0',
  `password` char(32) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `tel` char(15) DEFAULT NULL,
  `admin_code` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`student_number`, `password`, `name`, `email`, `tel`, `admin_code`) VALUES
(111111111, '11IWZMdz/zKm6', 'ì˜ˆì•½ìž', '', '00000000000', 0),
(201310259, '10A0Rjf1CoRwM', 'ê¹€ë¯¼ì² ', 'mcdosacm@naver.com', '01026303531', 0),
(201310274, 'dnlcGiiloxHpQ', 'ì´ìƒì›', 'cloudy777@naver.com', '01075801069', 0),
(201310283, '126TaMedNX0Nc', 'ì´íœ˜ì˜', '', '01022997533', 0),
(201371055, 'laOpYXyPa5Mzg', 'ì „ì¤€í˜„', '', '01030147923', 0),
(201510050, 'xk8Kp.kF9I3Qw', 'ìµœì†Œì˜', '', '01025338461', 0),
(201510111, 'wl37Q3p9TKZQc', 'ì´ì§€ì—°', 'ljy6557@naver.com', '01064362324', 1),
(201510711, 'ehD1z/LWaTPRM', 'ì¡°ìž¬ì°¬', 'jjc123a@naver.com', '01076783790', 1),
(201511810, 'go84tHo07Y0QA', 'ìµœì˜ˆë‚˜', 'heht0414@naver.com', '01074114261', 1),
(201512098, '11IWZMdz/zKm6', 'ì •ì§„ì„±', '', '01038449586', 0),
(201610111, 'trqDrnSxhdVZo', 'ìž„í˜„ê²½', '', '01040140141', 1),
(201610131, 'juUDl1ajSfYQg', 'ìµœíš¨ë¯¼', 'hmc97@naver.com', '01056400973', 0),
(201611570, 'thP.Hd4HIaAgk', 'ì´ìž¬ì™„', '2zwan@naver.com', '01097703679', 1),
(201611828, 'hjihqdMfS3tTQ', 'ì¡°í™”ì›', 'whghkdnjs11@naver.com', '01063892699', 1),
(201612219, 'lkfF0VNg31d42', 'ê²½í•˜', '', '010-4785-8415', 1),
(201613100, 'gkAv0rv84IYwE', 'í•œê±´í¬', '', '01054716890', 0),
(999999999, 'yoRmcFoV6Rvnc', 'ì´ìž¬ì™„', '', '010-9999-9999', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(10) UNSIGNED NOT NULL,
  `title` text,
  `content` text,
  `write_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- 테이블의 인덱스 `fail_check`
--
ALTER TABLE `fail_check`
  ADD PRIMARY KEY (`fail_ip`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`student_number`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

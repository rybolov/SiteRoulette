-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2010 at 10:01 PM
-- Server version: 5.0.51
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `database_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `redirect_links`
--

CREATE TABLE IF NOT EXISTS `redirect_links` (
  `id` smallint(3) NOT NULL auto_increment,
  `url` varchar(1500) collate utf8_unicode_ci NOT NULL,
  `weight` smallint(3) unsigned NOT NULL,
  `comment` varchar(1500) collate utf8_unicode_ci NOT NULL,
  `active` enum('y','n') collate utf8_unicode_ci default 'y',
  `iphone` enum('y','n') collate utf8_unicode_ci default 'y',
  `android` enum('y','n') collate utf8_unicode_ci default 'y',
  `blackberry` enum('y','n') collate utf8_unicode_ci default 'y',
  `mobileonly` enum('y','n') collate utf8_unicode_ci default 'n',
  `linux` enum('y','n') collate utf8_unicode_ci default 'y',
  `windows` enum('y','n') collate utf8_unicode_ci default 'y',
  `mac` enum('y','n') collate utf8_unicode_ci default 'y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;

--
-- Dumping data for table `redirect_links`
--

INSERT INTO `redirect_links` (`url`, `weight`, `comment`, `active`, `iphone`, `android`, `mobileonly`) VALUES
('http://www.google.com', 1, 'Test Site', 'y', 'y', 'y', 'n'),
('http://www.guerilla-ciso.com/', 1, 'Test Site', 'y', 'y', 'y', 'n');

-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2010 at 05:18 PM
-- Server version: 5.0.51
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db975077-main`
--

-- --------------------------------------------------------

--
-- Table structure for table `qr_redirect_links`
--

CREATE TABLE IF NOT EXISTS `qr_redirect_links` (
  `id` smallint(3) NOT NULL auto_increment,
  `url` varchar(1500) collate utf8_unicode_ci NOT NULL,
  `weight` smallint(3) unsigned NOT NULL,
  `comment` varchar(1500) collate utf8_unicode_ci NOT NULL,
  `active` enum('y','n') collate utf8_unicode_ci default 'y',
  `iphone` enum('y','n') collate utf8_unicode_ci default 'y',
  `android` enum('y','n') collate utf8_unicode_ci default 'y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;


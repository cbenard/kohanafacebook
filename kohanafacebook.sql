-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2010 at 05:44 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kohanadryrun`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebookid` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `facebookid`) VALUES
(1, '160000389');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(500) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `dateposted`, `name`, `content`) VALUES
(1, '2010-12-01 21:01:32', 'Rosa Parks Arrested', '<p>\r\nJust a few months after Emmett Till''s murder, a 43-year-old civil rights activist, Rosa Parks, refuses to give up her seat on a segregated bus in Montgomery, Alabama, and is arrested. Parks'' arrest inspires black leaders to mount a one-day bus boycott. With the help of Jo Ann Robinson of the Women''s Political Council, 40,000 people are organized in just two days.</p>\r\n<p>\r\nOn the night of December 5, 1955, elated at the day''s success in emptying the buses, boycotters assemble at the Holt Street Baptist Church and vote to keep the protest going. A main speaker is a new minister in town, 26-year-old Reverend Martin Luther King, Jr. Because he has no history with the town leaders, other ministers, including Ralph Abernathy and Fred Shuttlesworth, persuade King to lead the Montgomery Improvement Association and the boycott. King delivers an inspiring speech, saying, "If we are wrong, the Constitution of the United States is wrong."\r\n</p>\r\n<p>\r\nThe boycott lasts until December 1956. Boycotters walk and rely on volunteer drivers in a carpool system to get where they need to go, and gain strength in nightly mass meetings. The bus company suffers economically; violence erupts; bombs are thrown at organizers'' homes; and the white Citizens Council and the Ku Klux Klan hold rallies. At last, a Supreme Court decision integrates the buses, and soon thousands of black riders are on the buses again -- sitting where they please.</p>'),
(2, '2010-11-08 21:02:28', 'Abraham Lincoln elected to second term', '<p>Lincoln warned the South in his Inaugural Address: "In your hands, my dissatisfied fellow countrymen, and not in mine, is the momentous issue of civil war. The government will not assail you.... You have no oath registered in Heaven to destroy the government, while I shall have the most solemn one to preserve, protect and defend it."\r\n</p><p>\r\nLincoln thought secession illegal, and was willing to use force to defend Federal law and the Union. When Confederate batteries fired on Fort Sumter and forced its surrender, he called on the states for 75,000 volunteers. Four more slave states joined the Confederacy but four remained within the Union. The Civil War had begun.\r\n</p><p>\r\nThe son of a Kentucky frontiersman, Lincoln had to struggle for a living and for learning. Five months before receiving his party''s nomination for President, he sketched his life.</p>'),
(3, '2010-10-01 21:02:46', 'Henry Ford introduces Model T into the market', '<p>Henry Ford did not invent the automobile or the assembly line. He did, however, change the world by using an assembly line technique to produce cars which could be afforded by everyone. From 1909 to 1927, the Ford Motor Company built more than 15 million Model T cars. Without a doubt, Henry Ford transformed the economic and social fabric of the 20th century.</p>\r\n<p>Source: <a href="http://www.modelt.ca/background.html">http://www.modelt.ca/background.html</a></p>');

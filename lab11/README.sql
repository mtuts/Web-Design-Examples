-- Copy this file contents into MySQL and execute it in order to create database and tables

CREATE DATABASE IF NOT EXISTS `cpit405_lab11` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cpit405_lab11`;

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `Chassis` bigint(10) NOT NULL,
  `Manufacturer` varchar(15) NOT NULL,
  `Model` varchar(15) NOT NULL,
  `Year` int(4) NOT NULL,
  `Color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Chassis`, `Manufacturer`, `Model`, `Year`, `Color`) VALUES
(63531, 'Jeep', 'Jeep', 2016, 'Blue'),
(855524, 'mitsubishi', 'lancer', 2014, 'white'),
(5642521, 'Chevrolet', 'Malibo', 2013, 'Black'),
(48808252, 'Chevrolet', 'Cruze', 2010, 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Chassis`);


--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(40) NOT NULL,
    `last_name` VARCHAR(40) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `birth_date` DATE NOT NULL,
    `gender` BOOLEAN NOT NULL DEFAULT TRUE,
    `password` VARCHAR(128) NOT NULL,
    `phone` VARCHAR(15) NULL DEFAULT NULL,
    `address` VARCHAR(200) NULL DEFAULT NULL,
    `last_update` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8;


--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`first_name`, `last_name`, `email`, `birth_date`, `gender`, `password`, `last_update`) VALUES
("Demo", 'User', 'demo@user', '2000-01-19', 0, SHA2('123', 512), NOW()),
("Ahmad", 'Ali', 'ahmad@kau', '1999-12-02', 1, SHA2('ahmad', 512), NOW());

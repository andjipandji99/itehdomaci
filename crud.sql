-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 01:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pozoriste`
--

CREATE TABLE `pozoriste` (
  `id` varchar(255) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pozoriste`
--

INSERT INTO `pozoriste` (`id`, `naziv`) VALUES
('1', 'Atelje 212'),
('2', 'Beogradsko dramsko pozoriste'),
('3', 'Narodno pozoriste'),
('4', 'Jugoslovensko dramsko pozoriste');

-- --------------------------------------------------------

--
-- Table structure for table `predstave`
--

CREATE TABLE `predstave` (
  `id` int(11) NOT NULL,
  `pozoriste` varchar(255) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `zanr` varchar(255) NOT NULL,
  `mesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predstave`
--

INSERT INTO `predstave` (`id`, `pozoriste`, `naziv`, `zanr`, `mesta`) VALUES
(12, '1', 'Nocna straza', 'Komedija', 300),
(13, '2', 'Kad su cvetale tikve', 'Drama', 600),
(14, '2', 'Gospodja ministarka', 'Komedija', 400),
(15, '4', 'Ruzni, prljavi, zli', 'Drama', 200),
(16, '3', 'Crna kutija', 'Drama', 200),
(18, '4', 'Sumrak bogova', 'Drama', 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pozoriste`
--
ALTER TABLE `pozoriste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predstave`
--
ALTER TABLE `predstave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk` (`pozoriste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predstave`
--
ALTER TABLE `predstave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `predstave`
--
ALTER TABLE `predstave`
  ADD CONSTRAINT `Fk` FOREIGN KEY (`pozoriste`) REFERENCES `pozoriste` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

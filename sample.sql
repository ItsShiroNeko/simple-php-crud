SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item` varchar(64) NOT NULL,
  `stock` char(30) NOT NULL,
  `used` char(30) NOT NULL,
  `total` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `item` (`id`, `item`, `stock`, `used`, `total`) VALUES
(5, 'Chain Sling', '12', '5', 17),
(6, 'galvanized square steel', '5', '20', 25),
(7, 'Eco Friendly Wood', '20', '5', 25);


CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
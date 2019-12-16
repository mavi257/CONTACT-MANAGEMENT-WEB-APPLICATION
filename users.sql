

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Contactname` varchar(64) NOT NULL,
  `Contactemail` varchar(128) NOT NULL,
  `Contactphone` varchar(24) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `contact` ( `Contactname`, `Contactemail`, `Contactphone`, `dt`) VALUES
('Zaid Khalid', 'zaid@gmail.com', '876-564-6544', '2019-02-12 06:22:25'),
('Usman', 'usman@gmail.com', '887-655-8745', '2019-02-12 06:22:43'),
('Jhon', 'jhon@gmail.com', '878-874-6523', '2019-02-12 06:22:57'),
('Zohaib', 'zohaib@gmail.com', '878-652-6985', '2019-02-12 06:23:20'),
('Akram', 'akram@gmail.com', '324-985-3214', '2019-02-12 06:23:36'),
('Aslam', 'aslam@gmail.com', '777-874-8569', '2019-02-12 06:23:56'),
('Daood', 'daood@gmail.com', '666-123-5412', '2019-02-12 06:24:19'),
('Henary', 'henary@gmail.com', '234-236-1254', '2019-02-12 06:32:48'),
('Mark Jhon', 'mjhon@gmail.com', '324-569-3652', '2019-02-12 06:33:06');


ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


CREATE TABLE `usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
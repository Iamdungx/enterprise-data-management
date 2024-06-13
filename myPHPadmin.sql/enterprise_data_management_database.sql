-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2024 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprise_data_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `assingment_id` varchar(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `create_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `assignment_type` text DEFAULT NULL,
  `details` varchar(255) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `leader` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `assingment_id`, `user_id`, `create_date`, `deadline`, `assignment_type`, `details`, `status`, `leader`) VALUES
(32, 'P2.0', 'HUMG164283', '2024-05-22', '2024-05-24', 'Design Web', 'Hiểu Rõ Yêu Cầu Khách Hàng: Làm việc với khách hàng hoặc các bộ phận liên quan để hiểu rõ mục tiêu, yêu cầu và mong muốn của họ.', 'Incomplete', 'HUMG715269'),
(33, 'P3.0', 'HUMG594731', '2024-05-21', '2024-05-24', 'Sales', 'hiểu biết sâu sắc về sản phẩm/dịch vụ của công ty và khả năng thuyết phục khách hàng về giá trị mà sản phẩm/dịch vụ mang lại.', 'Completed', 'HUMG715269'),
(34, 'P2.0.2', 'HUMG491206', '2024-05-25', '2024-05-26', 'Design Web Screen', 'cần tối ưu hóa trải nghiệm người dùng bằng cách thiết kế trang web sao cho dễ dàng điều hướng và sử dụng. Họ cũng thường xuyên kiểm tra và cải tiến trải nghiệm này dựa trên phản hồi của người dùng.', 'Completed', 'HUMG164283'),
(35, 'P2.0.1', 'HUMG236580', '2024-05-23', '2024-05-25', 'Design Web Home', 'thiết kế phải bắt đầu bằng việc nghiên cứu và hiểu rõ yêu cầu của khách hàng, mục tiêu kinh doanh, và đối tượng người dùng mục tiêu. Trang chủ cần phải tạo ấn tượng ban đầu mạnh mẽ, vì đây là điểm đầu tiên người dùng tiếp xúc với trang web.', 'Incomplete', 'HUMG164283'),
(36, 'P2.0.2.1', 'HUMG724596', '2024-05-12', '2024-05-26', 'Design Web Screen Header', 'thiết kế cần bắt đầu bằng việc hiểu rõ thương hiệu, mục tiêu của trang web và nhu cầu của đối tượng người dùng mục tiêu. Phần đầu trang phải nổi bật nhưng không quá phô trương, đồng thời truyền tải thông điệp thương hiệu một cách rõ ràng và hiệu quả.', 'Incomplete', 'HUMG491206'),
(37, 'P2.0.2.2', 'HUMG846732', '2024-05-21', '2024-05-26', 'Design Web Screen Body', 'cần được thiết kế sao cho dễ dàng tiếp cận thông tin, trực quan và hấp dẫn. Nhà thiết kế phải bắt đầu bằng việc hiểu rõ mục tiêu của trang web, đối tượng người dùng và loại nội dung mà trang web muốn truyền tải. ', 'Incomplete', 'HUMG491206'),
(38, 'P2.0.2.3', 'HUMG420146', '2024-05-12', '2024-05-26', 'Design Web Screen Footer', 'thiết kế cần đảm bảo rằng phần chân trang vừa hữu ích vừa không làm rối mắt người dùng, đồng thời tuân thủ phong cách và màu sắc của toàn bộ trang web để duy trì tính nhất quán trong thiết kế.', 'Incomplete', 'HUMG491206'),
(39, 'P2.0.1.1', 'HUMG306840', '2024-05-20', '2024-05-25', 'Design Web Home Header', 'thiết kế cần bắt đầu bằng việc hiểu rõ thương hiệu, mục tiêu của trang web và nhu cầu của đối tượng người dùng mục tiêu. Phần đầu trang phải nổi bật nhưng không quá phô trương, đồng thời truyền tải thông điệp thương hiệu một cách rõ ràng và hiệu quả.', 'Completed', 'HUMG236580'),
(40, 'P2.0.1.2', 'HUMG268938', '2024-05-20', '2024-05-25', 'Design Web Home Body', 'Phần thân trang cần phải đáp ứng được yêu cầu về thiết kế đáp ứng (responsive design), đảm bảo hiển thị tốt trên mọi thiết bị từ máy tính để bàn đến điện thoại di động.', 'Completed', 'HUMG236580'),
(41, 'P2.0.1.3', 'HUMG724596', '2024-05-16', '2024-05-25', 'Design Web Home Footer', 'thiết kế cần chú ý đến việc cập nhật thông tin trong footer để luôn đảm bảo tính chính xác và hiện tại, đặc biệt là các liên kết và thông tin liên hệ.', 'Incomplete', 'HUMG236580'),
(42, 'P2.0.3', 'HUMG236580', '2024-05-21', '2024-05-23', 'Design Database', ' thiết kế cơ sở dữ liệu cần bắt đầu bằng việc phân tích yêu cầu của hệ thống và hiểu rõ các loại dữ liệu cần lưu trữ, mối quan hệ giữa chúng, và cách dữ liệu sẽ được sử dụng bởi người dùng hoặc các ứng dụng.', 'Incomplete', 'HUMG164283'),
(43, 'P2.0.3.1', 'HUMG268938', '2024-05-17', '2024-05-23', 'Design Database Table', ' Khi thiết kế bảng, nhà thiết kế cần xác định các thực thể (entities) và thuộc tính (attributes) tương ứng của hệ thống, đồng thời xác định mối quan hệ giữa chúng.', 'Incomplete', 'HUMG236580'),
(44, 'P4.0', 'HUMG594731', '2024-05-17', '2024-05-25', 'Sales', 'nắm bắt nhu cầu của thị trường, tìm kiếm cơ hội kinh doanh mới, và xây dựng mối quan hệ với khách hàng tiềm năng.', 'Completed', 'HUMG715269'),
(45, 'P4.0.1', 'HUMG236580', '2024-05-02', '2024-05-25', 'Sales Furniture', 'hiểu biết sâu sắc về sản phẩm, từ chất liệu và thiết kế đến tính năng và giá cả.', 'Incomplete', 'HUMG594731'),
(46, 'P4.0.2', 'HUMG491206', '2024-05-11', '2024-05-26', 'Sales Clothes', 'Sales cũng phải liên tục cập nhật về xu hướng mới trong ngành nội thất để có thể cung cấp những gợi ý và lời khuyên phù hợp nhất cho khách hàng.', 'Completed', 'HUMG594731'),
(47, 'P3.0.1', 'HUMG736401', '2024-05-22', '2024-05-24', 'Fix bug Back-end', 'xác định lỗi cụ thể và điều kiện gây ra nó. Điều này có thể bao gồm việc kiểm tra log lỗi, theo dõi các truy vấn SQL, hoặc kiểm tra dữ liệu đầu vào và đầu ra của hệ thống.', 'Incomplete', 'HUMG594731'),
(48, 'P3.0.2', 'HUMG985274', '2024-05-12', '2024-05-30', 'Design base UX/UI', 'Phân tích thị trường: Xác định xu hướng và cạnh tranh trong ngành để đảm bảo sự phát triển cạnh tranh.', 'Incomplete', 'HUMG594731'),
(49, 'P4.0.1.1', 'HUMG905832', '2024-05-22', '2024-05-25', 'Sales Furniture Table', 'Quản lý quan hệ khách hàng và hỗ trợ sau bán hàng cũng là một phần quan trọng của công việc của bộ phận Sales.', 'Incomplete', 'HUMG236580'),
(50, 'P4.0.1.2', 'HUMG239670', '2024-05-18', '2024-05-25', 'Sales Furniture Chair', 'Sales trong ngành nội thất bàn cần phải có kiến thức rộng về các loại bàn, từ bàn ăn, bàn làm việc, bàn góc đến bàn trà, và hiểu biết về các vật liệu, kích thước, và thiết kế phổ biến của chúng.', 'Incomplete', 'HUMG236580'),
(51, 'P5.0', 'HUMG594731', '2024-05-06', '2024-05-31', 'Sales', 'hiểu biết sâu sắc về sản phẩm/dịch vụ của công ty ...', 'Incomplete', 'HUMG715269'),
(52, 'P5.0.1', 'HUMG236580', '2024-05-12', '2024-05-31', 'Sales Furniture', 'bao gồm tư vấn khách hàng về các sản phẩm nội thất phù hợp với nhu cầu và phong cách của họ, đồng thời thúc đẩy doanh số bán hàng.', 'Completed', 'HUMG594731'),
(53, 'P5.0.1.1', 'HUMG239670', '2024-05-09', '2024-05-31', 'Sales Furniture Table', 'Quản lý quan hệ khách hàng và hỗ trợ sau bán hàng cũng là một phần quan trọng của công việc của bộ phận Sales.', 'Incomplete', 'HUMG236580'),
(54, 'P5.0.1.2', 'HUMG724596', '2024-05-11', '2024-05-31', 'Sales Furniture Chair', 'tạo ra và duy trì mối quan hệ kinh doanh với khách hàng.', 'Completed', 'HUMG236580'),
(55, 'P7.0', 'HUMG724596', '2024-05-24', '2024-06-01', 'Martketing cho sản phẩm mới', 'hiểu biết sâu sắc về sản phẩm/dịch vụ của công ty ...', 'Completed', 'HUMG491206'),
(58, 'P2.0.2.4', 'HUMG724596', '2024-06-05', '2024-06-08', 'Design Web Screen Navbar', 'Design Web Screen Navbar UI/UX', 'Incomplete', 'HUMG491206'),
(60, 'P.6.0.1', 'HUMG236580', '2024-06-07', '2024-06-12', 'Sales Cloths', 'Sales 100 Cloths', 'Incomplete', 'HUMG594731');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `month` tinyint(2) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `total` int(11) NOT NULL,
  `ot` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `month`, `year`, `total`, `ot`) VALUES
(1, 'HUMG000000', 1, '2023', 26, '2'),
(2, 'HUMG000000', 2, '2023', 26, '3'),
(3, 'HUMG000000', 3, '2023', 26, '1'),
(4, 'HUMG000000', 4, '2023', 26, '4'),
(5, 'HUMG000000', 5, '2023', 24, '0'),
(6, 'HUMG000000', 6, '2023', 23, '5'),
(7, 'HUMG000000', 7, '2023', 26, '2'),
(8, 'HUMG000000', 8, '2023', 26, '3'),
(9, 'HUMG000000', 9, '2023', 26, '1'),
(10, 'HUMG000000', 10, '2023', 26, '4'),
(11, 'HUMG000000', 11, '2023', 26, '2'),
(12, 'HUMG000000', 12, '2023', 26, '3'),
(13, 'HUMG491206', 1, '2023', 26, '2'),
(14, 'HUMG491206', 2, '2023', 26, '2'),
(15, 'HUMG491206', 3, '2023', 22, '7'),
(16, 'HUMG491206', 4, '2023', 26, '2'),
(17, 'HUMG491206', 5, '2023', 26, '2'),
(18, 'HUMG491206', 6, '2023', 26, '8'),
(19, 'HUMG491206', 7, '2023', 26, '2'),
(20, 'HUMG491206', 8, '2023', 22, '10'),
(21, 'HUMG491206', 9, '2023', 25, '2'),
(22, 'HUMG491206', 10, '2023', 26, '2'),
(23, 'HUMG491206', 11, '2023', 26, '2'),
(24, 'HUMG491206', 12, '2023', 19, '2'),
(25, 'HUMG594731', 2, '2023', 26, '2'),
(26, 'HUMG594731', 3, '2023', 22, '7'),
(27, 'HUMG594731', 4, '2023', 26, '2'),
(28, 'HUMG594731', 5, '2023', 26, '2'),
(29, 'HUMG594731', 6, '2023', 26, '8'),
(30, 'HUMG594731', 7, '2023', 26, '2'),
(31, 'HUMG594731', 8, '2023', 22, '10'),
(32, 'HUMG594731', 9, '2023', 25, '2'),
(33, 'HUMG594731', 10, '2023', 26, '2'),
(34, 'HUMG594731', 11, '2023', 26, '2'),
(35, 'HUMG594731', 12, '2023', 19, '2'),
(36, 'HUMG594731', 1, '2023', 26, '2'),
(37, 'HUMG594731', 2, '2023', 26, '3'),
(38, 'HUMG594731', 3, '2023', 26, '1'),
(39, 'HUMG594731', 4, '2023', 26, '4'),
(40, 'HUMG594731', 5, '2023', 26, '0'),
(41, 'HUMG594731', 6, '2023', 26, '5'),
(42, 'HUMG594731', 7, '2023', 26, '2'),
(43, 'HUMG594731', 8, '2023', 26, '3'),
(44, 'HUMG594731', 9, '2023', 26, '1'),
(45, 'HUMG594731', 10, '2023', 26, '4'),
(46, 'HUMG594731', 11, '2023', 26, '2'),
(47, 'HUMG594731', 12, '2023', 26, '3'),
(48, 'HUMG724596', 1, '2023', 21, '9'),
(49, 'HUMG724596', 2, '2023', 26, '2'),
(50, 'HUMG724596', 3, '2023', 22, '7'),
(51, 'HUMG724596', 4, '2023', 26, '2'),
(52, 'HUMG724596', 5, '2023', 26, '2'),
(53, 'HUMG724596', 6, '2023', 26, '8'),
(54, 'HUMG724596', 7, '2023', 26, '2'),
(55, 'HUMG724596', 8, '2023', 22, '10'),
(56, 'HUMG724596', 9, '2023', 25, '2'),
(57, 'HUMG724596', 10, '2023', 26, '2'),
(58, 'HUMG724596', 11, '2023', 26, '2'),
(59, 'HUMG724596', 12, '2023', 19, '2'),
(60, 'HUMG236580', 1, '2023', 21, '9'),
(61, 'HUMG236580', 2, '2023', 26, '2'),
(62, 'HUMG236580', 3, '2023', 22, '7'),
(63, 'HUMG236580', 4, '2023', 26, '2'),
(64, 'HUMG236580', 5, '2023', 26, '2'),
(65, 'HUMG236580', 6, '2023', 26, '8'),
(66, 'HUMG236580', 7, '2023', 26, '2'),
(67, 'HUMG236580', 8, '2023', 22, '10'),
(68, 'HUMG236580', 9, '2023', 25, '2'),
(69, 'HUMG236580', 10, '2023', 26, '2'),
(70, 'HUMG236580', 11, '2023', 26, '2'),
(71, 'HUMG236580', 12, '2023', 19, '2'),
(72, 'HUMG715269', 1, '2023', 21, '9'),
(73, 'HUMG715269', 2, '2023', 26, '2'),
(74, 'HUMG715269', 3, '2023', 22, '7'),
(75, 'HUMG715269', 4, '2023', 26, '2'),
(76, 'HUMG715269', 5, '2023', 26, '2'),
(77, 'HUMG715269', 6, '2023', 26, '8'),
(78, 'HUMG715269', 7, '2023', 26, '2'),
(79, 'HUMG715269', 8, '2023', 22, '10'),
(80, 'HUMG715269', 9, '2023', 25, '2'),
(81, 'HUMG715269', 10, '2023', 26, '2'),
(82, 'HUMG715269', 11, '2023', 26, '2'),
(83, 'HUMG715269', 12, '2023', 19, '2'),
(84, 'HUMG846732', 1, '2023', 21, '9'),
(85, 'HUMG846732', 2, '2023', 26, '2'),
(86, 'HUMG846732', 3, '2023', 22, '7'),
(87, 'HUMG846732', 4, '2023', 26, '2'),
(88, 'HUMG846732', 5, '2023', 26, '2'),
(89, 'HUMG846732', 6, '2023', 26, '8'),
(90, 'HUMG846732', 7, '2023', 26, '2'),
(91, 'HUMG846732', 8, '2023', 22, '10'),
(92, 'HUMG846732', 9, '2023', 25, '2'),
(93, 'HUMG846732', 10, '2023', 26, '2'),
(94, 'HUMG846732', 11, '2023', 26, '2'),
(95, 'HUMG846732', 12, '2023', 19, '2'),
(96, 'HUMG420146', 1, '2023', 21, '9'),
(97, 'HUMG420146', 2, '2023', 26, '2'),
(98, 'HUMG420146', 3, '2023', 22, '7'),
(99, 'HUMG420146', 4, '2023', 26, '2'),
(100, 'HUMG420146', 5, '2023', 26, '2'),
(101, 'HUMG420146', 6, '2023', 26, '8'),
(102, 'HUMG420146', 7, '2023', 26, '2'),
(103, 'HUMG420146', 8, '2023', 22, '10'),
(104, 'HUMG420146', 9, '2023', 25, '2'),
(105, 'HUMG420146', 10, '2023', 26, '2'),
(106, 'HUMG420146', 11, '2023', 26, '2'),
(107, 'HUMG420146', 12, '2023', 19, '2'),
(108, 'HUMG572138', 1, '2023', 21, '9'),
(109, 'HUMG572138', 2, '2023', 26, '2'),
(110, 'HUMG572138', 3, '2023', 22, '7'),
(111, 'HUMG572138', 4, '2023', 26, '2'),
(112, 'HUMG572138', 5, '2023', 26, '2'),
(113, 'HUMG572138', 6, '2023', 26, '8'),
(114, 'HUMG572138', 7, '2023', 26, '2'),
(115, 'HUMG572138', 8, '2023', 22, '10'),
(116, 'HUMG572138', 9, '2023', 25, '2'),
(117, 'HUMG572138', 10, '2023', 26, '2'),
(118, 'HUMG572138', 11, '2023', 26, '2'),
(119, 'HUMG572138', 12, '2023', 19, '2'),
(120, 'HUMG306840', 1, '2023', 21, '9'),
(121, 'HUMG306840', 2, '2023', 26, '2'),
(122, 'HUMG306840', 3, '2023', 22, '7'),
(123, 'HUMG306840', 4, '2023', 26, '2'),
(124, 'HUMG306840', 5, '2023', 26, '2'),
(125, 'HUMG306840', 6, '2023', 26, '8'),
(126, 'HUMG306840', 7, '2023', 26, '2'),
(127, 'HUMG306840', 8, '2023', 22, '10'),
(128, 'HUMG306840', 9, '2023', 25, '2'),
(129, 'HUMG306840', 10, '2023', 26, '2'),
(130, 'HUMG306840', 11, '2023', 26, '2'),
(131, 'HUMG306840', 12, '2023', 19, '2'),
(132, 'HUMG268938', 1, '2023', 21, '9'),
(133, 'HUMG268938', 2, '2023', 26, '2'),
(134, 'HUMG268938', 3, '2023', 22, '7'),
(135, 'HUMG268938', 4, '2023', 26, '2'),
(136, 'HUMG268938', 5, '2023', 26, '2'),
(137, 'HUMG268938', 6, '2023', 26, '8'),
(138, 'HUMG268938', 7, '2023', 26, '2'),
(139, 'HUMG268938', 8, '2023', 22, '10'),
(140, 'HUMG268938', 9, '2023', 25, '2'),
(141, 'HUMG268938', 10, '2023', 26, '2'),
(142, 'HUMG268938', 11, '2023', 26, '2'),
(143, 'HUMG268938', 12, '2023', 19, '2'),
(144, 'HUMG879256', 1, '2023', 21, '9'),
(145, 'HUMG879256', 2, '2023', 26, '2'),
(146, 'HUMG879256', 3, '2023', 22, '7'),
(147, 'HUMG879256', 4, '2023', 26, '2'),
(148, 'HUMG879256', 5, '2023', 26, '2'),
(149, 'HUMG879256', 6, '2023', 26, '8'),
(150, 'HUMG879256', 7, '2023', 26, '2'),
(151, 'HUMG879256', 8, '2023', 22, '10'),
(152, 'HUMG879256', 9, '2023', 25, '2'),
(153, 'HUMG879256', 10, '2023', 26, '2'),
(154, 'HUMG879256', 11, '2023', 26, '2'),
(155, 'HUMG879256', 12, '2023', 19, '2'),
(156, 'HUMG974385', 1, '2023', 21, '9'),
(157, 'HUMG974385', 2, '2023', 26, '2'),
(158, 'HUMG974385', 3, '2023', 22, '7'),
(159, 'HUMG974385', 4, '2023', 26, '2'),
(160, 'HUMG974385', 5, '2023', 26, '2'),
(161, 'HUMG974385', 6, '2023', 26, '8'),
(162, 'HUMG974385', 7, '2023', 26, '2'),
(163, 'HUMG974385', 8, '2023', 22, '10'),
(164, 'HUMG974385', 9, '2023', 25, '2'),
(165, 'HUMG974385', 10, '2023', 26, '2'),
(166, 'HUMG974385', 11, '2023', 26, '2'),
(167, 'HUMG974385', 12, '2023', 19, '2'),
(168, 'HUMG170349', 1, '2023', 21, '9'),
(169, 'HUMG170349', 2, '2023', 26, '2'),
(170, 'HUMG170349', 3, '2023', 22, '7'),
(171, 'HUMG170349', 4, '2023', 26, '2'),
(172, 'HUMG170349', 5, '2023', 26, '2'),
(173, 'HUMG170349', 6, '2023', 26, '8'),
(174, 'HUMG170349', 7, '2023', 26, '2'),
(175, 'HUMG170349', 8, '2023', 22, '10'),
(176, 'HUMG170349', 9, '2023', 25, '2'),
(177, 'HUMG170349', 10, '2023', 26, '2'),
(178, 'HUMG170349', 11, '2023', 26, '2'),
(179, 'HUMG170349', 12, '2023', 19, '2'),
(180, 'HUMG905832', 1, '2023', 21, '9'),
(181, 'HUMG905832', 2, '2023', 26, '2'),
(182, 'HUMG905832', 3, '2023', 22, '7'),
(183, 'HUMG905832', 4, '2023', 26, '2'),
(184, 'HUMG905832', 5, '2023', 26, '2'),
(185, 'HUMG905832', 6, '2023', 26, '8'),
(186, 'HUMG905832', 7, '2023', 26, '2'),
(187, 'HUMG905832', 8, '2023', 22, '10'),
(188, 'HUMG905832', 9, '2023', 25, '2'),
(189, 'HUMG905832', 10, '2023', 26, '2'),
(190, 'HUMG905832', 11, '2023', 26, '2'),
(191, 'HUMG905832', 12, '2023', 19, '2'),
(192, 'HUMG239670', 1, '2023', 21, '9'),
(193, 'HUMG239670', 2, '2023', 26, '2'),
(194, 'HUMG239670', 3, '2023', 22, '7'),
(195, 'HUMG239670', 4, '2023', 26, '2'),
(196, 'HUMG239670', 5, '2023', 26, '2'),
(197, 'HUMG239670', 6, '2023', 26, '8'),
(198, 'HUMG239670', 7, '2023', 26, '2'),
(199, 'HUMG239670', 8, '2023', 22, '10'),
(200, 'HUMG239670', 9, '2023', 25, '2'),
(201, 'HUMG239670', 10, '2023', 26, '2'),
(202, 'HUMG239670', 11, '2023', 26, '2'),
(203, 'HUMG239670', 12, '2023', 19, '2'),
(204, 'HUMG678943', 1, '2023', 21, '9'),
(205, 'HUMG678943', 2, '2023', 26, '2'),
(206, 'HUMG678943', 3, '2023', 22, '7'),
(207, 'HUMG678943', 4, '2023', 26, '2'),
(208, 'HUMG678943', 5, '2023', 26, '2'),
(209, 'HUMG678943', 6, '2023', 26, '8'),
(210, 'HUMG678943', 7, '2023', 26, '2'),
(211, 'HUMG678943', 8, '2023', 22, '10'),
(212, 'HUMG678943', 9, '2023', 25, '2'),
(213, 'HUMG678943', 10, '2023', 26, '2'),
(214, 'HUMG678943', 11, '2023', 26, '2'),
(215, 'HUMG678943', 12, '2023', 19, '2'),
(216, 'HUMG736401', 1, '2023', 21, '9'),
(217, 'HUMG736401', 2, '2023', 26, '2'),
(218, 'HUMG736401', 3, '2023', 22, '7'),
(219, 'HUMG736401', 4, '2023', 26, '2'),
(220, 'HUMG736401', 5, '2023', 26, '2'),
(221, 'HUMG736401', 6, '2023', 26, '8'),
(222, 'HUMG736401', 7, '2023', 26, '2'),
(223, 'HUMG736401', 8, '2023', 22, '10'),
(224, 'HUMG736401', 9, '2023', 25, '2'),
(225, 'HUMG736401', 10, '2023', 26, '2'),
(226, 'HUMG736401', 11, '2023', 26, '2'),
(227, 'HUMG736401', 12, '2023', 19, '2'),
(228, 'HUMG730549', 1, '2023', 21, '9'),
(229, 'HUMG730549', 2, '2023', 26, '2'),
(230, 'HUMG730549', 3, '2023', 22, '7'),
(231, 'HUMG730549', 4, '2023', 26, '2'),
(232, 'HUMG730549', 5, '2023', 26, '2'),
(233, 'HUMG730549', 6, '2023', 26, '8'),
(234, 'HUMG730549', 7, '2023', 26, '2'),
(235, 'HUMG730549', 8, '2023', 22, '10'),
(236, 'HUMG730549', 9, '2023', 25, '2'),
(237, 'HUMG730549', 10, '2023', 26, '2'),
(238, 'HUMG730549', 11, '2023', 26, '2'),
(239, 'HUMG730549', 12, '2023', 19, '2'),
(240, 'HUMG818245', 1, '2023', 21, '9'),
(241, 'HUMG818245', 2, '2023', 26, '2'),
(242, 'HUMG818245', 3, '2023', 22, '7'),
(243, 'HUMG818245', 4, '2023', 26, '2'),
(244, 'HUMG818245', 5, '2023', 26, '2'),
(245, 'HUMG818245', 6, '2023', 26, '8'),
(246, 'HUMG818245', 7, '2023', 26, '2'),
(247, 'HUMG818245', 8, '2023', 22, '10'),
(248, 'HUMG818245', 9, '2023', 25, '2'),
(249, 'HUMG818245', 10, '2023', 26, '2'),
(250, 'HUMG818245', 11, '2023', 26, '2'),
(251, 'HUMG818245', 12, '2023', 19, '2'),
(252, 'HUMG510367', 1, '2023', 21, '9'),
(253, 'HUMG510367', 2, '2023', 26, '2'),
(254, 'HUMG510367', 3, '2023', 22, '7'),
(255, 'HUMG510367', 4, '2023', 26, '2'),
(256, 'HUMG510367', 5, '2023', 26, '2'),
(257, 'HUMG510367', 6, '2023', 26, '8'),
(258, 'HUMG510367', 7, '2023', 26, '2'),
(259, 'HUMG510367', 8, '2023', 22, '10'),
(260, 'HUMG510367', 9, '2023', 25, '2'),
(261, 'HUMG510367', 10, '2023', 26, '2'),
(262, 'HUMG510367', 11, '2023', 26, '2'),
(263, 'HUMG510367', 12, '2023', 19, '2'),
(264, 'HUMG985274', 1, '2023', 21, '9'),
(265, 'HUMG985274', 2, '2023', 26, '2'),
(266, 'HUMG985274', 3, '2023', 22, '7'),
(267, 'HUMG985274', 4, '2023', 26, '2'),
(268, 'HUMG985274', 5, '2023', 26, '2'),
(269, 'HUMG985274', 6, '2023', 26, '8'),
(270, 'HUMG985274', 7, '2023', 26, '2'),
(271, 'HUMG985274', 8, '2023', 22, '10'),
(272, 'HUMG985274', 9, '2023', 25, '2'),
(273, 'HUMG985274', 10, '2023', 26, '2'),
(274, 'HUMG985274', 11, '2023', 26, '2'),
(275, 'HUMG985274', 12, '2023', 19, '2'),
(276, 'HUMG589376', 1, '2023', 21, '9'),
(277, 'HUMG589376', 2, '2023', 26, '2'),
(278, 'HUMG589376', 3, '2023', 22, '7'),
(279, 'HUMG589376', 4, '2023', 26, '2'),
(280, 'HUMG589376', 5, '2023', 26, '2'),
(281, 'HUMG589376', 6, '2023', 26, '8'),
(282, 'HUMG589376', 7, '2023', 26, '2'),
(283, 'HUMG589376', 8, '2023', 22, '10'),
(284, 'HUMG589376', 9, '2023', 25, '2'),
(285, 'HUMG589376', 10, '2023', 26, '2'),
(286, 'HUMG589376', 11, '2023', 26, '2'),
(287, 'HUMG589376', 12, '2023', 19, '2'),
(288, 'HUMG825496', 1, '2023', 21, '9'),
(289, 'HUMG825496', 2, '2023', 26, '2'),
(290, 'HUMG825496', 3, '2023', 22, '7'),
(291, 'HUMG825496', 4, '2023', 26, '2'),
(292, 'HUMG825496', 5, '2023', 26, '2'),
(293, 'HUMG825496', 6, '2023', 26, '8'),
(294, 'HUMG825496', 7, '2023', 26, '2'),
(295, 'HUMG825496', 8, '2023', 22, '10'),
(296, 'HUMG825496', 9, '2023', 25, '2'),
(297, 'HUMG825496', 10, '2023', 26, '2'),
(298, 'HUMG825496', 11, '2023', 26, '2'),
(299, 'HUMG825496', 12, '2023', 19, '2'),
(300, 'HUMG712594', 1, '2023', 21, '9'),
(301, 'HUMG712594', 2, '2023', 26, '2'),
(302, 'HUMG712594', 3, '2023', 22, '7'),
(303, 'HUMG712594', 4, '2023', 26, '2'),
(304, 'HUMG712594', 5, '2023', 26, '2'),
(305, 'HUMG712594', 6, '2023', 26, '8'),
(306, 'HUMG712594', 7, '2023', 26, '2'),
(307, 'HUMG712594', 8, '2023', 22, '10'),
(308, 'HUMG712594', 9, '2023', 25, '2'),
(309, 'HUMG712594', 10, '2023', 26, '2'),
(310, 'HUMG712594', 11, '2023', 26, '2'),
(311, 'HUMG712594', 12, '2023', 19, '2'),
(312, 'HUMG164283', 1, '2023', 21, '9'),
(313, 'HUMG164283', 2, '2023', 26, '2'),
(314, 'HUMG164283', 3, '2023', 22, '7'),
(315, 'HUMG164283', 4, '2023', 26, '2'),
(316, 'HUMG164283', 5, '2023', 26, '2'),
(317, 'HUMG164283', 6, '2023', 26, '8'),
(318, 'HUMG164283', 7, '2023', 26, '2'),
(319, 'HUMG164283', 8, '2023', 22, '10'),
(320, 'HUMG164283', 9, '2023', 25, '2'),
(321, 'HUMG164283', 10, '2023', 26, '2'),
(322, 'HUMG164283', 11, '2023', 26, '2'),
(323, 'HUMG164283', 12, '2023', 19, '2'),
(324, 'HUMG132666', 1, '2023', 21, '9'),
(325, 'HUMG132666', 2, '2023', 26, '2'),
(326, 'HUMG132666', 3, '2023', 22, '7'),
(327, 'HUMG132666', 4, '2023', 26, '2'),
(328, 'HUMG132666', 5, '2023', 26, '2'),
(329, 'HUMG132666', 6, '2023', 26, '8'),
(330, 'HUMG132666', 7, '2023', 26, '2'),
(331, 'HUMG132666', 8, '2023', 22, '10'),
(332, 'HUMG132666', 9, '2023', 25, '2'),
(333, 'HUMG132666', 10, '2023', 26, '2'),
(334, 'HUMG132666', 11, '2023', 26, '2'),
(335, 'HUMG132666', 12, '2023', 19, '2');

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE `benefit` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `health_insurance` varchar(30) NOT NULL,
  `social_insurance` varchar(30) NOT NULL,
  `unemployment_insurance` varchar(30) NOT NULL,
  `other` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`id`, `user_id`, `health_insurance`, `social_insurance`, `unemployment_insurance`, `other`) VALUES
(1, 'HUMG724596', 'Yes', 'Yes', 'Yes', 'Employee Assistance Program'),
(2, 'HUMG236580', 'Yes', 'Yes', 'Yes', 'Flexible Spending Account (FSA)'),
(3, 'HUMG846732', 'Yes', 'Yes', 'Yes', 'Remote Work Option'),
(4, 'HUMG420146', 'Yes', 'Yes', 'No', 'Professional Development Opportunities'),
(5, 'HUMG572138', 'Yes', 'Yes', 'Yes', 'Wellness Program'),
(6, 'HUMG491206', 'Yes', 'Yes', 'Yes', 'On-site Gym Access'),
(7, 'HUMG306840', 'Yes', 'Yes', 'No', '401(k) Retirement Plan'),
(8, 'HUMG268938', 'Yes', 'Yes', 'Yes', 'Transportation Reimbursement'),
(9, 'HUMG879256', 'Yes', 'Yes', 'Yes', 'Stock Options'),
(10, 'HUMG974385', 'Yes', 'Yes', 'No', 'Childcare Assistance'),
(11, 'HUMG170349', 'Yes', 'Yes', 'Yes', 'Employee Stock Purchase Plan (ESPP)'),
(12, 'HUMG905832', 'Yes', 'Yes', 'No', 'Paid Time Off (PTO)'),
(13, 'HUMG239670', 'Yes', 'Yes', 'Yes', 'Education Assistance'),
(14, 'HUMG678943', 'Yes', 'Yes', 'No', 'Commuter Benefits'),
(15, 'HUMG736401', 'Yes', 'Yes', 'Yes', 'Remote Work Stipend'),
(16, 'HUMG730549', 'Yes', 'Yes', 'Yes', 'Wellness Allowance'),
(17, 'HUMG818245', 'Yes', 'Yes', 'No', 'Employee Discounts'),
(18, 'HUMG510367', 'Yes', 'Yes', 'Yes', 'Student Loan Repayment Program'),
(19, 'HUMG985274', 'Yes', 'Yes', 'Yes', 'Parental Leave'),
(20, 'HUMG589376', 'Yes', 'Yes', 'No', 'Tuition Reimbursement'),
(21, 'HUMG825496', 'Yes', 'Yes', 'Yes', 'Professional Memberships'),
(22, 'HUMG712594', 'Yes', 'Yes', 'No', 'Fitness Reimbursement'),
(23, 'HUMG594731', 'Yes', 'Yes', 'Yes', 'Flexible Work Schedule'),
(24, 'HUMG164283', 'Yes', 'Yes', 'Yes', 'Adoption Assistance'),
(25, 'HUMG715269', 'Yes', 'Yes', 'Yes', 'Employee Referral Program'),
(26, 'HUMG000000', 'Yes', 'Yes', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `contract_id` varchar(30) NOT NULL,
  `contract_date` date NOT NULL,
  `salary` int(30) NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `contract_id`, `contract_date`, `salary`, `user_id`, `type`) VALUES
(2, 'HD89211', '2024-01-01', 15000000, 'HUMG268938', 'Chính thức'),
(3, 'HD89342', '2023-05-01', 12000000, 'HUMG491206', 'Thử việc'),
(5, 'HD37823', '2024-01-01', 6700000, 'HUMG594731', 'Chính thức'),
(9, 'HD01239', '2024-05-22', 7400000, 'HUMG589376', 'Chính thức'),
(12, 'HD05307', '2024-06-14', 15000000, 'HUMG715269', 'Chính thức'),
(13, 'HD13928', '2023-09-21', 20000000, 'HUMG000000', 'Chính thức'),
(15, 'HD97723', '2024-05-27', 6800000, 'HUMG724596', 'Chính thức'),
(23, 'HD87161', '2024-06-07', 7800000, 'HUMG236580', 'Chính Thức'),
(25, 'HD18412', '2024-06-08', 15000000, 'HUMG846732', 'Chính Thức'),
(26, 'HD92643', '2024-06-07', 15000000, 'HUMG420146', 'Chính Thức'),
(27, 'HD86015', '2024-06-07', 7800000, 'HUMG572138', 'Chính Thức'),
(29, 'HD20924', '2024-06-06', 6800000, 'HUMG306840', 'Chính thức');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile`
--

CREATE TABLE `employee_profile` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `work_exp` varchar(255) DEFAULT NULL,
  `certification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `employee_profile`
--

INSERT INTO `employee_profile` (`id`, `user_id`, `education`, `work_exp`, `certification`) VALUES
(1, 'HUMG724596', 'Bằng Cử nhân', '5 năm', NULL),
(2, 'HUMG236580', 'Bằng Kĩ sư', '7 năm', 'Certified Professional in Human Resources (PHR)'),
(3, 'HUMG846732', 'Bằng Cử nhân', '6 năm', NULL),
(4, 'HUMG420146', 'Bằng Cử nhân', '3 năm', NULL),
(5, 'HUMG572138', 'Bằng Thạc sĩ', '6 năm', NULL),
(6, 'HUMG491206', 'Bằng Thạc sĩ', '7 năm', NULL),
(7, 'HUMG306840', 'Bằng Cử nhân', '7 năm', NULL),
(8, 'HUMG268938', 'Bằng Thạc sĩ', '9 năm', NULL),
(9, 'HUMG879256', 'Bằng Tiến sĩ', '8 năm', NULL),
(10, 'HUMG974385', 'Bằng Cử nhân', '4 năm', NULL),
(11, 'HUMG170349', 'Bằng Thạc sĩ', '8 năm', NULL),
(12, 'HUMG905832', 'Bằng Cao đẳng', '6 năm', NULL),
(13, 'HUMG239670', 'Bằng Cử nhân', '5 năm', NULL),
(14, 'HUMG678943', 'Bằng Thạc sĩ', '10 năm', 'Certified Information Systems Security Professional (CISSP)'),
(15, 'HUMG736401', 'Bằng Cử nhân', '7 năm', NULL),
(16, 'HUMG730549', 'Bằng Cử nhân', '6 năm', NULL),
(17, 'HUMG818245', '12/12', '4 năm', NULL),
(18, 'HUMG510367', 'Bằng Cử nhân', '8 năm', NULL),
(19, 'HUMG985274', 'Bằng Thạc sĩ', '11 năm', NULL),
(20, 'HUMG589376', 'Bằng Cử nhân', '5 năm', NULL),
(21, 'HUMG825496', 'Bằng Thạc sĩ', '9 năm', NULL),
(22, 'HUMG712594', 'Bằng Cử nhân', '7 năm', NULL),
(23, 'HUMG594731', 'Bằng Cao đẳng', '5 năm', NULL),
(24, 'HUMG164283', 'Bằng Cử nhân', '6 năm', NULL),
(25, 'HUMG715269', 'Bằng Thạc sĩ', '12 năm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modification`
--

CREATE TABLE `modification` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `text_log` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `modification`
--

INSERT INTO `modification` (`id`, `name`, `role`, `text_log`, `timestamp`, `description`) VALUES
(1, 'HUMG715269', 'President', 'INSERT INTO `contract` (`contract_id`, `user_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG879256\', \'2024-06-05\', \'13820000\', \'Vô thời hạn\')', '2024-06-05 14:15:40', 'Thêm hợp đồng'),
(2, 'HUMG715269', 'President', 'INSERT INTO `contract` (`contract_id`, `user_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG236580\', \'2024-06-05\', \'18100000\', \'Vô thời hạn\')', '2024-06-05 14:31:07', 'Thêm hợp đồng'),
(3, 'HUMG715269', 'President', 'INSERT INTO `contract` (`contract_id`, `user_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG236580\', \'2024-06-05\', \'18100001\', \'Vô thời hạn\')', '2024-06-05 14:35:52', 'Thêm hợp đồng'),
(4, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG000000\', \'HD079545\',\'2024-06-05\', \'78000006\', \'Vô thời hạn\')', '2024-06-05 14:37:50', 'Thêm hợp đồng'),
(5, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG000000\', \'HD015522\',\'2024-06-05\', \'78000006\', \'Vô thời hạn\')', '2024-06-05 14:38:18', 'Thêm hợp đồng'),
(6, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG715269\', \'HD053073\',\'2024-06-14\', \'15000000\', \'Vô thời hạn\')', '2024-06-05 14:43:53', 'Thêm hợp đồng'),
(7, 'HUMG491206', 'manager', 'INSERT INTO assignment (`assingment_id`, `user_id`, `create_date`, `deadline`, `assignment_type`, `details`, `status`, `leader`)  \n                                                    VALUES (\'P2.0.2.4\', \'HUMG724596\', \'2024-06-05\', \'2024-06-08\', \'Design Web Screen Navbar\', \'Design Web Screen Navbar UI/UX\', \'Incomplete\', \'HUMG491206\')', '2024-06-05 15:57:53', 'Thêm công việc'),
(8, 'HUMG491206', 'manager', 'INSERT INTO assignment (`assingment_id`, `user_id`, `create_date`, `deadline`, `assignment_type`, `details`, `status`, `leader`)  \n                                                    VALUES (\'P2.0.2.4\', \'HUMG724596\', \'2024-06-05\', \'2024-06-08\', \'Design Web Screen Navbar\', \'Design Web Screen Navbar UI/UX\', \'Incomplete\', \'HUMG491206\')', '2024-06-05 15:59:46', 'Thêm công việc'),
(9, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG000000\', \'HD13928\',\'2023-09-21\', \'100000000\', \'Chính thức\')', '2024-06-06 18:50:58', 'Thêm hợp đồng'),
(10, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG000000\', \'HD55103\',\'2023-09-21\', \'100000000\', \'Chính thức\')', '2024-06-06 18:51:02', 'Thêm hợp đồng'),
(11, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG724596\', \'HD97723\',\'2024-05-27\', \'6800000\', \'Chính thức\')', '2024-06-06 18:51:47', 'Thêm hợp đồng'),
(12, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG246580\', \'HD44714\',\'2024-05-27\', \'10000\', \'Thử việc\')', '2024-06-06 18:52:26', 'Thêm hợp đồng'),
(13, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG246580\', \'HD71970\',\'2024-05-27\', \'10000\', \'Thử việc\')', '2024-06-06 18:52:29', 'Thêm hợp đồng'),
(14, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG000000\', \'HD91530\',\'2023-09-21\', \'100000000\', \'Chính thức\')', '2024-06-06 18:52:38', 'Thêm hợp đồng'),
(15, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG\', \'HD82444\',\'2024-06-05\', \'10000\', \'Thử việc\')', '2024-06-06 18:53:58', 'Thêm hợp đồng'),
(16, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG\', \'HD56227\',\'2024-06-05\', \'10000\', \'Thử việc\')', '2024-06-06 18:54:02', 'Thêm hợp đồng'),
(17, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG\', \'HD50568\',\'2024-06-05\', \'10000\', \'Thử việc\')', '2024-06-06 18:54:11', 'Thêm hợp đồng'),
(18, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG\', \'HD16745\',\'2024-06-05\', \'10000\', \'Thử việc\')', '2024-06-06 18:54:30', 'Thêm hợp đồng'),
(19, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG236580\', \'HD87161\',\'2024-06-07\', \'7800000\', \'Chính Thức\')', '2024-06-06 18:57:21', 'Thêm hợp đồng'),
(20, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG846732\', \'HD50709\',\'2024-06-08\', \'15000000\', \'Chính Thức\')', '2024-06-06 19:04:21', 'Thêm hợp đồng'),
(21, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG846732\', \'HD18412\',\'2024-06-08\', \'15000000\', \'Chính Thức\')', '2024-06-06 19:04:26', 'Thêm hợp đồng'),
(22, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG420146\', \'HD92643\',\'2024-06-07\', \'15000000\', \'Chính Thức\')', '2024-06-06 19:04:59', 'Thêm hợp đồng'),
(23, 'HUMG715269', 'President', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG572138\', \'HD86015\',\'2024-06-07\', \'7800000\', \'Chính Thức\')', '2024-06-06 19:05:15', 'Thêm hợp đồng'),
(24, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG306840\', \'HD13215\',\'2024-06-06\', \'6800000\', \'Chính thức\')', '2024-06-07 02:07:46', 'Thêm hợp đồng'),
(25, 'HUMG000000', 'admin', 'INSERT INTO `contract` (`user_id`, `contract_id`, `contract_date`, `salary`, `type`) \n                            VALUES (\'HUMG306840\', \'HD20924\',\'2024-06-06\', \'6800000\', \'Chính thức\')', '2024-06-07 02:07:53', 'Thêm hợp đồng'),
(26, 'HUMG594731', 'Vice President', 'INSERT INTO assignment (`assingment_id`, `user_id`, `create_date`, `deadline`, `assignment_type`, `details`, `status`, `leader`)  \n                                                    VALUES (\'P.6.0.1\', \'HUMG236580\', \'2024-06-07\', \'2024-06-12\', \'Sales Cloths\', \'Sales 100 Cloths\', \'Incomplete\', \'HUMG594731\')', '2024-06-07 02:20:51', 'Thêm công việc'),
(27, 'HUMG715269', 'President', 'INSERT INTO user_data (`fisrt_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`) \n                                                VALUES (\'Dung\', \'Nguyen\', \'Nam\', \'Hanoi\', \'2024-06-06\', \'0934582003\', \'nguyendung5823@gmail.com\', \'2024-06-25\', \'Sales\', \'Tester\', \'HUMG132666\', \'0000\', \'employee\')', '2024-06-07 02:35:36', 'Thêm nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `report_assignment`
--

CREATE TABLE `report_assignment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `status` varchar(30) NOT NULL,
  `report_form` varchar(255) NOT NULL,
  `rate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_assignment`
--

INSERT INTO `report_assignment` (`id`, `user_id`, `status`, `report_form`, `rate`) VALUES
(1, 'HUMG236580', 'Chưa hoàn thành', 'Hoàn Thành Công Việc', 'Hoàn thành chậm tiến độ');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `fisrt_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hire_date` date NOT NULL,
  `department` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `user_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `fisrt_name`, `last_name`, `gender`, `address`, `date_of_birth`, `phone`, `email`, `hire_date`, `department`, `position`, `user_id`, `password`, `role`, `user_image`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '0000-00-00', '000000000', 'admin@hrm.com', '0000-00-00', 'admin', 'admin', 'HUMG000000', 'admin', 'admin', NULL),
(2, 'Hà Trung', 'Hiếu', 'Nam', 'Đống Đa, Hà Nội', '1990-05-15', '+84974638172', 'hieu.ht@hrm.com', '2023-01-15', 'IT', 'Developer', 'HUMG724596', '0000', 'employee', NULL),
(3, 'Nguyễn Phương', 'Ly', 'Nữ', 'Ba Đình, Hà Nội', '1985-10-20', '+84987655378', 'ly.np@hrm.com', '2022-09-30', 'HR', 'Manager', 'HUMG236580', '0000', 'manager', NULL),
(4, 'Dương Gia', 'Bình', 'Nam', 'Tây Hồ, Hà Nội', '1988-03-25', '+84902394832', 'bing.dg@hrm.com', '2023-05-10', 'Finance', 'Accountant', 'HUMG846732', '0000', 'employee', NULL),
(5, 'Triệu Mỹ', 'Linh', 'Nữ', 'Nam Định', '1995-12-08', '+84378920817', 'linh.tm@hrm.com', '2024-02-20', 'Sales', 'Representative', 'HUMG420146', '0000', 'employee', NULL),
(6, 'Khổng Hữu', 'Thiên', 'Nam', 'Hải Phòng', '1987-07-18', '+84903184832', 'thien.kh@hrm.com', '2023-11-05', 'Marketing', 'Analyst', 'HUMG572138', '0000', 'employee', NULL),
(7, 'Nguyễn Phan Bảo', 'Huyền', 'Nữ', 'Hà Nội', '1992-09-30', '+84349827394', 'huyen.npb@hrm.com', '2022-07-15', 'IT', 'manager', 'HUMG491206', '0000', 'manager', NULL),
(8, 'Trần Văn', 'Phương', 'Nam', 'Quế Võ, Bắc Ninh', '1983-02-14', '+84376289174', 'phuong.tv@hrm.com', '2024-04-30', 'HR', 'Coordinator', 'HUMG306840', '0000', 'employee', NULL),
(9, 'Nguyễn Khánh', 'Huyền', 'Nữ', 'Tây Hồ, Hà Nội', '1993-11-25', '+84973465923', 'huyen.nk@hrm.com', '2023-03-10', 'Finance', 'Consultant', 'HUMG268938', '0000', 'employee', NULL),
(10, 'Vũ Đình', 'Hoàng', 'Nam', 'Thái Bình', '1986-06-20', '+84972384719', 'hoang.vd@hrm.com', '2022-12-20', 'Sales', 'Manager', 'HUMG879256', '0000', 'manager', NULL),
(11, 'Nguyễn Thu', 'Hà', 'Nữ', 'Thành phố Hồ Chí Minh', '1991-04-05', '+84309738490', 'ha.nt@hrm.com', '2023-08-25', 'Marketing', 'Assistant', 'HUMG974385', '0000', 'employee', NULL),
(12, 'Nguyễn Văn', 'Huy', 'Nam', 'Ninh Giang, Hải Dương', '1984-08-12', '+84578394023', 'huy.nv@hrm.com', '2024-01-05', 'IT', 'Engineer', 'HUMG170349', '0000', 'employee', NULL),
(13, 'Phùng', 'Ngọc Quỳnh', 'Nữ', 'Hạ Long, Quảng Ninh', '1990-03-28', '+84908457283', 'quynh.pn@hrm.com', '2023-05-30', 'HR', 'Analyst', 'HUMG905832', '0000', 'employee', NULL),
(14, 'Phan Anh', 'Đức', 'Nam', 'Mê Linh, Hà Nội', '1988-10-15', '+84908476382', 'duc.pa@hrm.com', '2022-10-10', 'Finance', 'Assistant', 'HUMG239670', '0000', 'employee', NULL),
(15, 'Hồ Minh', 'Thu', 'Nữ', 'Hoành Bồ, Hạ Long, Quảng Ninh', '1994-08-04', '+84912387645', 'thu.hm@hrm.com', '2023-02-15', 'Sales', 'Representative', 'HUMG678943', '0000', 'employee', NULL),
(16, 'Chu Tiến', 'Sơn', 'Nam', 'Bắc Từ Liêm, Hà Nội', '1989-12-01', '+84901284736', 'son.ct@hrm.com', '2024-03-20', 'Marketing', 'Manager', 'HUMG736401', '0000', 'manager', NULL),
(17, 'Lý Thị Minh', 'Thu', 'Nữ', 'Hoài Đức, Hà Nội', '1992-07-10', '+84908237463', 'thu.ltm@hrm.com', '2022-11-05', 'IT', 'Developer', 'HUMG730549', '0000', 'employee', NULL),
(18, 'Nguyễn Việt', 'An', 'Nam', 'Hòn Gai, Quảng Ninh', '1985-05-22', '+84987654321', 'an.nv@hrm.com', '2023-06-10', 'HR', 'Coordinator', 'HUMG818245', '0000', 'employee', NULL),
(19, 'Mai Thị', 'Diễm', 'Nữ', 'Hà Trung, Thanh Hóa', '1991-01-17', '+84312457890', 'diem.mt@hrm.com', '2024-04-25', 'Finance', 'Consultant', 'HUMG510367', '0000', 'employee', NULL),
(20, 'Bùi Văn', 'Duy', 'Nam', 'Nga Sơn, Thanh Hóa', '1986-09-03', '+84512376589', 'duy.bv@hrm.com', '2022-12-30', 'Sales', 'Manager', 'HUMG985274', '0000', 'manager', NULL),
(21, 'Nguyễn Thị', 'Bé', 'Nữ', 'Sapa, Lào Cai', '1993-06-28', '+84923456789', 'be.nt@hrm.com', '2023-09-15', 'Marketing', 'Assistant', 'HUMG589376', '0000', 'employee', NULL),
(22, 'Bùi Quý', 'Cường', 'Nam', 'Nghi Sơn, Thanh Hóa', '1987-11-15', '+84345678934', 'cuong.qb@hrm.com', '2024-02-20', 'IT', 'Engineer', 'HUMG825496', '0000', 'employee', NULL),
(23, 'Chu Thúy', 'Quỳnh', 'Nữ', 'Nghệ An', '1990-02-05', '+84943820946', 'quynh.ct@hrm.com', '2023-04-05', 'HR', 'Analyst', 'HUMG712594', '0000', 'employee', NULL),
(24, 'Nguyễn Thế Việt', 'Dũng', 'Nam', 'Long Biên, Hà Nội', '1984-07-18', '+84987667890', 'dung.ntv@hrm.com', '2017-09-20', 'Vice President', 'Vice President', 'HUMG594731', '0000', 'Vice President', NULL),
(25, 'Trịnh Công', 'Sơn', 'Nam', 'Quảng Ninh', '1982-03-30', '+84321076564', 'son.tc@hrm.com', '2017-05-15', 'Vice President', 'Vice President', 'HUMG164283', '0000', 'Vice President', NULL),
(26, 'Phạm Văn', 'Minh', 'Nam', 'Đông Anh, Hà Nội', '1978-08-10', '+84987651235', 'minh.pv@hrm.com', '2017-07-20', 'President', 'President', 'HUMG715269', '0000', 'President', NULL),
(28, 'Dung', 'Nguyen', 'Nam', 'Hanoi', '2024-06-06', '0934582003', 'nguyendung5823@gmail.com', '2024-06-25', 'Sales', 'Tester', 'HUMG132666', '0000', 'employee', NULL),
(29, '﻿Nguyễn Hoàng', 'Minh', ' Nam', 'Thái Bình', '1998-08-10', '+84329876726', 'minh.nguyenh@hrm.com', '2021-07-20', 'Hr', 'Human resources', 'HUMG356874', '0000', 'employee', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee_profile`
--
ALTER TABLE `employee_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_assignment`
--
ALTER TABLE `report_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee_profile`
--
ALTER TABLE `employee_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report_assignment`
--
ALTER TABLE `report_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `benefit`
--
ALTER TABLE `benefit`
  ADD CONSTRAINT `benefit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_profile`
--
ALTER TABLE `employee_profile`
  ADD CONSTRAINT `employee_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_assignment`
--
ALTER TABLE `report_assignment`
  ADD CONSTRAINT `report_assignment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

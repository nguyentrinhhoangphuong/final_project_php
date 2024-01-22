-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created` date DEFAULT curdate(),
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT curdate(),
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `picture`, `content`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Blockchain: Ưu và Nhược điểm', '5w6ribks.jpg', 'Blockchain, công nghệ đằng sau tiền điện tử nổi tiếng như Bitcoin và Ethereum, đã thu hút sự chú ý đối với khả năng thay đổi cách chúng ta giao tiếp, gửi nhận tiền, và quản lý dữ liệu. Dưới đây là một cái nhìn tổng quan về ưu và nhược điểm của công nghệ này.\r\n\r\nƯu điểm:\r\n\r\nAn toàn và Bảo mật:\r\n\r\nBlockchain sử dụng mã hóa mạnh mẽ để bảo vệ thông tin. Mỗi khối dữ liệu được liên kết với khối trước đó thông qua mã hóa, tạo nên một chuỗi không thể thay đổi mà không làm ảnh hưởng đến toàn bộ hệ thống.\r\nPhi tập trung (Decentralization):\r\n\r\nHệ thống phi tập trung loại bỏ nhu cầu phải tin tưởng vào một bên trung ương. Dữ liệu được lưu trữ và quản lý bởi một mạng lưới phân tán của các nút, giảm rủi ro tấn công và sự kiểm soát từ một bên duy nhất.\r\nTính Đồng nhất (Consensus):\r\n\r\nCác giao dịch cần sự đồng thuận của toàn bộ mạng lưới, giúp ngăn chặn gian lận và chiếm đa số.\r\nDẫn chứng Liên tục (Immutable Record):\r\n\r\nDữ liệu trên blockchain không thể bị thay đổi một khi đã được xác nhận và lưu trữ. Điều này tạo ra một lịch sử không thể xóa và đáng tin cậy.\r\nNhược điểm:\r\n\r\nTốn Năng lượng:\r\n\r\nQuá trình xác nhận giao dịch trên blockchain đôi khi yêu cầu sự sử dụng lượng lớn năng lượng. Điều này có thể tạo ra vấn đề về môi trường, đặc biệt là trong các hệ thống sử dụng chứng minh công việc (Proof of Work).\r\nChưa Chuẩn hoá:\r\n\r\nDo blockchain là một công nghệ mới, chưa có chuẩn hoá đồng nhất. Điều này làm tăng khả năng xung đột và khó khăn trong việc tích hợp giữa các hệ thống khác nhau.', '2024-01-10', 'admin', '2024-01-10', NULL, 1, 1),
(2, 'Lợi ích của việc đọc sách', '742ievh8.jpg', 'Việc đọc sách không chỉ là một hình thức giải trí tuyệt vời mà còn mang lại nhiều lợi ích cho tâm hồn và trí óc của chúng ta. Qua từng trang sách, chúng ta có cơ hội khám phá thế giới mới, mở rộng tri thức, và trải nghiệm những câu chuyện sâu sắc về cuộc sống. Đọc sách không chỉ giúp nâng cao vốn từ vựng và kỹ năng suy luận, mà còn tạo ra một không gian tĩnh lặng giúp giảm căng thẳng. Bằng cách này, việc đọc sách trở thành một hành động giáo dục và giải trí tinh thần hữu ích trong cuộc sống hàng ngày.', '2024-01-10', 'admin', '2024-01-10', NULL, 1, 2),
(3, 'tập thể dục đối với sức khỏe tinh thần', 'ejsl9pz6.jpg', 'Tập thể dục không chỉ là cách duy trì thể chất mà còn là chìa khóa cho tâm hồn khỏe mạnh. Những buổi tập nhẹ đến vận động cao đều giúp cải thiện tâm trạng và giảm căng thẳng. Sự kích thích của cơ bắp kích thích sản xuất endorphin, \"hormone hạnh phúc,\" làm tăng cảm giác hạnh phúc và giảm mệt mỏi. Ngoài ra, việc tập thể dục thường xuyên còn có thể cải thiện giấc ngủ, tăng sự tập trung, và giúp kiểm soát cảm xúc. Vì vậy, hãy để việc tập thể dục trở thành một phần quan trọng của cuộc sống hàng ngày để tận hưởng lợi ích toàn diện cho sức khỏe tinh thần và thể chất.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 3),
(4, 'Tự Trọng Bản Thân và Sức Khỏe Tâm Thần', 'iuk8vxn2.jpg', 'Tự trọng bản thân đóng vai trò quan trọng trong việc duy trì sức khỏe tâm thần. Việc chấp nhận và yêu thương bản thân giúp chúng ta xây dựng tâm hồn mạnh mẽ và khả năng đối mặt với thách thức. Thực hành việc tự chăm sóc bản thân, như thiền định, thể dục, và thời gian nghỉ ngơi, đều có thể giúp giảm căng thẳng và cải thiện tinh thần. Đồng thời, việc tìm hiểu về bản thân, đặt mục tiêu, và phát triển kỹ năng cá nhân đều là bước quan trọng để xây dựng lòng tự tin và hạnh phúc trong cuộc sống hàng ngày. Tự trọng bản thân không chỉ là chìa khóa cho sự thoải mái tâm hồn mà còn là nền tảng để chúng ta đối mặt với thế giới một cách tích cực và tự tin.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 4),
(5, 'Nghệ Thuật Học Từ Sự Thất Bại', 'kiqspz9m.jpg', 'Sự thất bại thường được xem là một trải nghiệm tiêu cực, nhưng nó cũng là nguồn học quý báu. Trong cuộc sống, chúng ta thường gặp thất bại, nhưng cách chúng ta đối mặt và học từ nó có thể xác định sự thành công trong tương lai. Bài viết này sẽ khám phá cách nghệ thuật học từ sự thất bại, cung cấp cái nhìn về cách nhìn nhận tích cực về những thách thức, và làm thế nào những trải nghiệm này có thể làm giàu kiến thức và định hình tâm hồn chúng ta.', '2024-01-10', 'admin', '2024-01-10', NULL, 1, 5),
(6, 'Ảnh Hưởng của Kỹ Năng Giao Tiếp Trong Sự Nghiệp', 'vflo0tni.jpg', 'Kỹ năng giao tiếp đóng vai trò quan trọng trong mọi mặt của cuộc sống và đặc biệt là trong sự nghiệp. Bài viết này sẽ khám phá cách mà việc sử dụng hiệu quả kỹ năng giao tiếp có thể tác động đến sự thành công nghề nghiệp. Từ việc xây dựng mối quan hệ làm việc tích cực đến cách thức ảnh hưởng đến đồng đội và cấp trên, chúng ta sẽ tìm hiểu về những chiều sâu của kỹ năng giao tiếp và làm thế nào chúng có thể đóng góp tích cực vào sự phát triển cá nhân và sự nghiệp.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 6),
(7, 'Sức Mạnh của Sự Lạc Quan Trong Cuộc Sống', 'vkzunrx1.jpg', 'Lạc quan không chỉ là tư duy tích cực mà còn là một nguồn động viên mạnh mẽ. Bài viết này sẽ khám phá sức mạnh của tư duy lạc quan trong cuộc sống hàng ngày, từ cách nó tác động đến tâm trạng và tinh thần đến cách chúng ta đối mặt với những thách thức. Chúng ta sẽ tìm hiểu cách xây dựng tư duy lạc quan, ứng dụng nó trong công việc và mối quan hệ, và làm thế nào nó có thể là chìa khóa để sống một cuộc sống có ý nghĩa và hạnh phúc.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 7),
(8, 'Sự Quan Trọng của Kỹ Năng Quản Lý Thời Gian', 'sl4jikeq.jpg', 'Kỹ năng quản lý thời gian là một yếu tố quyết định giữa thành công và thất bại trong nhiều khía cạnh của cuộc sống. Bài viết này sẽ thảo luận về tầm quan trọng của việc hiểu biết và áp dụng hiệu quả kỹ năng quản lý thời gian. Từ việc xác định ưu tiên công việc đến cách phân chia thời gian hiệu quả giữa công việc và cuộc sống cá nhân, chúng ta sẽ tìm hiểu cách kỹ năng quản lý thời gian có thể tối ưu hóa hiệu suất và tạo ra một cuộc sống cân bằng và đáng sống.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 8),
(9, 'Hiệu Quả Của Việc Phát Triển Kỹ Năng Tư Duy Sáng Tạo', '047oj5ky.jpg', 'Sự sáng tạo không chỉ là đặc quyền của những người nghệ sĩ hay nhà khoa học. Bài viết này sẽ thảo luận về hiệu quả của việc phát triển kỹ năng tư duy sáng tạo trong cuộc sống hàng ngày. Chúng ta sẽ khám phá cách tư duy sáng tạo có thể giúp giải quyết vấn đề, tạo ra cơ hội mới và thậm chí làm thay đổi cách chúng ta nhìn nhận thế giới xung quanh. Bài viết sẽ cung cấp gợi ý và phương pháp để mọi người phát triển khả năng sáng tạo của mình, từ việc thúc đẩy tư duy độc lập đến việc khuyến khích sự tò mò và mở lòng đối với ý tưởng mới.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 9),
(10, 'Tầm Quan Trọng Của Sự Đa Dạng Trong Nơi Làm Việc', 'ak8t6cer.jpg', 'Sự đa dạng không chỉ là một ưu thế xã hội mà còn là chìa khóa để thành công trong nơi làm việc. Bài viết này sẽ khám phá tầm quan trọng của sự đa dạng trong việc tạo ra một môi trường làm việc tích cực và sáng tạo. Chúng ta sẽ thảo luận về cách sự đa dạng về ý kiến, kinh nghiệm và nguồn lực có thể thúc đẩy sự sáng tạo, giải quyết vấn đề hiệu quả và tạo ra một cộng đồng nơi mọi người đều được trọng dụng và đóng góp. Bài viết cũng sẽ nêu rõ những bước tiến cụ thể để khuyến khích và duy trì sự đa dạng trong nơi làm việc.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 10),
(11, 'Ưu và Nhược Điểm của Cuộc Sống Đô Thị', '6dxvszlr.jpg', 'Cuộc sống đô thị mang đến cho chúng ta những trải nghiệm đa dạng và tiện lợi, nhưng cũng đi kèm với những thách thức đặc biệt. Hãy cùng nhìn nhận một số ưu và nhược điểm của cuộc sống ở thành phố.\r\n\r\nMột trong những ưu điểm nổi bật của cuộc sống đô thị là sự thuận tiện. Thành phố là nơi tập trung nhiều tiện ích, từ các cửa hàng, nhà hàng, đến các trung tâm giải trí và giáo dục. Mọi thứ đều gần gũi, giúp tiết kiệm thời gian và công sức trong việc di chuyển.\r\n\r\nCuộc sống đô thị cũng mang lại nhiều cơ hội nghề nghiệp và giáo dục. Các trường đại học, trung tâm nghiên cứu, và doanh nghiệp tập trung tại đây, tạo ra môi trường phát triển với nhiều lựa chọn cho sự nghiệp và học vấn.\r\n\r\nTuy nhiên, cuộc sống ở thành phố cũng đặt ra nhiều thách thức. Môi trường ô nhiễm, áp lực công việc, và cuộc sống hối hả có thể tạo ra căng thẳng và ảnh hưởng đến sức khỏe tinh thần. Ngoài ra, chi phí sinh hoạt và nhà ở thường cao, đặt ra thách thức đối với những người muốn có cuộc sống ổn định và thoải mái.\r\n\r\nTrong khi cuộc sống đô thị có những lợi ích rõ ràng, việc đánh giá và cân nhắc kỹ lưỡng về những khía cạnh này là quan trọng. Mỗi người sẽ có cái nhìn khác nhau về định nghĩa của cuộc sống thành phố và quyết định chọn lựa phù hợp với mong muốn và giác quan cá nhân.', '2024-01-10', 'admin', '2024-01-10', 'admin', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(1) DEFAULT 0,
  `sale_off` int(3) DEFAULT 0,
  `picture` text DEFAULT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(12, 'UnrealScript Game Programming Cookbook', 'Designed for high-level game programming, UnrealScript is used in tandem with the Unreal Engine to provide a scripting language that is ideal for creating your very own unique gameplay experience. By learning how to replicate some of the advanced techniques used in today\'s modern games, you too can take your game to the next level and stand out from the crowd.\r\n\r\nBy providing a series of engaging and practical recipes, this \"UnrealScript Game Programming Cookbook\" will show you how to leverage the advanced functionality within UDK. You\'ll be shown how to implement a wide variety of practical features using the high-level scripting language ranging from designing your own HUD, creating your very own custom tailored weapons, to generating pathfinding solutions, and even meticulously crafting your own AI.', 25000, 1, 20, 'mj5oqp18.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 3, 3),
(13, 'Functional Programming in Scala', 'Functional programming (FP) is a programming style emphasizing functions that return consistent and predictable results regardless of a program\'s state. As a result, functional code is easier to test and reuse, simpler to parallelize, and less prone to bugs. Scala is an emerging JVM language that offers strong support for FP. Its familiar syntax and transparent interoperability with existing Java libraries make Scala a great place to start learning FP.\r\n\r\nFunctional Programming in Scala is a serious tutorial for programmers looking to learn FP and apply it to the everyday business of coding. The book guides readers from basic techniques to advanced topics in a logical, concise, and clear progression. In it, you\'ll find concrete examples and exercises that open up the world of functional programming.', 35000, 0, 3, '7kyub3oi.jpg', '2013-12-12', 'admin', '2013-12-13', 'admin', 1, 1, 3),
(14, 'iOS 7 Programming Fundamentals', 'If you\'re getting started with iOS development, or want a firmer grasp of the basics, this practical guide provides a clear view of its fundamental building blocks—Objective-C, Xcode, and Cocoa Touch. You\'ll learn object-oriented concepts, understand how to use Apple\'s development tools, and discover how Cocoa provides the underlying functionality iOS apps need to have. Dozens of example projects are available at GitHub.\r\n\r\nOnce you master the fundamentals, you\'ll be ready to tackle the details of iOS app development with author Matt Neuburg\'s companion guide.', 45000, 1, 0, 'm3brd79l.jpg', '2013-12-12', 'admin', '2013-12-12', 'admin', 1, 2, 3),
(15, 'iOS 7 Programming Cookbook', 'Overcome the vexing issues you\'re likely to face when creating apps for the iPhone, iPad, or iPod touch. With new and thoroughly revised recipes in this updated cookbook, you\'ll quickly learn the steps necessary to work with the iOS 7 SDK, including solutions for bringing real-world physics and movement to your apps with UIKit Dynamics APIs.\r\n\r\nYou\'ll learn hundreds of techniques for storing and protecting data, sending and receiving notifications, enhancing and animating graphics, managing files and folders, and many other options. Each recipe includes sample code you can use right away.', 44000, 0, 0, 'qx5m9u6t.jpg', '2013-12-12', 'admin', '2013-12-13', 'admin', 1, 3, 3),
(16, 'Advanced Programming in the UNIX Environment, 3rd Edition', 'For more than twenty years, serious C programmers have relied on one book for practical, in-depth knowledge of the programming interfaces that drive the UNIX and Linux kernels: W. Richard Stevens\' Advanced Programming in the UNIX Environment. Now, once again, Rich\'s colleague Steve Rago has thoroughly updated this classic work. The new third edition supports today\'s leading platforms, reflects new technical advances and best practices, and aligns with Version 4 of the Single UNIX Specification.\r\n\r\nSteve carefully retains the spirit and approach that have made this book so valuable. Building on Rich\'s pioneering work, he begins with files, directories, and processes, carefully laying the groundwork for more advanced techniques, such as signal handling and terminal I/O. He also thoroughly covers threads and multithreaded programming, and socket-based IPC.', 36000, 1, 2, '2yo48fgm.jpg', '2013-12-12', 'admin', '2024-01-09', 'admin', 1, 3, 3),
(17, 'jMonkeyEngine 3.0 Beginner', 'jMonkeyEngine 3.0 is a powerful set of free Java libraries that allows you to unlock your imagination, create 3D games and stunning graphics. Using jMonkeyEngine\'s library of time-tested methods, this book will allow you to unlock its potential and make the creation of beautiful interactive 3D environments a breeze.\r\n\r\njMonkeyEngine 3.0 Beginner\'s Guide teaches aspiring game developers how to build modern 3D games with Java. This primer on 3D programming is packed with best practices, tips and tricks and loads of example code. Progressing from elementary concepts to advanced effects, budding game developers will have their first game up and running by the end of this book.', 36000, 0, 12, 'cq7k0i4j.jpg', '2013-12-12', 'admin', '2024-01-09', 'admin', 1, 3, 3),
(18, 'Scala Cookbook', 'Save time and trouble when using Scala to build object-oriented, functional, and concurrent applications. With more than 250 ready-to-use recipes and 700 code examples, this comprehensive cookbook covers the most common problems you\'ll encounter when using the Scala language, libraries, and tools. It\'s ideal not only for experienced Scala developers, but also for programmers learning to use this JVM language.\r\n\r\nAuthor Alvin Alexander (creator of DevDaily.com) provides solutions based on his experience using Scala for highly scalable, component-based applications that support concurrency and distribution.', 46000, 1, 0, 'zpg6a0uw.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 10, 3),
(19, 'PostgreSQL Server Programming', 'Learn how to work with PostgreSQL as if you spent the last decade working on it. PostgreSQL is capable of providing you with all of the options that you have in your favourite development language and then extending that right on to the database server. With this knowledge in hand, you will be able to respond to the current demand for advanced PostgreSQL skills in a lucrative and booming market.\r\n\r\nPostgreSQL Server Programming will show you that PostgreSQL is so much more than a database server. In fact, it could even be seen as an application development framework, with the added bonuses of transaction support, massive data storage, journaling, recovery and a host of other features that the PostgreSQL engine provides.', 54000, 1, 5, 'x3et42jv.jpg', '2013-12-12', 'admin', '2013-12-12', 'admin', 1, 3, 2),
(20, 'Programming Drupal 7 Entities', 'Writing code for manipulating Drupal data has never been easier! Learn to dice and serve your data as you slowly peel back the layers of the Drupal entity onion. Next, expose your legacy local and remote data to take full advantage of Drupal\'s vast solution space.\r\n\r\nProgramming Drupal 7 Entities is a practical, hands-on guide that provides you with a thorough knowledge of Drupal\'s entity paradigm and a number of clear step-by-step exercises, which will help you take advantage of the real power that is available when developing using entities.', 58000, 1, 4, 'zosatu07.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 3, 2),
(21, 'Moving from C to C++', 'The author says it best, I hope to move you, a little at a time,from understanding C to the point where C++ becomes your mindset. This remarkable book is designed to streamline the process of learning C++ in a way that discusses programming problems, why they exist, and the approach C++ has taken to solve such problems.\r\n\r\nYou can\'t just look at C++ as a collection of features; some of the features make no sense in isolation. You can only use the sum of the parts if you are thinking about design, not simply coding. To understand C++, you must understand the problems with C and with programming in general. This book discusses programming problems, why they are problems, and the approach C++ has taken to solve such problems. Thus, the set of features that I explain in each chapter will be based on the way that I see a particular type of problem being solved in C++.', 36000, 0, 3, '901wh8tx.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 3, 2),
(22, 'C Programming for Arduino', 'Physical computing allows us to build interactive physical systems by using software & hardware in order to sense and respond to the real world. C Programming for Arduino will show you how to harness powerful capabilities like sensing, feedbacks, programming and even wiring and developing your own autonomous systems.\r\n\r\nC Programming for Arduino contains everything you need to directly start wiring and coding your own electronic project. You\'ll learn C and how to code several types of firmware for your Arduino, and then move on to design small typical systems to understand how handling buttons, leds, LCD, network modules and much more.', 38000, 1, 0, 'siochmyg.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 3, 3),
(23, 'Advanced Network Programming - Principles and Techniques', 'The field of network programming is so large, and developing so rapidly, that it can appear almost overwhelming to those new to the discipline.\r\n\r\nAnswering the need for an accessible overview of the field, this text/reference presents a manageable introduction to both the theoretical and practical aspects of computer networks and network programming. Clearly structured and easy to follow, the book describes cutting-edge developments in network architectures, communication protocols, and programming techniques and models, supported by code examples for hands-on practice with creating network-based applications.', 43000, 1, 0, 'vradhky9.jpg', '2013-12-12', 'admin', '2023-12-21', 'admin', 1, 3, 3),
(24, 'Programming Logics', 'This Festschrift volume, published in memory of Harald Ganzinger, contains 17 papers from colleagues all over the world and covers all the fields to which Harald Ganzinger dedicated his work during his academic career.\r\n\r\nThe volume begins with a complete account of Harald Ganzinger\'s work and then turns its focus to the research of his former colleagues, students, and friends who pay tribute to him through their writing. Their individual papers span a broad range of topics, including programming language semantics, analysis and verification, first-order and higher-order theorem proving, unification theory, non-classical logics, reasoning modulo theories, and applications of automated reasoning in biology.', 32000, 0, 1, 'sbx52yne.jpg', '2013-12-12', 'admin', '2023-12-26', 'admin', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `books` text NOT NULL,
  `prices` text NOT NULL,
  `quantities` text NOT NULL,
  `names` text NOT NULL,
  `pictures` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('ePfD6au', 'admin', '[\"13\",\"19\"]', '[\"33950\",\"51300\"]', '[\"1\",\"1\"]', '[\"Functional Programming in Scala\",\"PostgreSQL Server Programming\"]', '[\"7kyub3oi.jpg\",\"x3et42jv.jpg\"]', 0, '2013-12-18 11:20:51'),
('GoFw4UN', 'admin', '[\"13\",\"24\",\"16\",\"23\"]', '[\"33950\",\"31680\",\"35280\",\"34400\"]', '[\"2\",\"3\",\"3\",\"1\"]', '[\"Functional Programming in Scala\",\"Programming Logics\",\"Advanced Programming in the UNIX Environment, 3rd Edition\",\"Advanced Network Programming - Principles and Techniques\"]', '[\"7kyub3oi.jpg\",\"sbx52yne.jpg\",\"2yo48fgm.jpg\",\"vradhky9.jpg\"]', 0, '2013-12-25 06:41:06'),
('iKYZHlr', 'admin', '[\"13\",\"24\",\"16\"]', '[\"33950\",\"31680\",\"35280\"]', '[\"1\",\"2\",\"2\"]', '[\"Functional Programming in Scala\",\"Programming Logics\",\"Advanced Programming in the UNIX Environment, 3rd Edition\"]', '[\"7kyub3oi.jpg\",\"sbx52yne.jpg\",\"2yo48fgm.jpg\"]', 0, '2013-12-18 06:04:48'),
('zdebsc3', 'admin', '[\"13\"]', '[\"33950\"]', '[\"1\"]', '[\"Functional Programming in Scala\"]', '[\"7kyub3oi.jpg\"]', 0, '2013-12-18 06:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text DEFAULT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Văn Học - Tiểu Thuyết', 'hft8q1c3.jpg', '2013-12-09', 'admin', '2024-01-10', 'admin', 1, 10),
(2, 'Kinh Tế', '3snfyg8u.jpg', '2013-12-09', 'admin', '2024-01-10', 'admin', 1, 4),
(3, 'Tin học', 'zahorwby.jpg', '2013-12-09', 'admin', '2024-01-10', 'admin', 1, 10),
(4, ' Kỹ Năng Sống', 'bntdur5l.jpg', '2013-12-09', 'admin', '2023-12-26', 'admin', 1, 1),
(5, 'Thiếu Nhi', 'kt5h9ica.jpg', '2013-12-09', 'admin', '2023-12-26', 'admin', 1, 10),
(6, ' Thường Thức - Đời Sống', 'tv8basyz.jpg', '2013-12-09', 'admin', '2023-12-26', 'admin', 1, 2),
(7, 'Ngoại Ngữ - Từ Điển', 'zruvqadp.jpg', '2013-12-09', 'admin', '2023-12-26', 'admin', 1, 5),
(8, 'Truyện Tranh', '5hd9kq6s.jpeg', '2013-12-09', 'admin', '2023-12-26', 'admin', 1, 10),
(9, ' Văn Hoá - Nghệ Thuật', 'btkjrfal.jpg', '2013-12-06', 'admin', '2024-01-21', 'admin', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` date DEFAULT curdate(),
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT curdate(),
  `modified_by` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `title`, `content`, `phone`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'nthp', 'nthp@gmail.com', 'title 1', 'day la content 1', '093836384737', '0000-00-00', NULL, '0000-00-00', NULL, 0, 10),
(2, 'teo', 'teo@gmail.com', 'title 2', 'day la content 2', '0973938383', '0000-00-00', NULL, '2023-12-21', 'admin', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE `faq_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` date DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT current_timestamp(),
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Thông tin sản phẩm', '2023-12-26', NULL, '2023-12-26', 'admin', 1, 10),
(2, 'Thông tin liên hệ', '2023-12-26', NULL, '2023-12-27', 'admin', 1, 5),
(3, 'Chính sách đổi trả', '2023-12-26', NULL, '2023-12-27', 'admin', 0, 4),
(4, 'Hình thức thanh toán', '2023-12-26', NULL, '2024-01-04', 'admin', 1, 3),
(5, 'Hình thức vận chuyển', '2023-12-26', NULL, '2023-12-27', 'admin', 1, 2),
(6, 'Chính sách ưu đãi', '2023-12-26', NULL, '2023-12-27', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_item`
--

CREATE TABLE `faq_item` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `faq_category_id` varchar(255) NOT NULL,
  `created` date DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT current_timestamp(),
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_item`
--

INSERT INTO `faq_item` (`id`, `question`, `answer`, `faq_category_id`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Sản phẩm sản xuất từ đâu ', 'Tất cả sản phẩm đều đa dạng từ: VietNam, China ,Japan', '1', '2023-12-27', NULL, '2023-12-27', 'admin', 1, 4),
(2, 'Thông tin liên hệ giải đáp và đặt hàng', 'Hãy gọi đến: 113-114-115 sẽ có tư vấn viên hỗ trợ', '2', '2023-12-27', NULL, '2023-12-27', 'admin', 1, 3),
(3, 'Tôi có thể đổi/trả như thế nào', 'Tùy theo sản phẩm mà nhà cung cấp đưa ra. Thông thường từ 7 đến 15 ngày sử dụng', '3', '2023-12-27', NULL, '2023-12-27', 'admin', 1, 2),
(4, 'Nếu như sản phẩm bị lỗi thì tôi phải làm sao', 'Hãy gọi đến: 113-114-115 để chúng tôi hỗ trợ bạn một cách nhanh nhất.', '3', '2023-12-27', NULL, '2023-12-27', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT 0,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10,
  `privilege_id` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `privilege_id`, `picture`) VALUES
(1, 'Admin', 1, '2013-11-11', 'admin', '2023-12-21', 'admin', 1, 5, '1,2,3,4,5,6,7,8,9,10', ''),
(2, 'Manager', 1, '2013-11-07', 'admin', '2023-12-22', 'admin', 1, 4, '1,2,3,4,6,7,8,9,10', ''),
(3, 'Member', 0, '2013-11-12', 'admin', '2023-12-22', 'admin', 1, 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `code`, `fullname`, `email`, `phone`, `address`, `order_time`, `status`, `total_price`) VALUES
(24, 'M9nQ5R', 'wedwe', 'adwed@email.com', '32154561515', 'wedwedede', '2024-01-20 20:08:59', 2, 135800.00),
(25, 'YWQB0s', 'John Doe', 'john@gmail.com', '56256220510', '95231/F.anc', '2024-01-21 18:34:33', 4, 232310.00),
(26, 'MmYv2T', 'Nguyễn Văn Tèo', 'teo@gmail.com', '2512515151', 'abc/123', '2024-01-21 21:47:50', 2, 135000.00),
(27, 'FPL49M', 'vịt', 'vit@gmail.com', '3555565651', 'vit123', '2024-01-22 00:57:20', 4, 33950.00),
(28, 'Jemzh6', 'gà', 'gà@email.com', '15565656156', 'gakfc', '2024-01-22 00:57:52', 1, 65000.00),
(29, 'urZOCM', 'lukaku', 'lukaku@lakaka.com', '5656156156', 'lukaku123', '2024-01-22 00:58:50', 3, 69840.00),
(36, 'ooEtzD', 'test', 'test@test,com', '7896551251251251', 'test', '2024-01-22 04:20:07', 1, 141860.00),
(44, '7pxuOg', 'Nthp', 'nguyentrinhhoangphuong@gmail.com', '01235555151', 'abc/123', '2024-01-22 06:16:10', 5, 361440.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `bookId`, `order_id`, `quantity`, `price`, `total`, `name`, `picture`) VALUES
(16, 13, 24, 4, 33950.00, 33950.00, 'Functional Programming in Scala', '7kyub3oi.jpg'),
(17, 17, 25, 2, 31680.00, 31680.00, 'jMonkeyEngine 3.0 Beginner', 'cq7k0i4j.jpg'),
(18, 13, 25, 1, 33950.00, 33950.00, 'Functional Programming in Scala', '7kyub3oi.jpg'),
(19, 14, 25, 3, 45000.00, 135000.00, 'iOS 7 Programming Fundamentals', 'm3brd79l.jpg'),
(20, 23, 26, 1, 43000.00, 43000.00, 'Advanced Network Programming - Principles and Techniques', 'vradhky9.jpg'),
(21, 18, 26, 2, 46000.00, 46000.00, 'Scala Cookbook', 'zpg6a0uw.jpg'),
(22, 13, 27, 1, 33950.00, 33950.00, 'Functional Programming in Scala', '7kyub3oi.jpg'),
(23, 14, 28, 1, 45000.00, 45000.00, 'iOS 7 Programming Fundamentals', 'm3brd79l.jpg'),
(24, 12, 28, 1, 20000.00, 20000.00, 'UnrealScript Game Programming Cookbook', 'mj5oqp18.jpg'),
(25, 21, 29, 2, 34920.00, 34920.00, 'Moving from C to C++', '901wh8tx.jpg'),
(32, 12, 36, 1, 20000.00, 20000.00, 'UnrealScript Game Programming Cookbook', 'mj5oqp18.jpg'),
(33, 16, 36, 2, 35280.00, 35280.00, 'Advanced Programming in the UNIX Environment, 3rd Edition', '2yo48fgm.jpg'),
(34, 19, 36, 1, 51300.00, 51300.00, 'PostgreSQL Server Programming', 'x3et42jv.jpg'),
(42, 12, 44, 1, 20000.00, 20000.00, 'UnrealScript Game Programming Cookbook', 'mj5oqp18.jpg'),
(43, 23, 44, 1, 43000.00, 43000.00, 'Advanced Network Programming - Principles and Techniques', 'vradhky9.jpg'),
(44, 16, 44, 3, 35280.00, 35280.00, 'Advanced Programming in the UNIX Environment, 3rd Edition', '2yo48fgm.jpg'),
(45, 19, 44, 2, 51300.00, 51300.00, 'PostgreSQL Server Programming', 'x3et42jv.jpg'),
(46, 14, 44, 2, 45000.00, 45000.00, 'iOS 7 Programming Fundamentals', 'm3brd79l.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Hiển thị danh sách người dùng', 'admin', 'user', 'index'),
(2, 'Thay đổi status của người dùng', 'admin', 'user', 'status'),
(3, 'Cập nhật thông tin của người dùng', 'admin', 'user', 'form'),
(4, 'Thay đổi status của người dùng sử dụng Ajax', 'admin', 'user', 'ajaxStatus'),
(5, 'Xóa một hoặc nhiều người dùng', 'admin', 'user', 'trash'),
(6, 'Thay đổi vị trí hiển thị của các người dùng', 'admin', 'user', 'ordering'),
(7, 'Truy cập menu Admin Control Panel', 'admin', 'index', 'index'),
(8, 'Đăng nhập Admin Control Panel', 'admin', 'index', 'login'),
(9, 'Đăng xuất Admin Control Panel', 'admin', 'index', 'logout'),
(10, 'Cập nhật thông tin tài khoản quản trị', 'admin', 'index', 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `sider`
--

CREATE TABLE `sider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(10) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `modified` date NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sider`
--

INSERT INTO `sider` (`id`, `title`, `description`, `image`, `status`, `ordering`, `link`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(18, 'Tin Học', 'Tin học hay khoa học thông tin (gọi tắt là tin) (tiếng Anh: informatics, tiếng Pháp: informatique) là một ngành khoa học chuyên nghiên cứu quá trình tự động', '4xtkiypm.jpg', 1, 3, 'http://localhost/zend/final_project_php/index.php?module=shop&controller=category&action=index&category_id=3', '2024-01-09', 'admin', '2024-01-09', 'admin'),
(19, 'Kinh Tế', 'Kinh tế là một lĩnh vực sản xuất, phân phối và thương mại, cũng như tiêu dùng hàng hóa và dịch vụ. Tổng thể, nó được định nghĩa là một lĩnh vực xã hội tập trung vào các hoạt động, tranh luận và các biểu hiện vật chất gắn liền với việc sản xuất, sử dụng và', 'w82vaegh.jpg', 1, 3, 'http://localhost/zend/final_project_php/index.php?module=shop&controller=category&action=index&category_id=2', '2024-01-09', 'admin', '2024-01-09', 'admin'),
(20, 'slider 4', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis consequuntur debitis autem quidem suscipit voluptatum nam, earum et atque eveniet quo nihil magnam unde quia commodi sint cumque totam.', 'saf82nek.jpg', 1, 4, '', '2024-01-09', 'admin', '2024-01-09', ''),
(21, 'slider 5', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis consequuntur debitis autem quidem suscipit voluptatum nam, earum et atque eveniet quo nihil magnam unde quia commodi sint cumque totam.', 'ha5yb43n.jpg', 1, 5, '', '2024-01-09', 'admin', '2024-01-09', ''),
(22, 'slider 6', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis consequuntur debitis autem quidem suscipit voluptatum nam, earum et atque eveniet quo nihil magnam unde quia commodi sint cumque totam.', 'qch1pt79.jpg', 1, 6, '', '2024-01-09', 'admin', '2024-01-09', ''),
(23, 'slider 7', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi veritatis consequuntur debitis autem quidem suscipit voluptatum nam, earum et atque eveniet quo nihil magnam unde quia commodi sint cumque totam.', 'hj8m6s9g.jpg', 1, 7, '', '2024-01-09', 'admin', '2024-01-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(45) DEFAULT NULL,
  `register_date` datetime DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `register_date`, `register_ip`, `status`, `ordering`, `group_id`) VALUES
(1, 'nvan', 'nvan@gmail.com', 'Nguyễn Văn An', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 1, 4, 1),
(2, 'nvb', 'nvb@gmail.com', 'Nguyễn Văn B', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 1, 3, 2),
(3, 'nvc', 'nvc@gmail.com', 'Nguyễn Văn C', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 1, 2, 3),
(4, 'admin', 'admin@gmail.com', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '1', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, 1, 1, 2),
(5, 'nguyenvana1', 'lthlan54@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:45', '127.0.0.1', 0, 10, 0),
(6, 'nguyenvana2', 'lthlan55@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:09', '127.0.0.1', 0, 10, 0),
(7, 'nguyenvana4', 'lthlan56@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '0000-00-00', NULL, '2013-11-19 18:11:08', '127.0.0.1', 0, 10, 0),
(8, 'nguyenvana12', 'lthlan541@gmail.com', 'Admin 3', '3b269d99b6c31f1467421bbcfdec7908', '0000-00-00', NULL, '2013-12-02', '4', '2013-11-19 18:11:06', '127.0.0.1', 1, 12, 1),
(9, 'nguyenvana122', 'lthlan5412@gmail.com', '', '3b269d99b6c31f1467421bbcfdec7908', '2013-12-02', '4', '2013-12-02', '4', '0000-00-00 00:00:00', NULL, 0, 1, 3),
(10, 'admin01', 'admin01@gmail.com', 'Admin 123', 'e5c0fe73b84c06f43393b87a9c6acaa1', '0000-00-00', NULL, '2013-12-07', 'admin', '2013-12-03 08:12:23', '127.0.0.1', 0, 10, 2),
(11, 'hoangphuong965', 'hoangphuong965@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', NULL, '0000-00-00', NULL, '2024-01-14 18:01:40', '::1', 0, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_category`
--
ALTER TABLE `faq_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_item`
--
ALTER TABLE `faq_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sider`
--
ALTER TABLE `sider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_category`
--
ALTER TABLE `faq_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faq_item`
--
ALTER TABLE `faq_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sider`
--
ALTER TABLE `sider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

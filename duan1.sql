-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 06, 2023 lúc 06:18 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(10) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(2, 'Xì Gà Điếu Lớn'),
(5, 'Xì Gà Hiếm'),
(13, 'Thuốc Lá'),
(19, 'Xì Gà Mini');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(10) NOT NULL,
  `id_user` int(10) NOT NULL DEFAULT 0,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `ngaydathang` varchar(40) NOT NULL,
  `trangthai` tinyint(10) DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lí\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `thanhtoan` tinyint(10) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán trực tiếp\r\n2.Chuyển khoản\r\n3.Thanh toán online',
  `tongdonhang` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `user`, `email`, `sdt`, `diachi`, `ngaydathang`, `trangthai`, `thanhtoan`, `tongdonhang`) VALUES
(132, 22, 'Thang', 'quantmph30701@fpt.edu.vn', 1234567890, 'Quỳnh đô', '06/09/2023', 0, 0, 90000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order_details` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `gia` int(10) NOT NULL,
  `soluong` varchar(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `thanhtien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id_order_details`, `id_product`, `id_order`, `gia`, `soluong`, `id_user`, `anh`, `tensp`, `thanhtien`) VALUES
(130, 56, 132, 15000, '6', 22, 'upload/thuocla6.jpg', 'THUỐC LÁ NET', '75000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` int(10) NOT NULL,
  `soluong` varchar(100) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `id_danhmuc` int(10) NOT NULL,
  `ngaydang` date NOT NULL,
  `ngaycapnhat` date NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `tensp`, `gia`, `soluong`, `mota`, `id_danhmuc`, `ngaydang`, `ngaycapnhat`, `anh`) VALUES
(17, 'CIGAR CAO FLAVOURS BELLA VANILLA TUBO', 280000, '', 'Cigar CAO Flavours Bella Vanilla Tubo - Xì Gà Chính Hãng là một trong những lựa chọn tuyệt vời cho những người yêu thích hương vị vani dịu nhẹ và muốn tận hưởng một trải nghiệm xì gà cao cấp. Với kích thước 4 3/4 ring 30, làn khói có một thiết kế đẹp mắt và tiện dụng với ống nhôm bảo vệ xì gà và giúp giữ cho hương vị và độ tươi mới. Những làn khói êm dịu này mang đến trải nghiệm thấm đẫm hương vị tuyệt vời nhất cho những khách hàng thích hương vị vani', 19, '0000-00-00', '0000-00-00', 'xigamini1.jpg'),
(18, 'CIGAR PARTAGAS BLACK LABEL PRONTOS', 130000, '', 'Cigar Partagas Black Label Prontos - Xì Gà Chính Hãng với kích thước xì gà mini 106,4mm x ring 36 trong dòng Partagas Black mà anh em có thể thưởng thức hương vị đậm đà, tuyệt vời nhưng không tốn quá nhiều thời gian. Được đóng gói trong hộp thiếc gồm 6 điếu, Pronto là loại xì gà nhỏ nhưng sức mạnh vô cùng lớn. Loại Pronto này sẽ thỏa mãn cơn thèm của anh em đối với một loại maduro đậm đà, béo ngậy, có vị vừa phải. Đây là một loại xì gà có độ nặng cực đậm và hương vị cực kỳ phong phú', 19, '0000-00-00', '0000-00-00', 'xigamini2.jpg'),
(19, 'CIGAR NEONLIS MINI 6 CIGARS', 75000, '', 'Cigar Neonlis Mini Cigars Chính hãng - Hộp 6 Điếu là sản phẩm xì gà lõi ngắn được cuốn hoàn toàn thủ công tại Việt Nam. Nếu anh em không có thời gian để thưởng thức xì gà truyền thống thì xì gà mini là giải pháp hoàn hảo. Thiết kế nhỏ gọn, thời gian thưởng thức ngắn Neonlis Mini rất thích hợp cho những buổi cà phê buổi sáng hoặc sau giờ giải lao ngắn. Những làn khói nhỏ với cấu trúc chắc chắn và đầy đủ hương vị để giữ cho trải nghiệm xì gà của anh em ở mức tốt nhất', 19, '0000-00-00', '0000-00-00', 'xigamini3.jpg'),
(20, 'CIGAR MACANUDO CAFÉ ASCOT', 125000, '', 'Xì Gà Macanudo Cafe Ascot là một làn khói ngắn cổ điển dành cho tất cả những người yêu thích xì gà nhưng không có nhiều thời gian. Được pha trộn bằng cách sử dụng lá Filler của Mexico và Dominica, cùng lá Wrapper mềm mịn Connecticut Shade. Mang lại hương vị gỗ sang trọng, được kết hợp cùng những nốt vị tinh tế của đất, gia vị và kem nhẹ và béo ngậy', 19, '0000-00-00', '0000-00-00', 'xigamini4.jpg'),
(21, 'CIGAR DAVIDOFF MINI CIGARILLOS GOLD', 2250000, '', 'Davidoff Mini Cigarillos Gold là loại xì gà mini được làm thủ công chuyên nghiệp có cấu trúc cực kỳ tốt, nhỏ nhắn, có trong hộp gỗ 50 điếu. Độ nặng trung bình hoàn hảo với hương vị đầy đủ, hài hòa, trọn vẹn với độ kem, chút tiêu trắng và vị thảo mộc tinh tế. Tận hưởng 15 phút sang trọng thuần túy sẽ khiến bạn hài lòng', 19, '0000-00-00', '0000-00-00', 'xigamini5.jpg'),
(22, 'CIGAR UGLY COYOTE CHOCOLATE ', 295000, '', 'Dòng Xì gà Ugly Coyote được ra đời trong một nhà máy xì gà nhỏ tại Honduras. Bản thân xì gà Ugly Coyote được quấn theo phong cách bán thủ công, từng điếu thuốc sẽ được cuốn tay và có sự hỗ trợ của máy khiến nó đầy và chặt hơn. Làm từ lá vụn xì gà của Honduras và Nicaraguan. Bao bì giấy nhôm chứa 8 điếu tẩm hương vị đắng sô cô la với hậu vị ngọt ngào. Chiều dài 108mm và vòng ring 32', 19, '0000-00-00', '0000-00-00', 'xigamini8.jpg'),
(23, 'CIGAR OLIVA SERIE O CIGARILLOS', 145000, '', 'Xì gà Oliva thuộc Series O đình đám với kích thước nhỏ gọn và được quấn từ các loại lá ngon nhất được trồng ở 3 thung lũng Esteli, Condega và Jalapa ở Nicaragua với điểm nhấn lá quấn ngoài Habano Sungrown với độ nặng trung bình và hương vị của bánh mì nướng, tiêu, quế, gỗ tuyết tùng và cà phê.', 19, '0000-00-00', '0000-00-00', 'xigamini9.jpg'),
(24, 'CIGAR H UPMANN 1844 RESERVE APERITIFS', 130000, '', 'H. Upmann 1844 Reserve Aperitifs là một loại xì gà có Wrapper Ecuadorian Habano tự nhiên được đặt trên Binder Nicaragua và Filler Dominica. Làn khói ngắn nhưng hương vị đậm đà với một tông vị màu ấm thơm ngon của đất, hạt tiêu trắng và một loạt các hương vị kem được nhấn nhá bằng một chút gia vị. Nó được làm thủ công một cách chuyên nghiệp tại Cộng hòa Dominica tại nhà máy Tabacalera de Garcia. Đây là đặc điểm hương vị xì gà cổ điển mà mọi tín đồ xì gà nên thử ít nhất một lần trong đời', 19, '0000-00-00', '0000-00-00', 'xigamini6.jpg'),
(25, 'CIGAR ROMEO Y JULIETA 1875 ROMEOS ', 70000, '', 'Cigar Romeo Y Julieta 1875 Romeos - Xì Gà Chính Hãng là điếu xì gà có kích thước nhỏ cuốn tay hoàn toàn với cấu trúc tuyệt vời. Đây là điếu xì gà hoàn hảo dành cho những khoảnh khắc nhỏ, cà phê nhẹ với bạn bè. Điếu xì gà kích thước Small Panatela chiều dài 101mm x vòng ring 33 nhẹ nhàng thanh cảnh hương vị êm dịu với các nốt hương của gỗ hickory, gia vị và sô cô la đen', 19, '0000-00-00', '0000-00-00', 'xigamini10.jpg'),
(26, 'CIGAR H UPMANN 1844 8 COUNT TORO CIGAR', 2750000, '', 'Cigar H Upmann 1844 8 Count Toro Cigar Sampler - Xì Gà Chính Hãng là sự kết hợp hoàn hảo giữa chất lượng và hương vị độc đáo. Được đánh giá cao về danh tiếng và chất lượng, thương hiệu H. Upmann 1844 đem đến trải nghiệm xì gà đẳng cấp. Bộ sưu tập không chỉ là lựa chọn tuyệt vời cho người yêu thích xì gà mà còn là một món quà ý nghĩa với thiết kế hộp quà bắt mắt. Với chất lượng đảm bảo và một loạt các hương vị tinh tế, xứng đáng trở thành một phần không thể thiếu trong thế giới xì gà', 19, '0000-00-00', '0000-00-00', 'xigadl1.jpg'),
(27, 'CIGAR MONTECRISTO COLLECTION SERIES 5 TORO', 2800000, '', 'Đắm chìm trong thế giới hương vị tuyệt đỉnh của Cigar Montecristo Collection Series 5 Toro Cao Cấp - Xì Gà Chính Hãng. Với loạt các dòng xì gà độc đáo, từ nhẹ nhàng đến mạnh mẽ, bạn sẽ trải nghiệm một hành trình tinh tế qua thương hiệu xì gà danh tiếng Montecristo. Dành thời gian thưởng thức những điếu xì gà chất lượng cao từ Montecristo Collection Series ngay hôm nay', 2, '0000-00-00', '0000-00-00', 'xigadl2.jpg'),
(28, 'CIGAR KENTUCKY FIRE CURED CHUNKY ', 245000, '', 'Cigar Kentucky Fire Cured Chunky - Xì Gà Chính Hãng độc đáo với hương vị BBQ và lá thuốc Kentucky Fire Cured. Với chiều dài 4 inches (101,6 mm) và vòng ring 46, đây là lựa chọn thú vị cho người yêu xì gà. Sản xuất thủ công tại Nicaragua, xì gà này mang trong mình hương vị mùn, da và gỗ. Được đóng gói trong dạng \"chunky\" nhỏ gọn, chiếc xì gà này mang đến một trải nghiệm tiện lợi và thú vị', 2, '0000-00-00', '0000-00-00', 'xigadl3.jpg'),
(29, 'CIGAR DREW ESTATE INFUSED GIFT', 180000, '', 'Cigar Drew Estate Infused Gift Set Kèm Dao Cắt Và Gác Điếu - Xì Gà Chính Hãng mang đến cho anh em một trải nghiệm xì gà độc đáo với những dòng xì gà tẩm ướp thơm chất lượng cao. Từ ACID Kuba Kuba đầy tươi mát đến Drew Estate Tabak Especial với hương vị cà phê đậm đà, bộ quà tặng này không chỉ là món quà hoàn hảo cho người yêu xì gà mà còn là cơ hội trải nghiệm hương vị đa dạng từ thương hiệu hàng đầu. Đồng thời, với bộ cắt xì gà và giá đỡ kèm theo, anh em sẽ có trọn vẹn mọi thứ cần để thưởng thứ', 2, '0000-00-00', '0000-00-00', 'xigadl4.jpg'),
(30, ' ROMEO PREMIUM CIGAR ASSORTMENT ', 900000, '', 'Combo 4 Điếu Romeo Premium Cigar Assortment Size Corona Chính Hãng là một cơ hội tuyệt vời để khám phá đa dạng hương vị từ một trong những thương hiệu xì gà nổi tiếng nhất thế giới. Bao gồm bốn loại xì gà độc đáo, từ cổ điển đến đậm đà, tinh tế và thanh lịch, bộ sưu tập này thích hợp để thử nghiệm và làm quà tặng. Chế tác bởi các chuyên gia, đây là cơ hội cho bạn để trải nghiệm chất lượng và hương vị của Romeo y Julieta', 19, '0000-00-00', '0000-00-00', 'xigadl5.jpg'),
(31, 'CIGAR ASHTON VSG ROBUSTO ESPECIAL', 630000, '', 'Cigar Ashton VSG Robusto Especial - Xì Gà Dominica Chính Hãng được pha trộn từ lớp lá Wrapper Ecuador Sumatra đỏ đậm và Filler đặc trưng của Cộng hòa Dominica, Ashton VSG là một trong những loại xì gà toàn thân tốt nhất trên thị trường. Dòng xì gà này hứa hẹn mang đến trải nghiệm xì gà không thể nào quên cho những người yêu thích hương vị phong phú và tinh tế. Thêm Ashton VSG vào bộ sưu tập của anh em và cùng thưởng thức những khoảnh khắc đáng nhớ bên những người bạn thân nhất', 2, '0000-00-00', '0000-00-00', 'xigadl6.jpg'),
(32, 'CIGAR MONTECRISTO CRAFTED', 400000, '', 'Cigar Montecristo Crafted by AJ Fernandez Gordo - Xì Gà Chính Hãng là sự kết hợp độc đáo giữa Montecristo và AJ Fernandez, hai người nắm giữ vai trò quan trọng trong ngành công nghiệp xì gà cao cấp. Montecristo là một thương hiệu xì gà được biết đến rộng rãi và có tiếng tăm lâu đời trong làng xì gà, với sự chú trọng đến chất lượng và hương vị tuyệt vời. Hương vị hòa quyện tuyệt vời của ca cao đen, cà phê espresso, da thuộc và cam thảo. Các nốt hương này tạo ra một sự đa chiều và phong phú, mang ', 2, '0000-00-00', '0000-00-00', 'xigadl7.jpg'),
(33, 'CIGAR MONTECRISTO HUMIDOR COLLECTION', 4000000, '', 'Cigar Montecristo Humidor Collection 10 Điếu Cao Cấp - Xì Gà Chính Hãng là một bộ sưu tập không thể thiếu cho những người yêu thích xì gà cao cấp. Được tạo ra từ những nguyên liệu tốt nhất và công nghệ sản xuất hàng đầu, mỗi điếu trong bộ sưu tập này đều mang đến những trải nghiệm thưởng thức xì gà tuyệt vời. Hộp humidor đi kèm còn làm tăng thêm sự giá trị và phong cách cho bộ sưu tập', 2, '0000-00-00', '0000-00-00', 'xigadl8.jpg'),
(34, 'CIGAR DREW ESTATE FREE STYLE LIVE EVENT', 2650000, '', 'Cigar Drew Estate Free Style Live Event - Xì Gà Chính Hãng bao gồm một hộp 4 điếu xì gà cao cấp không có dải tem xì gà hương vị bí ẩn của Drew Estate, mang lại sự thú vị khi anh em thưởng thức chúng. Bên cạnh đó, anh em còn được trang bị một hộp da đựng 4 điếu xì gà Freestyle Live, một bật lửa Freestyle Live và một đế xì gà Freestyle Live. Ngoài ra, mỗi Bộ Sưu Tập Freestyle Live còn đi kèm với một mã QR, anh em có cơ hội giành được những phần thưởng tuyệt vời do Drew Estate tài trợ. Đừng bỏ lỡ c', 19, '0000-00-00', '0000-00-00', 'xigadl9.jpg'),
(35, 'CIGAR H UPMANN 1844 8 COUNT TORO', 2750000, '', 'Cigar H Upmann 1844 8 Count Toro Cigar Sampler - Xì Gà Chính Hãng là sự kết hợp hoàn hảo giữa chất lượng và hương vị độc đáo. Được đánh giá cao về danh tiếng và chất lượng, thương hiệu H. Upmann 1844 đem đến trải nghiệm xì gà đẳng cấp. Bộ sưu tập không chỉ là lựa chọn tuyệt vời cho người yêu thích xì gà mà còn là một món quà ý nghĩa với thiết kế hộp quà bắt mắt. Với chất lượng đảm bảo và một loạt các hương vị tinh tế, xứng đáng trở thành một phần không thể thiếu trong thế giới xì gà', 2, '0000-00-00', '0000-00-00', 'xigadl1.jpg'),
(36, 'ROMEO PREMIUM CIGAR ASSORTMENT', 900000, '', 'Combo 4 Điếu Romeo Premium Cigar Assortment Size Corona Chính Hãng là một cơ hội tuyệt vời để khám phá đa dạng hương vị từ một trong những thương hiệu xì gà nổi tiếng nhất thế giới. Bao gồm bốn loại xì gà độc đáo, từ cổ điển đến đậm đà, tinh tế và thanh lịch, bộ sưu tập này thích hợp để thử nghiệm và làm quà tặng. Chế tác bởi các chuyên gia, đây là cơ hội cho bạn để trải nghiệm chất lượng và hương vị của Romeo y Julieta', 2, '0000-00-00', '0000-00-00', 'xigadl5.jpg'),
(37, 'THUỐC LÁ CAMEL CASTER BLACK TEA', 38000, '', 'Thuốc Lá Camel Caster Black Tea - Thuốc Lá Bấm Vị Trà Đen là một trong những sản phẩm đột phá của hãng thuốc lá nổi tiếng Camel. Mang hương vị sang trọng, thanh tao của trà đen được nướng đậm đà, the mát, chút ngọt ngào vị vani phù hợp với nhiều khẩu vị hút khác nhau khiến dòng thuốc lá độc đáo này trở nên phổ biến và được khách hàng ưa chuộng. XGND cung cấp cho anh em những gói thuốc lạc đà cao cấp chính hãng với giá rất hợp lý', 13, '0000-00-00', '0000-00-00', 'thuocla1.jpg'),
(38, 'THUỐC LÁ CAMEL COMPACT MELON', 30000, '', 'Thuốc Lá Camel Compact Melon - Thuốc Lá Bấm Vị Dưa Hấu là một trong những sản phẩm đột phá của hãng thuốc lá nổi tiếng Camel. Đây là dòng thuốc lá chất lượng cao khi hút sẽ có hương thơm nhẹ rất đặc trưng của vị dưa hấu ngọt ngào. Mang hương vị hiện đại để phù hợp với nhiều khẩu vị hút khác nhau khiến dòng thuốc lá độc đáo này trở nên phổ biến và được nhiều khách hàng ưa chuộng', 13, '0000-00-00', '0000-00-00', 'thuocla2.jpg'),
(39, 'THUỐC LÁ CAMEL FRESH BERRY', 38000, '', 'Thuốc Lá Camel Fresh Berry - Camel Lạc Đà Hai Bấm là dòng thuốc lá có hai bấm mang hương vị berry bạc hà the mát thơm ngon. Khi hút thuốc, bạn sẽ cảm nhận được một hương vị hoa quả nhẹ nhàng. Đây là một lựa chọn tuyệt vời cho những người muốn thưởng thức một loại thuốc lá mang lại hương vị mới lạ. Nếu anh em không có quá nhiều thời gian để hút xì gà vậy thì thuốc lá sẽ là một giải pháp ngay tức thời dành cho anh em', 13, '0000-00-00', '0000-00-00', 'thuocla3.jpg'),
(40, 'THUỐC LÁ MEVIUS 3 WIND BLUE', 36000, '', 'Thuốc Lá Mevius 3 Wind Blue - Thuốc Lá Chính Hãng được đặc trưng với màu sắc chủ đạo là xanh nhạt mang đến cho người dùng cảm giác thư giãn và sự thăng hoa của tinh thần. Hương vị nhẹ nhàng và đầy sức sống, không quá gắt như các sản phẩm thuốc lá khác, giúp người dùng có được cảm giác thư giãn và dễ chịu. Được thiết kế với kiểu dáng thanh lịch và hiện đại, tạo nên một sản phẩm thuốc lá đẹp mắt và sang trọng', 13, '0000-00-00', '0000-00-00', 'thuocla4.jpg'),
(41, 'THUỐC LÁ MEVIUS 8 SKY BLUE', 36000, '', 'Thuốc Lá Mevius 8 Sky Blue - Thuốc Lá Chính Hãng là một sản phẩm thuốc lá mang thương hiệu Mevius, một trong những thương hiệu thuốc lá hàng đầu được ưa chuộng tại Nhật Bản và trên thế giới. Có thiết kế đẹp mắt, mỏng nhẹ và được sản xuất với công nghệ tiên tiến, giúp cho người dùng có được trải nghiệm hút thuốc lá thật tuyệt vời. Hương thơm thuốc lá truyền thống êm dịu và không quá gắt, đặc biệt là độ cháy đồng đều, anh em có thể thư giãn trong khoảng 15 phút', 13, '0000-00-00', '0000-00-00', 'thuocla5.jpg'),
(43, 'CIGAR CAMACHO LIBERTY 2020 GORDO', 850000, '', 'Cigar Camacho Liberty 2020 Gordo là phiên bản giới hạn, với tổng cộng 4,185 hộp mang hương ngọt ngào của gỗ tuyết tùng, quả óc chó hòa quyện với hương quế và vị cay. Được sử dụng từ những chiếc lá xì gà cao cấp Wrapper habano từ Ecuador, Binder corojo của Honduras, và Filler từ Cộng hòa Dominica và Honduras. Theo Davidoff của Geneva Hoa Kỳ, những dòng lá này được ủ 4 năm tuổi trước khi được sản xuất', 5, '0000-00-00', '0000-00-00', 'xigahiem1.jpg'),
(44, 'CIGAR DUNHILL AGED TUBED TABARAS', 950000, '', 'Dòng Xì Gà Dunhill Aged Tubed Tabaras là dòng cigar cao cấp cuốn tay thủ công và được ủ lâu năm với hương vị phong phú, điếu dài 14cm x vòng ring 42 đi kèm ống nhôm Tubed bảo vệ điếu. Dunhill Aged sử dụng duy nhất những lá xì gà chất lượng của Dominica. Tuyệt vời cho người mới bắt đầu hoặc những người đam mê thưởng thức một làn khói mịn thanh lịch. Đây là dòng xì gà phiên bản giới hạn vì thương hiệu đã ngừng sản xuất xì gà', 5, '0000-00-00', '0000-00-00', 'xigahiem2.jpg'),
(45, 'CIGAR DUNHILL AGED TUBED ALTAMIRAS', 1000000, '', 'Dòng Xì Gà Dunhill Aged Tubed Altamiras là dòng cigar cao cấp phiên bản Aged Selection với những điếu xì gà chỉ sử dụng duy nhất những lá nguyên ngon nhất và chất lượng nhất của vùng Dominica, điếu được cuốn tay thủ công và được ủ lâu năm với hương vị phong phú, điếu dài 127 mm x vòng ring 48 đi kèm ống nhôm Tubed bảo vệ điếu. Đây là dòng xì gà phiên bản giới hạn vì thương hiệu đã ngừng sản xuất xì gà', 5, '0000-00-00', '0000-00-00', 'xigahiem3.jpg'),
(46, 'CIGAR CAMACHO AMERICAN BARREL AGED FIGURADO', 1600000, '', 'Cigar Camacho American Barrel Aged Figurado Assortment Collection - Pack 3 Điếu Xì Gà Chính Hãng là một loại khói thơm ngon chứa đầy hương vị và sự khéo léo của người Mỹ theo phong cách cổ điển. Làn khói được làm thủ công bằng tay, đựng trong túi zip cấp ẩm 2 chiều của XGND tạo ra một bộ sưu tập xì gà sang trọng và lúc nào xì gà cũng trong tình trạng tươi mới, thơm ngon. Bộ sưu tập này bao gồm 3 loại xì gà với những hình dạng đặc biệt trong những buổi thư giãn cùng bạn bè', 5, '0000-00-00', '0000-00-00', 'xigahiem4.jpg'),
(47, 'CIGAR CAMACHO AMERICAN BARREL AGED TORPEDO CORTO', 520000, '', 'Cigar Camacho American Barrel Aged Torpedo Corto - Xì Gà Chính Hãng với kích thước 4 1/2 x 52 là loại xì gà cao cấp mang hương vị mạnh mẽ và đậm đà với hương vị thuốc lá, gỗ sồi, cay hạt tiêu đen rang tuyệt vời trên vòm miệng cùng hương thơm ngọt ngào rượu bourbon tinh tế do quá trình lên men. Những điếu xì gà đẹp mắt này được đóng gói trong một hộp sơn mài sang trọng gồm 20 điếu xì gà. Đây là dòng xì gà dành cho những người muốn trải nghiệm một hương vị cao cấp khác biệt', 5, '0000-00-00', '0000-00-00', 'xigahiem5.jpg'),
(48, 'CIGAR ARTURO FUENTE OPUS X LIMITED EDITIONS', 2000000, '', 'Cigar Arturo Fuente Opus X Limited Editions Oscuro Oro Perfecxion No 4 Chính Hãng là một trong những loại xì gà cao cấp được sản xuất bởi Arturo Fuente, một trong những nhà sản xuất xì gà hàng đầu của thế giới. Với màu sắc đỏ đậm và vị hương thơm đặc trưng, đây là một trong những lựa chọn tuyệt vời cho những người yêu thích xì gà, mang lại cho anh em những trải nghiệm thú vị. Đây là sự lựa chọn hoàn hảo cho những người yêu thích xì gà cao cấp', 5, '0000-00-00', '0000-00-00', 'xigahiem6.jpg'),
(49, 'CIGAR CAMACHO AMERICAN BARREL AGED TORPEDO LARGO', 550000, '', 'Cigar Camacho American Barrel Aged Torpedo Largo với kích thước 7 x 36/54 là một loại khói được chế tác đẹp mắt kết hợp tinh túy của tinh thần Americana đích thực với nguồn gốc Honduras cổ điển của Camacho. Đây là một loại khói đậm và thơm thú vị, độ mạnh mạnh mẽ tỏa ra hương vị lá sẫm màu có tuổi thọ 6 năm phảng phất hương rượu bourbon tinh tế. Đây là một món ăn rất đặc biệt cho bất kỳ người hút xì gà nào', 5, '0000-00-00', '0000-00-00', 'xigahiem8.jpg'),
(50, 'CIGAR LIGA PRIVADA UNICO SERIE PAPAS FRITAS', 250000, '', 'Cigar Liga Privada Unico Serie Papas Fritas - Xì Gà Chính Hãng được cuộn ở kích thước 4 1/2 x 44 nhỏ gọn là một trong nhiều loại xì gà cao cấp độc đáo đã tạo nên thương hiệu Drew Estate. Một cảm giác hương vị mạnh mẽ mang đến những nốt hương đậm đà của cam thảo, hạt tiêu đen, một số loại thảo dược và gia vị ngọt ngào. Nếu anh em đang tìm kiếm một loại xì gà sắc sảo, mạnh mẽ và thơm ngon thực sự không giống những loại khác, vậy đừng chừng chờ mà không thử trải nghiệm chúng vì đây là dòng xì gà nà', 5, '0000-00-00', '0000-00-00', 'xigahiem9.jpg'),
(51, 'CIGAR OLIVA ADVENT CALENDAR COLLECTION', 7500000, '', 'Cigar Oliva Advent Calendar Collection - Xì Gà Chính Hãng 25 Điếu là bộ sưu tập trải nghiệm xì gà cao cấp hoàn hảo cho bất kỳ người đam mê xì gà nào đang tìm kiếm một món quà độc đáo được cung cấp bởi Oliva. Với tổng cộng 25 điếu xì gà được làm thủ công, được đựng trong hộp giấy với thiết kế độc đáo để mở một điếu xì gà dành cho mỗi ngày vào những ngày trước Giáng sinh đặc biệt. Đây là món quà không thể bỏ qua cho bất kỳ người yêu xì gà nào', 5, '0000-00-00', '0000-00-00', 'xigahiem7.jpg'),
(56, 'THUỐC LÁ NET', 15000, '', 'Thuốc Lá NET Chính Hãng chứa 20 điếu là một sản phẩm tuy mới nhưng đã nhận được sự quan tâm và ưa chuộng của rất nhiều người hút thuốc. Với những ưu điểm vượt trội, gói thuốc lá này đang là lựa chọn hàng đầu của nhiều người chơi lâu năm. Một trong những ưu điểm nổi bật nhất của gói thuốc lá chứa 20 điếu với giá cả rất phải chăng. Mức giá thấp hơn so với các sản phẩm cùng loại trên thị trường, sản phẩm này trở thành sự lựa chọn hấp dẫn cho những người muốn tiết kiệm chi phí.', 13, '0000-00-00', '0000-00-00', 'thuocla6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sdt` int(20) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `role` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `user`, `email`, `sdt`, `diachi`, `pass`, `role`) VALUES
(21, 'Admin', 'quantmph30703@fpt.edu.vn', 961649637, 'Hà Nội 1', '123456', 1),
(22, 'Thang', 'quantmph30701@fpt.edu.vn', 113, 'Quỳnh đô', '123456', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `lk_iduser` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order_details`),
  ADD KEY `lk_order_product` (`id_product`),
  ADD KEY `lk_order_do` (`id_order`),
  ADD KEY `lk_oder_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `lk_sp` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_order_details` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `lk_iduser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `lk_oder_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `lk_order_do` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `lk_order_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_sp` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

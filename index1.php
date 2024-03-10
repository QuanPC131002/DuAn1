<?php
ob_start();
    session_start();
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "model/validate.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";
// Tạo một mảng rỗng để lưu trữ các mục trong giỏ hàng
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
    $spnew = loadAll_sanpham_home();
    $spnews = loadAll_sanpham_sp();
    $listdanhmuc = loadAll_danhmuc();
    $dstop10 = loadAll_sanpham_top10();
    if(isset($_GET['act']) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch($act){
            // Trang danh mục
            case 'danhmucsp':
                if(isset($_POST['kyw']) && ($_POST['kyw'] != "")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)){
                    $id_danhmuc = $_GET['id_danhmuc'];
                    
                }else{
                    $id_danhmuc = 0;
                }
                $dssp = loadAll_sanpham_danhmuc($kyw,$id_danhmuc);
                $tendanhmuc =load_ten_dm($id_danhmuc);
                include "view/danhmucsp.php";
                break;
            // Trang sản phẩm
            case 'sanpham':
               
                include "view/sanpham.php";
                break;
            // Trang sản phẩm chi tiết
            case 'sanphamct' :
                if(isset($_GET['id_product']) && ($_GET['id_product'] > 0)){
                    $id_product = $_GET['id_product'];
                    $onesp = loadOne_sanpham($id_product);
                    extract($onesp);
                    $sp_cungloai = load_sanpham_cungloai($id_product,$id_danhmuc);
                    include "view/sanphamct.php";
                }else{

                    include "view/home.php";
                }
                break;
            // User
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $error = [];
                    if(empty($_POST['email'])){
                        $error['email'] = "Vui lòng nhập email";
                    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $error['email'] = "Email không hợp lệ";
                    }
                    // tên đăng nhập chỉ chứa các chữ(a-z và A-Z) và chứa số (0-9) và dấu gạch dưới (_)
                    if(empty($_POST['user'])){
                        $error['user'] = "Vui lòng nhập tên đăng nhập";
                    } elseif (!preg_match("/^[a-zA-Z0-9_\s]+$/", $_POST['user'])) {
                        $error['user'] = "Tên đăng nhập không hợp lệ";
                    }
                    if(empty($_POST['pass'])){
                        $error['pass'] = "Vui lòng nhập mật khẩu";
                    }elseif (
                        strlen($_POST['pass']) < 6                              // Độ dài tối thiểu
                    ){
                        $error['pass'] = "Mật khẩu phải tối thiểu 6 ký tự";
                    }
                    // Kiểm tra trường Địa chỉ
                    if(empty($_POST['diachi'])){
                        $error['diachi'] = "Vui lòng nhập địa chỉ";
                    }
                    
                    // Kiểm tra trường Số điện thoại
                    if(empty($_POST['sdt'])){
                        $error['sdt'] = "Vui lòng nhập số điện thoại";
                    }
                    if(empty($error)){

                        $email=$_POST['email'];
                        $existingAccount = checkExistingEmail($email); // Thay bằng hàm kiểm tra email tồn tại
                        if ($existingAccount){
                            $error['email'] = "Địa chỉ email đã được sử dụng";
                        }else{
                            
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $diachi = $_POST['diachi'];
                            $sdt = $_POST['sdt'];
                            insert_taikhoan($email,$user,$pass,$diachi,$sdt);
                            $thongbao="Đăng ký thành công !";
                        }
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
                
            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                    $error = [];
                    if(empty($_POST['user'])){
                        $error['user'] = "Vui lòng nhập user";
                    }
                    if(empty($_POST['pass'])){
                        $error['pass'] = "Vui lòng nhập password";
                    }
                    if(empty($error)){

                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $checkuser=checkuser($user,$pass);
                        if(is_array($checkuser)){
                            $_SESSION['user']=$checkuser;
                            $_SESSION['pass']=$checkuser;
                            header('Location: index1.php');
                        // $thongbao="bạn đã đăng nhập thành công ";
                    }else{
                        $thongbao="Tài khoản không tồn tại. Vui lòng đăng ký";
                    }
                    }
                }
                include "view/taikhoan/dangnhap.php";
                break;

            case 'edit_taikhoan':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $error = [];
                    if(empty($_POST['email'])){
                        $error['email'] = "Vui lòng nhập email";
                    }
                    if(empty($_POST['pass'])){
                        $error['pass'] = "Vui lòng nhập mật khẩu";
                    }elseif (
                        strlen($_POST['pass']) < 6                              // Độ dài tối thiểu
                    ){
                        $error['pass'] = "Mật khẩu phải tối thiểu 6 ký tự";
                    }
                    if(empty($_POST['diachi'])){
                        $error['diachi'] = "Vui lòng nhập địa chỉ";
                    }
                    if(empty($_POST['sdt'])){
                        $error['sdt'] = "Vui lòng nhập số điện thoại";
                    }
                    if(empty($error)){
                        $email=$_POST['email'];
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $diachi=$_POST['diachi'];
                        $sdt=$_POST['sdt'];
                        $id_user=$_POST['id_user'];
                        update_taikhoan($id_user,$user,$pass,$email,$diachi,$sdt);
                        $_SESSION['user']=checkuser($user,$pass);
                    }
                        header('Location: index1.php?act=edit_taikhoan');
                    }
            
                    include "view/taikhoan/edit_taikhoan.php";
                    break;
                        
                case 'quenmk':
                    if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                        $error = [];
                        if(empty($_POST['email'])){
                            $error['email'] = "Vui lòng nhập email";
                        }
                        if(empty($error)){

                            $email=$_POST['email'];
                            $checkemail= checkemail($email);
                            if(is_array($checkemail)){
                                $thongbao="Mật khẩu của bạn là:".$checkemail['pass'];
                            }else{
                                $thongbao="<p class='text-[red] font-bold'>Email này không tồn tại</p>";
                            }
                        }
                    }
                
                        include "view/taikhoan/quenmk.php";

                    break;
            case 'thoat':
                session_unset();
                header('Location:index1.php');
                break;

            // GIỎ HÀNG
            // THÊM SẢN PHẨM VÀO GIỎ HÀNG
            case 'addtocart':
                // Kiểm tra xem nút "Thêm vào giỏ hàng" đã được nhấn và dữ liệu đã được gửi đi
                // Lấy thông tin sản phẩm từ form
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id_product = $_POST['id_product'];
                    $tensp = $_POST['tensp'];
                    $anh = $_POST['anh'];
                    $gia = $_POST['gia'];
                    $soluong = $_POST['soluong'];
                    $thanhtien = $soluong * $gia;
                    $subsl = 0; //tạo biến sub số lượng để kiểm tra sp có trùng trong giỏ hàng không
                
                    // Kiểm tra sp có trong giỏ hàng không
                    //  kiểm tra nếu tên sản phẩm của mục trong giỏ hàng ($_SESSION['mycart'][$i][1])
                    // trùng với tên sản phẩm mà người dùng vừa thêm ($tensp). Nếu trùng :
                    for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
                        if ($_SESSION['mycart'][$i][1] == $tensp) {
                            $subsl = 1; //Gán giá trị 1 cho biến $subsl: sản phẩm đã tồn tại trong giỏ hàng
                            // Tính tổng số lượng mới : cộng số lượng sản phẩm hiện tại trong giỏ hàng ($_SESSION['mycart'][$i][4])
                            //  với số lượng sản phẩm mới ($soluong) và cập nhật .
                            $slnew = $soluong + $_SESSION['mycart'][$i][4];
                            $_SESSION['mycart'][$i][4] = $slnew;
                            break;
                        }
                    }
                
                    // Nếu không trùng thì thêm mới
                    if ($subsl == 0) {
                        // lưu trữ thông tin vào mảng
                        // Muốn add mảng con vào mảng mycart thì dùng hàm
                        $spadd = [$id_product, $tensp, $anh, $gia, $soluong, $thanhtien];
                        array_push($_SESSION['mycart'], $spadd);
                        $thongbao = "Đã thêm sản phẩm vào giỏ hàng";
                    }
                }
                
                include "view/cart/viewcart.php";
                break;
        case 'updatecart':
            if (isset($_POST['updatecart'])) {
                // Kiểm tra xem thông tin số lượng có được gửi và là một mảng không
                if (isset($_POST['soluong']) && is_array($_POST['soluong'])) {
                    foreach ($_POST['soluong'] as $i => $newQuantity) {
                        // Chuyển đổi số lượng mới sang kiểu số nguyên
                        $newQuantity = intval($newQuantity);
                        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                        if (isset($_SESSION['mycart'][$i])) {
                            // Kiểm tra xem số lượng mới có hợp lệ không (từ 1 đến 10)
                            if ($newQuantity > 0 && $newQuantity <= 10) {
                                $_SESSION['mycart'][$i][4] = $newQuantity;
                                // Tính lại thành tiền sau khi cập nhật số lượng
                                $thanhtien = $newQuantity * $_SESSION['mycart'][$i][3];
                            }
                        }
                    }
                }
            }
            // Chuyển hướng trở lại trang giỏ hàng sau khi cập nhật
            header("Location: index1.php?act=addtocart");
            break;
                
            case 'deletecart':
                // kiểm tra xem có tham số id_cart truyền qua URL không.Nếu có,lấy giá trị id_cart từ URL
                // và sau đó kiểm tra xem mảng $_SESSION['mycart'] có tồn tại không.
                // Nếu tồn tại,sử dụng array_splice để xóa phần tử tại vị trí id_cart.
                // Lấy id từ trên url để xóa 
                if(isset($_GET['id_cart'])){
                    array_splice($_SESSION['mycart'],$_GET['id_cart'],1);//(mảng,vi trí cần xóa,xóa bao nhiêu phần tử);
                }else{
                    $_SESSION['mycart']=[];
                }
                header("location:index1.php?act=addtocart");
                break;
                // bảng oder
            case 'bill':
                include "view/cart/bill.php";
                break;
            case 'billconfirm':
                // Kiểm tra xem nút "Đồng ý đặt hàng" đã được nhấn và dữ liệu đã được gửi đi
                if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])){
                    // Kiểm tra xem đã có phiên đăng nhập (session user) hay chưa để xác định user
                    if(isset($_SESSION['user'])){
                        $id_user=$_SESSION['user']['id_user'];
                    }else{
                        $id_user=0;
                    }
                    // Lấy thông tin từ form
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $thanhtoan = $_POST['thanhtoan'];
                    $ngaydathang = date('d/m/Y');
                    $tongdonhang = tongdonhang();
                     // Tạo đơn hàng và lấy ID đơn hàng vừa được tạo
                    $id_order = insert_bill($id_user, $user, $email, $sdt, $diachi, $ngaydathang, $tongdonhang, $thanhtoan);
                    // Thêm items vào bảng order_details với $Session['mycart'] và $id_order
                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($cart[0], $id_order, $cart[3], $cart[4], $_SESSION['user']['id_user'], $cart[2], $cart[1], $cart[5]);
                    }
                    // Xóa phiên giỏ hàng ($_SESSION['mycart'])
                    $_SESSION['mycart'] = array();
                }
            
                // Load thông tin bill và cart từ bên model cart
                $bill = loadOne_bill($id_order);
                $billct = loadAll_cart($id_order);
                // Include và hiển thị view
                include "view/cart/billconfirm.php";
                break;
            case 'billct':
                // Lấy id đơn hàng trên url để hiển thị hóa đơn chi tiết
                if (isset($_GET['id_order'])) {
                    $id_order = $_GET['id_order'];
                    // Load thông tin đơn hàng
                    $bill = loadOne_bill($id_order);
                    // Load danh sách sản phẩm trong đơn hàng
                    $billct = loadAll_cart($id_order);
                    include "view/cart/billct.php";
                } else {
                    // Nếu không có id_order thì chuyển hướng 
                }
                break;
            case 'success':
                include "view/cart/success.php";
                break;
            case 'mybill':
                $listbill=loadall_order($_SESSION['user']['id_user']);
                include "view/cart/mybill.php";
                break;
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else {
        include "view/home.php";
    }
    include "view/footer.php";
    ob_end_flush();
?>
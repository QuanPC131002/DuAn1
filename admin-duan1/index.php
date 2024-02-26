<?php
ob_start();
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/thongke.php";
    include "../model/cart.php";
    include "header.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            // DANH MỤC
            case 'adddm':
                if(isset($_POST['themmoi']) && $_POST['themmoi']){
                    // validate
                    $error = [];
                    if(empty($_POST['tendanhmuc'])){
                        $error['tendanhmuc'] = "Vui lòng nhập tên loại !";
                    }
                    if(empty($error)){
                        // Nếu không lỗi -> so sánh dữ liệu với database -> thêm danh mục
                        $tendanhmuc=$_POST['tendanhmuc'];
                        insert_danhmuc($tendanhmuc);
                        $thongbao = "Thêm thành công";
                    }
                }
                include "danhmuc/add.php";
                break;
            case 'listdm' :
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm' :
                // Xóa liên kết theo chuỗi (Cascade Delete)
                // Nếu xóa danh mục ở bảng cha sẽ tự động xóa các sản phẩm liên quan 
                // Get id_danh mục ở trên url và nếu id tồn tại và lớn hơn 0 -> thực hiện xóa danh mục -> load lại danh mục
                if(isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] > 0){
                    delete_danhmuc($_GET['id_danhmuc']);
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm' :
                // Nếu id tồn tại và lớn hơn 0 -> hiển thị 1 danh mục muốn sửa
                if(isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] > 0){
                    $dm = loadOne_danhmuc($_GET['id_danhmuc']);
                };
                include "danhmuc/edit.php";
                break;
            case 'updatedm';
            // Nếu tồn tại nút capnhat và người dùng click vào nút capnhat
            // Thực hiện so sánh dữ liệu với database -> update danh mục -> load lại danh mục
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $error = [];
                    if(empty($_POST['tendanhmuc'])){
                        $error['tendanhmuc'] = "Vui lòng nhập tên loại !";
                    }
                    if(empty($error)){
                        $tendanhmuc=$_POST['tendanhmuc'];
                        $id_danhmuc=$_POST['id_danhmuc'];
                        update_danhmuc($id_danhmuc,$tendanhmuc);
                        $thongbao = "Cập nhật thành công";
                    }
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
                // SẢN PHẨM
            case 'addsp':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    // validate
                    $error = [];
                    if(empty($_POST['id_danhmuc'])){
                        $error['id_danhmuc'] = "Vui lòng chọn loại sản phẩm";
                    }
                    if(empty($_POST['tensp'])){
                        $error['tensp'] = "Vui lòng nhập tên sản phẩm !";
                    } if(empty($_FILES['anh']['name'])){
                        $error['anh'] = "Vui lòng chọn ảnh sản phẩm";
                    }
                    if(empty($_POST['gia'])){
                        $error['gia'] = "Vui lòng nhập giá sản phẩm !";
                    }elseif($_POST['gia'] < 0){
                        $error['gia'] = "Giá sản phẩm phải lớn hơn 0";
                    }
                    if(empty($error)){
                        $id_danhmuc=$_POST['id_danhmuc'];
                        $tensp=$_POST['tensp'];
                        $gia=$_POST['gia'];
                        $mota=$_POST['mota'];
                        $anh=$_FILES['anh']['name'];
                        $target_dir = "../upload/";// đường dẫn vào folder
                        $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                        if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                          } else {
                            // echo "Sorry, there was an error uploading your file.";
                          }
                          insert_sanpham($tensp,$gia,$mota,$id_danhmuc,$anh);
                        $thongbao = "Thêm thành công";
                    }
                }
                $listdanhmuc=loadAll_danhmuc();
                include "sanpham/add.php";
                break;
            case 'listsp':
                if(isset($_POST['listOK']) && ($_POST['listOK'])){
                    $kyw = $_POST['kyw'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                }else{
                    $kyw = "";
                    $id_danhmuc = 0;
                }
                $listdanhmuc=loadAll_danhmuc();
                $listsanpham =loadAll_sanpham();
                $listsanpham = loadAll_sanpham_danhmuc($kyw,$id_danhmuc);
                include "sanpham/list.php";
                break;
            case 'xoasp' :
                if(isset($_GET['id_product']) && $_GET['id_product'] > 0){
                    delete_sanpham($_GET['id_product']);
                }
                $listsanpham = loadAll_sanpham();
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['id_product']) && $_GET['id_product'] > 0){
                    $sp = loadOne_sanpham($_GET['id_product']);
                };
                $listdanhmuc=loadAll_danhmuc();
                include "sanpham/edit.php";
                break;
            case 'updatesp':
                // Kiểm tra xem nút "Cập nhật" đã được nhấn và dữ liệu đã được gửi đi
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $error = [];
                    if(empty($_POST['tensp'])){
                        $error['tensp'] = "Vui lòng nhập tên sản phẩm !";
                    } if(empty($_FILES['anh']['name'])){
                        $error['anh'] = "Vui lòng chọn ảnh sản phẩm";
                    }
                    if(empty($_POST['gia'])){
                        $error['gia'] = "Vui lòng nhập giá sản phẩm !";
                    }elseif($_POST['gia'] < 0){
                        $error['gia'] = "Giá sản phẩm phải lớn hơn 0";
                    }
                    // Nếu không có lỗi nào được tìm thấy
                    // lây giá trị từ form
                    if(empty($error)){
                    $id_product=$_POST['id_product'];
                    $id_danhmuc=$_POST['id_danhmuc'];
                    $tensp=$_POST['tensp'];
                    $gia=$_POST['gia'];
                    $mota=$_POST['mota'];
                    $anh=$_FILES['anh']['name']; 
                    $target_dir = "../upload/";// Đường dẫn đích để lưu trữ tệp ảnh
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                    // Di chuyển tệp ảnh vào thư mục đích trên máy chủ
                    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        // echo "Sorry, there was an error uploading your file.";
                      }
                     update_sanpham($tensp,$anh,$gia,$id_danhmuc,$mota,$id_product);
                    $thongbao = "Cập nhật thành công";
                }
                }
                $listdanhmuc=loadAll_danhmuc();
                $listsanpham = loadAll_sanpham();
                include "sanpham/list.php";
                break;
            case 'xoatk';
                if(isset($_GET['id_user']) && ($_GET['id_user']>0)){
                    delete_taikhoan($_GET['id_user']);
                }
                    $listtaikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                break;
            case 'dskh' :
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            
            case 'dsbl':
                break;
            case 'thongke' :
                $listthongke = loadAll_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo' :
                $listthongke = loadAll_thongke();
                include "thongke/bieudo.php";
                break;
            case 'listbill':
                if(isset($_POST['kyw'])&& ($_POST['kyw'] != "")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw = "";
                }
                $listbill = loadAll_bill($kyw,0);
                include "giohang/listbill.php";
                break;
            case 'billct':
                // Kiểm tra xem có tham số 'id_order' truyền qua phương thức GET không
                // Gán giá trị của 'id_order' từ URL vào biến $id_order
                if (isset($_GET['id_order'])) {
                    $id_order = $_GET['id_order'];
            
                    // Load thông tin đơn hàng
                    $bill = loadOne_bill($id_order);
                    
                    // Load danh sách sản phẩm trong đơn hàng
                    $billct = loadAll_cart($id_order);
                    
                    include "giohang/billct.php";
                } else {
                    
                }
                break;
            case 'xoadh' :
                if(isset($_GET['id_order']) && $_GET['id_order'] > 0){
                    delete_donhang($_GET['id_order']);
                }
                $listbill = loadAll_bill();
                include "giohang/listbill.php";
                break;
            default:
            include "home.php";
            break;
        }
    }else{
        include "home.php";
    }
    include "footer.php";
    ob_end_flush();
?>
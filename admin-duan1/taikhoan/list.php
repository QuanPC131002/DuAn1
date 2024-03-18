<div class="row mx-[20px]">
            <div class="row formtitle alert alert-info">
                <h1 class="font-bold text-[20px]">DANH SÁCH TÀI KHOẢN</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10">
                
                </div>
                <div class="row mb10 formds">
                    <table>
                        <tr>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">ID</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Tên tài khoản</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Mật khẩu</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Email</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Địa Chỉ</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">SĐT</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Role</th>
                            <th class="p-2 border-[1px] border-solid border-[#ccc] text-center">Thao Tác</th>
                        </tr>
                        <?php
                        // dùng foreach duyệt mảng -> dùng extract để show dữ liệu
                            foreach($listtaikhoan as $tk){
                                extract($tk);
                                $suatk ="index.php?act=suatk&id_user=".$id_user;
                                $xoatk ="index.php?act=xoatk&id_user=".$id_user;
                            echo '
                            <tr>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center"> '.$id_user.' </td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$user.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$pass.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$email.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$diachi.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$sdt.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">'.$role.'</td>
                                <td class="p-[4px] border-[1px] border-solid border-[#ccc] text-center">
                                    <a href="'.$xoatk.'" ><input type="button" name=""value="XÓA" class="text-white bg-red-500 w-[80px] py-[5px] rounded ml-[20px] mb-[20px] hover:opacity-60 mt-[10px]" onclick="return confirm(\'Bạn có chắc chắn muốn xóa ?\')">
                                </td>
                            </tr>  
                            ';      
                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <!-- <input type="submit" value="CHỌN TẤT CẢ">
                    <input type="reset" value="BỎ CHỌN TẤT CẢ">
                    <input type="reset" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                    <!-- <a href="add.html"><input type="button" value="NHẬP THÊM"></a> -->
                </div>
            </div>
            
        </div>
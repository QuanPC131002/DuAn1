<div class="w-full mx-[20px]">
            <div class="font-bold px-[20px]                                                                                  ">
                <h1 class="alert alert-info font-bold text-[20px]">DANH SÁCH DANH MỤC</h1>
            </div>
            <div class="">
                
                <div class="row mx-[20px] ">
                    <table class="w-full">
                        <tr>
                            <th class="w-[20%] text-center py-4 border-[1px] border-solid border-[#ccc]">MÃ LOẠI</th>
                            <th class="w-[40%] text-center py-4 border-[1px] border-solid border-[#ccc]">TÊN LOẠI</th>
                            <th class="w-[40%] text-center py-4 border-[1px] border-solid border-[#ccc]">Thao tác</th>
                        </tr>
                        <?php
                        // duyệt mảng -> dùng extract để show dữ liệu
                            foreach($listdanhmuc as $dm){
                                extract($dm);
                                $suadm ="index.php?act=suadm&id_danhmuc=".$id_danhmuc;
                                $xoadm ="index.php?act=xoadm&id_danhmuc=".$id_danhmuc;
                                
                        ?>
                            <tr>
                            <td class="w-[20%] text-center border-[1px] border-solid border-[#ccc]"> <?php echo $id_danhmuc ?> </td>
                            <td class="w-[40%] text-center border-[1px] border-solid border-[#ccc]"><?php echo $tendanhmuc ?></td>
                            <td class="w-[40%] text-center border-[1px] border-solid border-[#ccc]"><a href="<?=$suadm ?>"><input class="text-white bg-blue-500 w-[100px]  rounded ml-[20px]  p-[4px] mt-[10px] hover:opacity-60" type="button" name=""value="SỬA"><a href="<?=$xoadm ?>" onclick="return confirm('Bạn có muốn xóa không?')"><input class="text-white bg-red-500 w-[100px] rounded ml-[20px]  p-[4px] mt-[10px] hover:opacity-60" type="button" name=""value="XÓA"></td>
                        </tr>  
                        <?php
                        }   
                        ?>
                        
                    </table>
                </div>
                <div class="">
                    <!-- <input type="submit" value="CHỌN TẤT CẢ"> -->
                    <!-- <input type="reset" value="BỎ CHỌN TẤT CẢ">
                    <input type="reset" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                    <a href="index.php?act=adddm"><input class="text-black w-[100px] rounded ml-[20px] mt-[20px] py-2 hover:bg-blue-600 hover:text-[#fff] border-[1px] border-solid border-[#ccc]" type="button" value="NHẬP THÊM"></a>
                </div>
            </div>
            
        </div>
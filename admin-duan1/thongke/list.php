<div class="row mx-[20px]">
            <div class="row form-title alert alert-info ">

                <h1 class="text-left  text-[20px] font-bold">DANH SÁCH THỐNG KÊ</h1>
            </div>
            <div class="row form-content">
                <div class="row mb">
                </div>
                <div class="row mb form-danhsach ">
                    <table class="m-auto w-full">
                        <tr>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">MÃ DANH MỤC</th>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">TÊN DANH MỤC</th>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">SỐ LƯỢNG</th>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">GIÁ CAO NHẤT</th>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">GÍA THẤP NHẤT</th>
                            <th class="p-4 border-[1px] border-solid border-[#ccc]">GIÁ TRUNG BÌNH</th>
                            
                        </tr>
                        <?php
                            foreach($listthongke as $tk){
                                extract ($tk);
                                echo '<tr>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">'.$madm.'</td>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">'.$tendm.'</td>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">'.$countsp.'</td>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">' . number_format($maxgia, 0, '.', ',') . 'đ</td>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">' . number_format($mingia, 0, '.', ',') . 'đ</td>
                                    <td class="p-4 border-[1px] border-solid border-[#ccc] text-center">' . number_format($avggia, 0, '.', ',') . 'đ</td>
                                </tr>';
                            }
                        ?>
                        
                    </table>
                </div>
                <div class="row my-4 ml-[-20px]">
                    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ" class="border-[2px] border-solid border-[#ccc] p-3 hover:bg-blue-600 hover:text-[#fff] cursor-pointer"></a>
                </div>
            </div>
</div>
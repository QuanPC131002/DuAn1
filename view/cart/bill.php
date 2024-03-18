<form action="index1.php?act=billconfirm" method="post" class="my-32">
    <div class="grid grid-cols-2 gap-2 m-auto">
<div class="main-desc mt-12 mb-2 ">
                <h2 class="text-[30px] text-[#000] font-bold  text-center mb-12">Thông tin đặt hàng</h2>
                <div class="my-6 w-[500px] mx-auto  min-h-[500px] ">
                    
                        <?php
                            if(isset($_SESSION['user'])){
                                $user = $_SESSION['user']['user'];
                                $email = $_SESSION['user']['email'];
                                $diachi = $_SESSION['user']['diachi'];
                                $sdt = $_SESSION['user']['sdt'];
                            }else{
                                $user = "";
                                $email = "";
                                $diachi = "";
                                $sdt = "";
                            }
                        ?>
                        <div class="mx-4 my-4">
                            <label for="" class="font-bold text-[20px]">Họ và tên</label>
                            <input type="text" name="user" value="<?=$user ?>" class="w-full   border-b-[1px] border-solid border-[#ccc] outline-none py-2" >
                        </div>
                            <div class="mx-4 my-4">
                            <label for="" class="font-bold text-[20px]">Email</label>
                            <input type="email" name="email" value="<?=$email ?>" class="w-full  border-b-[1px] border-solid border-[#ccc] outline-none py-2" >
                        </div>
                            <div class="mx-4 my-4">
                            <label for="" class="font-bold text-[20px]">Địa chỉ</label>
                            <input type="text" name="diachi" value="<?=$diachi ?>" class="w-full  border-b-[1px] border-solid border-[#ccc] outline-none py-2" >
                        </div>
                            <div class="mx-4 my-4">
                            <label for="" class="font-bold text-[20px]">Số điện thoại</label>
                            <input type="text" name="sdt" value="<?=$sdt ?>" class="w-full  border-b-[1px] border-solid border-[#ccc] outline-none py-2" >
                        </div>
                    
                       
            </div>
</div> 
            <div class="main-desc mt-12 mb-2 border-l-[1px] border-solid border-[#ccc]">
            <h2 class="text-[30px] text-center text-[#000] text-[#000] font-bold">Đơn hàng của bạn</h2>
                <div class="my-6 py-6 px-6 min-h-[400px] w-[650px] m-auto ">
                    <table class="m-auto w-[100%]">
                    <?php
                        viewcart_0();
                        ?>
                    
                    </table>
                    <h2 class="text-[red] text-[22px] mx-4 font-bold my-4">Phương thức thanh toán</h2>
                        <table class="mx-4 my-3">
                        <td><input type="radio" value="Trả tiền khi nhận hàng" name="thanhtoan" id="" checked><strong>Trả tiền khi nhận hàng(COD)</strong> <p>Thực hiện thanh toán sau khi nhận hàng từ shipper. Hãy để ý điện thoại, đơn hàng sẽ được giao trong 2-3 ngày tới.</p></td>
                    
                        </table>  
                </div>
            </div>
            </div>
            <div class="text-center">
            <a href="index1.php?act=billconfirm"> <input type="submit" value="THANH TOÁN" name="dongydathang" class="bg-[red] rounded m-auto text-[#fff] cursor-pointer hover:opacity-80 p-2 text-[#000] mr-4"></a>
            </div>
             
        </form>
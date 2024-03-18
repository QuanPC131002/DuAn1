<div class="my-32">
<div class="text-center text-[24px] font-bold my-4">Quên mật khẩu</div>
                <div class="w-[400px] m-auto text-left">
                  <form action="index1.php?act=quenmk" method="post">
                    <div>
                    <p class="text-[20px]">Email</p>
                    <input type="email" name="email" value="<?php if(isset($email)) echo $email ?>" placeholder=" Email" class="border-[1px] border-solid border-[#ccc] w-full py-2 outline-none">
                    <?php if(!empty($error['email'])){
                            echo "<p class='thongbao font-bold text-[red]'>{$error['email']}</p>";
                        } ?>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")){
                          echo '<p class="text-[green] font-bold">'.$thongbao.'</p>';
                        }
                    ?>
                    <input type="submit" value="Gửi" name="guiemail" class="bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80 my-4">
                    <input type="reset" value="Nhập lại" class="bg-[#c51230] text-[#fff] w-full py-2 hover:opacity-80">
                  </form>
                  
             </div>
             </div>
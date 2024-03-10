<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XGND</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&display=swap" rel="stylesheet">
    <!-- css.gg -->
    <link href="https://css.gg/css" rel="stylesheet" />
    <!-- UNPKG -->
    <link href="https://unpkg.com/css.gg/icons/icons.css" rel="stylesheet" />
    <!-- JSDelivr -->
    <link href="https://cdn.jsdelivr.net/npm/css.gg/icons/icons.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="footer-boostrap/fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="footer-boostrap/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="footer-boostrap/css/style-footer.css">
    <link href="aos-master/aos-master/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
        .sp1 h4 {
            color: #fff;
        }
        body{
            /* background-image: url(upload/wallpapersden.com_city-buildings-skyscraper-view_3440x1440.jpg); */
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
        .gioithieu {
            margin: 100px auto;
            width: 1490px;
            height: 500px;
            background-size: cover;
            background: url(view/img-sp/banner\ dưới.jpg);
        }

        .counter {
            display: flex;
            width: 50%;
        }

        .counter-new {
            width: 150px;
            /* margin: auto; */
            display: flex;
            align-items: center;
            /* justify-content: center; */
        }

        .counter-new input {
            width: 50px;
            border: 0;
            line-height: 30px;
            font-size: 20px;
            text-align: center;
            background: #fff;
            color: #000;
            appearance: none;
            outline: 0;
        }

        .counter-new span {
            display: block;
            font-size: 25px;
            padding: 0 10px;
            cursor: pointer;
            color: #0052cc;
            user-select: none;
        }
        #new-navbar{
            display: flex;
            justify-content: space-between;
            width: 100%;
            line-height: 60px;
            top: 0;
            left: 0;
            right:0;
        }
        #new-navbar .new-navbar-text p{
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            color: #c51230;
            margin-left: 10px;
        }
        .register .login a:hover{
            color: #c51230;
        }
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
        header{
            position: absolute;
            background-color: #2B2F3A;
            width: 1490px;
            height:85px;
            z-index: 1;
            left: 0;
            border-bottom: 1px solid #fff4;
            width: 100%;
        }
        header ul{
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            list-style: none;
        }
        header li{
            padding: 30px 40px;
            color: #fff;
            
        }
        header li:hover{
            border-bottom: 2px solid #fff;
        }
        .slider{
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(to right, #2B2F3A, #0D0E12);
            overflow: hidden;
        }
        .slider::before{
            position: absolute;
            width: 50%;
            height: 100vh;
            content: '';
            top: 0;
            left: 0;
            background-color: #E88735;
        }
        .title{
            position: absolute;
            top: 20%;
            right: 60%;
            text-align: right;
            color: #fff;
            font-size: 150px;
            width: 40%;
            font-family: 'Pacifico', cursive;
            text-shadow: 3px 5px 0px #478860;
            line-height: .9em;
            transform: rotate(-5deg);
        }
        .images{
            position: absolute;
            bottom: 0%;
            left: 50%;
            --rotate: 0deg;
            transform: translate(-50%, 50%) rotate(var(--rotate));
            width: 1300px;
            height: 1300px;
            border-radius: 50%;
            transition: transform 0.5s ease-in-out;
            outline: 3px dashed #fff5;
            outline-offset: -100px;
        }
        .images .item{
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            rotate: calc(60deg * var(--i));
        }
        .images .item img{
            height: 550px;
        }
        
        .contentt{
            color: #fff;
            position: absolute;
            top: 10%;
            left: 70%;
            text-align: justify;
            width: 350px;
        }
        .contentt h1{
            color: #E88735;
            font-size: xxx-large;
        }
        .contentt button{
            margin-top: 30px;
            padding: 10px 30px;
            border-radius: 20px;
            background-color: #E88735;
            color: #fff;
            border: none;
            float: right;
        }
        .contentt .item{
            display: none;
        }
        .contentt .item.active{
            display: block;
        }
        @keyframes showContent{
            from{
                opacity: 0;
                transform: translateY(100px);
            }to{
                opacity: 1;
            }
        }
        .contentt .item.active h1{
            opacity: 0;
            animation: showContent 0.5s ease-in-out 1 forwards;
        }
        .contentt .item.active .des{
            opacity: 0;
            animation: showContent 0.5s 0.3s ease-in-out 1 forwards;
        }
        .contentt .item.active button{
            opacity: 0;
            animation: showContent 0.5s 0.6s ease-in-out 1 forwards;
        }
        
        #prev,
        #next{
            position: absolute;
            border: none;
            top: 60%;
            left: 613px;
            font-size: 100px;
            font-family: cursive;
            background-color: transparent;
            color: #fff;
            font-weight: bold;
            opacity: 0.3
        }
        #next{
            left: unset;
            right: 603px;
        }
        #next:hover,
        #prev:hover{
            opacity: 1
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div id="new-navbar">
            <div class="new-navbar-text">
                <a href="">
                    <p> Liên hệ: 1900 2080 1347 - 034 678 8943</p>
                </a>
            </div>
            <form action="index1.php?act=danhmucsp" method="POST">
                    <input type="text" name="kyw" placeholder=" Tìm kiếm tại đây..." class="border-[1px] border-solid border-[#ccc] rounded-l-2xl outline-none  w-[300px] h-[40px]" required>
                    <button name="timkiem" class="text-center ml-[-4px] rounded-r-2xl border-t-[1px] border-solid border-[#ccc] border-r-[1px] border-solid border-[#ccc] border-b-[1px] border-solid border-[#ccc] border-r-none w-[50px] h-[40px]"><i class="gg-search mx-auto"></i></button>
                </form>
            <div class="register">
                <div class="shopping ">
                    <a href="index1.php?act=addtocart" class="cart-icon"><i
                            class="fa-solid fa-cart-shopping text-[#000] text-[22px]"></i></a>
                    <!-- <a href="index1.php?act=addtocart"><img src="view/img-sp/shopping.jpg"></a> -->
                    <!-- <span id="cart-item-count" class="quantity">0</span> -->
                </div>
                <div class="login">
                    <ul>
                        <?php
                        if(isset($_SESSION['user'])){
                        extract($_SESSION['user']);
                    ?>

                        <strong class="text-[20px]">
                            <?=$user?>
                        </strong>
                        <i class="fa-solid fa-user"></i>
                        <!-- <li class="">
                  <a href="index1.php?act=quenmk">Quên mật khẩu</a>
                </li> -->

                        <li class="">
                            <a href="index1.php?act=mybill" style="color:#000; margin-left: 8px;">Đơn hàng</a>
                        </li>
                        <li class="">
                            <a href="index1.php?act=edit_taikhoan" style="color:#000;">Cập nhật tài khoản</a>
                        </li>
                        <?php 
                            if($role==1){
                            ?>
                        <li class="">
                            <a href="admin-duan1/index.php" style="color:#000;">Admin</a>
                        </li>
                        <?php }?>
                        <li class="">
                            <a href="index1.php?act=thoat" style="color:#000;">Thoát </a>
                        </li>
                        <?php
                }else{
                ?>
                        <li><a href="index1.php?act=dangnhap" style="color:#000;">ĐĂNG NHẬP</a></li>
                        <li><a href="index1.php?act=dangky" style="color:#000;">ĐĂNG KÝ</a></li>
                        <?php 
               }
               ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="">
        <header>
            <ul>
                <li class="active"><a href="index1.php">TRANG CHỦ</a></li>
                <li><a href="index1.php?act=sanpham" class="click-sanpham">SẢN PHẨM</a></li>
                <li><a href="index1.php?act=gioithieu" class="click-gioithieu">GIỚI THIỆU</a></li>
                <li><a href="index1.php?act=lienhe" class="click-lienhe">LIÊN HỆ</a></li>
            </ul>
        </header>
        </div>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="admin-duan1/style.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/layout-list.css' rel='stylesheet'>
    <style>
        /* =============== Globals ============== */
        :root {
        --blue: #2a2185;
        --white: #fff;
        --gray: #f5f5f5;
        --black1: #222;
        --black2: #999;
        }

        body {
        min-height: 100vh;
        overflow-x: hidden;
        }

        .container {
        position: relative;
        width: 100%;
        }
        .navigation {
        left: -3px;
        position: fixed;
        width: 300px;
        height: 100%;
        background: var(--blue);
        border-left: 10px solid var(--blue);
        transition: 0.5s;
        overflow: hidden;
        }
        .navigation.active {
        width: 80px;
        }

        .navigation ul {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        }

        .navigation ul li {
        position: relative;
        width: 100%;
        list-style: none;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        }

        .navigation ul li:hover,
        .navigation ul li.hovered {
        background-color: var(--white);
        }

        .navigation ul li:nth-child(1) {
        margin-bottom: 40px;
        pointer-events: none;
        }

        .navigation ul li a {
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--white);
        }
        .navigation ul li:hover a,
        .navigation ul li.hovered a {
        color: var(--blue);
        }

        .navigation ul li a .icon {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 75px;
        text-align: center;
        }
        .navigation ul li a .icon ion-icon {
        font-size: 1.75rem;
        }

        .navigation ul li a .title {
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
        }

        /* --------- curve outside ---------- */
        .navigation ul li:hover a::before,
        .navigation ul li.hovered a::before {
        content: "";
        position: absolute;
        right: 0;
        top: -50px;
        width: 50px;
        height: 50px;
        background-color: transparent;
        border-radius: 50%;
        box-shadow: 35px 35px 0 10px var(--white);
        pointer-events: none;
        }
        .navigation ul li:hover a::after,
        .navigation ul li.hovered a::after {
        content: "";
        position: absolute;
        right: 0;
        bottom: -50px;
        width: 50px;
        height: 50px;
        background-color: transparent;
        border-radius: 50%;
        box-shadow: 35px -35px 0 10px var(--white);
        pointer-events: none;
        }

        /* ===================== Main ===================== */
        .main {
        position: absolute;
        width: calc(100% - 300px);
        left: 253px;
        min-height: 100vh;
        background: var(--white);
        transition: 0.5s;
        }
        .main.active {
        width: calc(100% - 80px);
        left: 30px;
        }

        .topbar {
        margin-left: -100px;
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
        }

        .toggle {
        position: relative;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        cursor: pointer;
        }

        .search {
        position: relative;
        width: 400px;
        margin: 0 10px;
        }

        .search label {
        position: relative;
        width: 100%;
        }

        .search label input {
        width: 100%;
        height: 40px;
        border-radius: 40px;
        padding: 5px 20px;
        padding-left: 35px;
        font-size: 18px;
        outline: none;
        border: 1px solid var(--black2);
        }

        .search label ion-icon {
        position: absolute;
        top: 0;
        left: 10px;
        font-size: 1.2rem;
        }

        .user {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        }

        .user img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        }
        /* ================== Order Details List ============== */
        .details {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-gap: 30px;
        /* margin-top: 10px; */
        }

        .details .recentOrders {
        position: relative;
        display: grid;
        min-height: 500px;
        background: var(--white);
        padding: 20px;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        border-radius: 20px;
        }

        .details .cardHeader {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        }
        .cardHeader h2 {
        font-weight: 600;
        color: var(--blue);
        }
        .cardHeader .btn {
        position: relative;
        padding: 5px 10px;
        background: var(--blue);
        text-decoration: none;
        color: var(--white);
        border-radius: 6px;
        }

        .details table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        }
        .details table thead td {
        font-weight: 600;
        }
        .details .recentOrders table tr {
        color: var(--black1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .details .recentOrders table tr:last-child {
        border-bottom: none;
        }
        .details .recentOrders table tbody tr:hover {
        background: var(--blue);
        color: var(--white);
        }
        .details .recentOrders table tr td {
        padding: 10px;
        }
        .details .recentOrders table tr td:last-child {
        text-align: end;
        }
        .details .recentOrders table tr td:nth-child(2) {
        text-align: end;
        }
        .details .recentOrders table tr td:nth-child(3) {
        text-align: center;
        }
        .status.delivered {
        padding: 2px 4px;
        background: #8de02c;
        color: var(--white);
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        }
        .status.pending {
        padding: 2px 4px;
        background: #e9b10a;
        color: var(--white);
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        }
        .status.return {
        padding: 2px 4px;
        background: #f00;
        color: var(--white);
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        }
        .status.inProgress {
        padding: 2px 4px;
        background: #1795ce;
        color: var(--white);
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        }

        .recentCustomers {
        position: relative;
        display: grid;
        min-height: 500px;
        padding: 20px;
        background: var(--white);
        border-radius: 20px;
        }
        .recentCustomers .imgBx {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50px;
        overflow: hidden;
        }
        .recentCustomers .imgBx img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        }
        .recentCustomers table tr td {
        padding: 12px 10px;
        }
        .recentCustomers table tr td h4 {
        font-size: 16px;
        font-weight: 500;
        line-height: 1.2rem;
        }
        .recentCustomers table tr td h4 span {
        font-size: 14px;
        color: var(--black2);
        }
        .recentCustomers table tr:hover {
        background: var(--blue);
        color: var(--white);
        }
        .recentCustomers table tr:hover td h4 span {
        color: var(--white);
        }
    </style>
</head>
<body>
    <div class="container ">
        <div class="navigation">
            <ul>
                <li class="mt-[44px]">
                    <a href="index.php">
                        <span class="icon">
                            <!-- <ion-icon name="logo-apple"></ion-icon> -->
                        </span>
                        <span class="title">Trang chủ</span>
                    </a>
                </li>
                
                <li>
                    <a href="index.php?act=adddm">
                        <span class="icon">
                        <i class=""></i>
                        </span>
                        <span class="title">Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=addsp">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=dskh">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Khách hàng
                    </a>
                </li>
                <li>
                    <a href="index.php?act=listbill">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Danh sách đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=thongke">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Thống kê</span>
                    </a>
                </li>
                <li>
                    <a href="../index1.php">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Trở lại website</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle mt-[90px]">
                    <ion-icon name="menu-outline" class="text-[#fff]"></ion-icon>
                </div>

            </div>
        
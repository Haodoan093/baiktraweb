<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Navigation Bar */
        .nav-bar {
            background-color: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 10px 0;
        }

        .main-menu ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin-top: 20px;
            /* Thêm khoảng cách 20px từ bên trên */
        }


        .main-menu ul li a {

            text-decoration: none;
            color: black;
            font-weight: normal;
            font-size: 14px;
        }

        .main-menu ul li a:hover {
            color: red;
        }

        .logo img {
            width: 150px;
        }

        .search-icons {
            display: flex;
            align-items: center;
        }

        .search-bar {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 20px;
            margin-right: 20px;
        }

        .search-bar input {
            border: none;
            outline: none;
            padding: 5px;
        }

        .search-bar i {
            margin-left: 10px;
        }

        .user-icons {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 18px;
        }

        .user-icons i {
            cursor: pointer;
        }

        .cart-count {
            background-color: black;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
            margin-left: -10px;
        }

        /* Breadcrumb */
        .breadcrumb {
            background-color: #f8f8f8;
            padding: 10px 0;
        }

        .logo img {
            width: 120px;
            /* Điều chỉnh lại kích thước logo */
            margin-left: 20px;
            margin-right: 20px;
        }

        .breadcrumb p {
            color: #555;
            font-size: 14px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <!-- Custom Header -->
    <header class="nav-bar">
        <div class="container">
            <!-- Main Menu -->
            <nav class="main-menu">
                <ul>
                    <li><a href="#">NỮ</a></li>
                    <li><a href="#">NAM</a></li>
                    <li><a href="#">SIÊU SALE T9</a></li>
                    <li><a href="#">FINAL SALE TỪ 50K</a></li>

                    <li><a href="">SẢN PHẨM</a></li>
                </ul>
            </nav>
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('https://pubcdn.ivymoda.com/ivy2/images/logo.png') }}" alt="IVY moda"></a>
            </div>
            <!-- Search and User Icons -->
            <div class="search-icons">
                <div class="search-bar">
                    <input type="text" placeholder="TÌM KIẾM SẢN PHẨM">
                    <i class="fas fa-search"></i>
                </div>
                <div class="user-icons">
                    <i class="fas fa-headphones"></i>
                  
                        <i class="fas fa-shopping-bag"></i> 
                    </a>


                    <!-- Kiểm tra nếu người dùng đã đăng nhập -->
                    @if (Auth::check())
                    <!-- Biểu tượng Đăng xuất -->

                    <a class="nav-link" href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="">
                        <a class="nav-link" href="#" role="button">{{ Auth::user()->name }}</a>
                    </li>
                    @endif




                </div>
            </div>
        </div>
    </header>
    <!-- Breadcrumb Section -->
    <section class="breadcrumb">
        <div class="container">
            <p>Trang chủ &nbsp; — &nbsp; ROSA CHARM</p>
        </div>
    </section>
    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
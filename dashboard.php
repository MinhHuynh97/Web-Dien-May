<?php
    session_start();
?>
<?php
    
    if(!isset($_SESSION['dangnhap']))
    {
        header('Location: index.php' );
    }
?>
<?php
    if(isset($_GET['login']))
    {
        $dangxuat=$_GET['login'];

    }else
    {
        $dangxuat='';
    }
    if($dangxuat=='dangxuat')
    {
        unset($_SESSION['dangnhap']);
        header('Location: index.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin  </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="xulydonhang.php">Đơn hàng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulydanhmuc.php">Danh mục sản phẩm</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="xulymuctin.php">Danh mục tin</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php"><?php unset($_SESSION['dangnhap']); ?>Đăng xuất</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
</body>
</html>
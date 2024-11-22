<?php
include('db/connect.php');
?>
<?php
    if(isset($_POST['dangnhap_index'])) {
        $taikhoan = $_POST['email_login'];
        $matkhau = md5($_POST['password_login']);
        if($taikhoan='' || $matkhau = ''){
            echo '<p>Nhập thiếu</p>';
        }else{
            $sql_select_admin = mysqli_query($conn,"SELECT * FROM account WHERE email='$taikhoan' and acpass='$matkhau' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0)
            {
            header('Location: index.php');
            }
            else{
                echo '<p>Tài khoản hoặc mật khẩu sai </p>';
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
         <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
 <?php
    include("include/topbar.php");
    if(isset($_GET['quanly']))
        $quanly=$_GET['quanly'];
    else
        $quanly='';

    switch ($quanly) {
        case 'danhmuc':
            include("include/danhmuc.php");
            break;
    }
    ?>  
    <body>
      
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Đăng nhập</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                
                        <div class="login-form">
                            <div class="col-md-6" style="margin: auto;">
                                <div class="col-md-12">

                                    <label>E-mail / Tên đăng nhập</label>
                                    <input class="form-control" type="text" name="email_login" placeholder="E-mail / Tên đăng nhập">
                                </div>
                                <div class="col-md-12">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" type="password" name="password_login" placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Đăng nhập cho những lần sau</label>
                                    </div>
                                </div>
                                <form action="my account.php">
                                <div class="col-md-12">
                                    <button class="btn" type="submit">Đăng nhập</button>
                                
                                </div>
                                </form>
                            </div>   
                            
                        </div>
                    
            </div>
        </div>
        <!-- Login End -->
               
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <?php
        include("include/footer.php");
        ?>
    </body>
</html>

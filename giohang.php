<?php 
 require("db/connect.php");
    $productname = $_POST['productname'];
    $productid = $_POST['productid'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql_giohang = "INSERT INTO giohang (giohangid,productname,productid,price,amount,image) values (NULL,'$productname','$productid','$price','$amount','$image')";
    $result=$con->query($sql_giohang);
        if($sql_giohang==0){
        header('Location:index.php?quanly=chitietsp&id='.$productid);  
    }
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <title>Webbie</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Webbie" name="keywords">
        <meta content="Webbie" name="description">

        <!-- Favicon -->
        <link href="img/icon.png" rel="icon">

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
?>
    <body>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="danhmuc.php">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng số</th>
                                            <th>Xóa sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            $sql19="select productid,productname, price, image, count(productid)  from giohang group by productid ";
                                            $result19=$con->query($sql19);

                                    ?>
                                    <tbody class="align-middle">
                                        <?php while($row19=$result19->fetch_assoc())
                                        {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="img/<?php echo $row19['image'] ?>" alt="Image"></a>
                                                    <p><?php echo $row19['productname'] ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $row19['price'] ?></td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            
                                            <td> <?php echo $row19['count(productid)']?></td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <button>Áp dụng</button>
                                    </div>
                                </div>
                                 <?php
                                           
                                            $sql20="select sum(price)  from giohang ";
                                            $result20=$con->query($sql20);
                                            $row20=$result20->fetch_assoc()
                                    ?>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Thông tin giỏ hàng</h1>
                                            <p>Đơn giá<span><?php echo $row20['sum(price)'] ?></span></p>
                                            <p>Phí vận chuyển<span>30000vnđ</span></p>
                                            <h2>Tổng tiền<span><?php echo $row20['sum(price)']+30000 ?></span></h2>
                                        </div>
                                        <div class="cart-btn" style="margin:center;">
                                            <button>Đặt hàng</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->

<?php 
    include("include/footer.php");    
?>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

    
<?php
include("include/brand.php");
?>
<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Thanh toán an toàn</h2>                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Giao hàng mọi nơi</h2>                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>Đổi trả trong vòng 7 ngày</h2>                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>Giải đáp mọi thắc mắc 24/7 </h2>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->      

<!-- Category Start-->
<div class="category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="category-item ch-400">
                    <img src="img/category-1.jpeg" />
                    <a class="category-name" href="">
                        <p>Gấu bông & Gối</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-item ch-250">
                    <img src="img/category-2.jpeg" />
                    <a class="category-name" href="">
                        <p>Văn phòng phẩm</p>
                    </a>
                </div>
                <div class="category-item ch-150">
                    <img src="img/category-4.jpeg" />
                    <a class="category-name" href="">
                        <p>Điện tử & Điện thoại</p>
                    </a>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-item ch-150">
                 <img src="img/category-3.jpeg" />
                    <a class="category-name" href="">
                        <p>Balo & Túi ví</p>
                    </a>   
                </div>
                <div class="category-item ch-250">
                    <img src="img/category-5.jpeg" />
                    <a class="category-name" href="">
                        <p>Trang trí</p>
                    </a>
                </div>
            </div>            
        </div>    
    </div>
</div>
<!-- Category End-->       

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Hotline</h1>
            </div>
            <div class="col-md-6">
                <p>+012-345-6789</p>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->       

<!-- Featured Product Start -->
<?php
$sql16="select * from product  order by productid desc";
$result16=$con->query($sql16);
?>
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Sản phẩm nổi bật</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">   
             <?php                           
                        
                if($result16->num_rows>0)
                while($row_16=$result16->fetch_assoc())
                { 
            ?>          
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">                                        
                        <a href="?quanly=chitietsp&id=<?php echo $row_16['productid'] ?>"><?php echo $row_16['productname'] ?></a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="?quanly=chitietsp&id=<?php echo $row_16['productid']?>">
                            <img src="img/<?php echo $row_16['image'] ?>" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a class="btn" style=" width: 75pt;" href="?quanly=chitietsp&id=<?php echo $row_16['productid']?>">Xem thêm</a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><?php echo $row_16['price']?><span>vnđ</span></h3>
                        <form action="giohang.php" method="POST" >
                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row_16 ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row_16 ['productname'] ?>">
                        <input type="hidden" name ="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row_16 ['price'] ?>">
                        <input type="hidden" name="image" value="<?php echo $row_16 ['image'] ?>"/>                                            
                        <input type="submit" class="btn" value="Thêm vào giỏ hàng"/>
                    </fieldset>
                    </form>  
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- Featured Product End -->       

<!-- Newsletter Start -->
<div class="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Đăng kí nhận thông báo mới</h1>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <input type="email" value="Nhập email của bạn">
                    <button style=" padding: 5pt;" >Đăng kí</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->       

<!-- Recent Product Start -->
<?php
$sql17="select * from product  order by productid asc";
$result17=$con->query($sql17);
?>
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
             <h1>Sản phẩm gần đây</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">   
             <?php                           
                        
                if($result17->num_rows>0)
                while($row_17=$result17->fetch_assoc())
                { 
            ?>          
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">                                        
                        <a href="?quanly=chitietsp&id=<?php echo $row_17['productid'] ?>"><?php echo $row_17['productname'] ?></a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="?quanly=chitietsp&id=<?php echo $row_17['productid']?>">
                            <img src="img/<?php echo $row_17['image'] ?>" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                            <a class="btn" style=" width: 75pt;" href="?quanly=chitietsp&id=<?php echo $row_17['productid']?>">Xem thêm</a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><?php echo $row_17['price']?><span>vnđ</span></h3>
                     <div class="action">                                            
                    <form action="giohang.php" method="POST" >
                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row_17 ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row_17 ['productname'] ?>">
                        <input type="hidden" name ="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row_17 ['price'] ?>">
                        <input type="hidden" name="image" value="<?php echo $row_17 ['image'] ?>"/>                                            
                        <input type="submit" class="btn" value="Thêm vào giỏ hàng"/>
                    </fieldset>
                    </form>                           
                    </div>                                       
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- Recent Product End --> 
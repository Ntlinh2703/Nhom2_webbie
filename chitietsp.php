<?php
if(isset($_GET['id'])) 
    $id=$_GET['id'];
else $id='';
$sql13="select * from product  where productid='$id' ";
$result13=$con->query($sql13);
$row_13=$result13->fetch_assoc()
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</a></li>
            <li class="breadcrumb-item active"><?php echo $row_13['productname']?></a></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
        
    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="img/<?php echo $row_13['image'] ?>" alt="Product Image">                                   
                                    
                                </div>
                                <div class="product-slider-single-nav normal-slider">
                                    <div class="slider-nav-img"><img src="img/<?php echo $row_13['image'] ?>" alt="Product Image"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2><?php echo $row_13['productname']?></h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Giá:</h4>
                                        <p><?php echo $row_13['price'] ?>vnđ<span><?php echo 1.5*$row_13['price'] ?>vnđ</span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Số lượng:</h4>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>                                        
                                        <div class="p-color">
                                            <h4>Màu sắc:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">Trắng </button>
                                                <button type="button" class="btn">Đen</button>
                                                <button type="button" class="btn">Xanh</button>
                                                <button type="button" class="btn">Vàng</button>
                                                <button type="button" class="btn">Đỏ</button>
                                            </div> 
                                        </div>
                                        <div class="action">                                            
                                            <form action="giohang.php" method="POST" >
                                            <fieldset>
                                            <input type="hidden" name="productid" value="<?php echo $row_13 ['productid'] ?>">
                                            <input type="hidden" name="productname" value = "<?php echo $row_13 ['productname'] ?>">
                                            <input type="hidden" name ="amount" value="1">
                                            <input type="hidden" name="price" value="<?php echo $row_13 ['price'] ?>">
                                            <input type="hidden" name="image" value="<?php echo $row_13 ['image'] ?>"/>                                            
                                            <input type="submit" class="btn" value="Thêm vào giỏ hàng"/>
                                            </fieldset>
                                            </form>                                     
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Mô tả sản phẩm</h4>
                                        <p>
                                         <?php echo $row_13['description'] ?>
                                        </p>
                                    </div>                                  
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Sản phẩm tương tự</h1>
                            </div>
                            <?php
                                $miniid=$row_13['miniid'];

                                $sql14="select * from product  where miniid='$miniid'";
                                $result14=$con->query($sql14);

                            ?>
                            <div class="row align-items-center product-slider product-slider-3">
                                
                            <?php
                                if($result14->num_rows>0)
                                while($row_14=$result14->fetch_assoc())
                                { 
                            ?> 
                                    <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="<a class="btn" href="?quanly=chitietsp&id=<?php echo $row_14['productid']?>"><?php echo $row_14['productname'] ?></a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="img/<?php echo $row_14['image'] ?>" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a class="btn" href="?quanly=chitietsp&id=<?php echo $row_14['productid']?>">Xem thêm</a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><?php echo $row_14['price'] ?><span>vnđ</span></h3>
                                            <form action="giohang.php" method="POST" >
                                            <fieldset>
                                                <input type="hidden" name="productid" value="<?php echo $row_14 ['productid'] ?>">
                                                <input type="hidden" name="productname" value = "<?php echo $row_14 ['productname'] ?>">
                                                <input type="hidden" name ="amount" value="1">
                                                <input type="hidden" name="price" value="<?php echo $row_14 ['price'] ?>">
                                                <input type="hidden" name="image" value="<?php echo $row_14 ['image'] ?>"/>                                            
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
                    <?php
                    include('include/sidebar.php');
                    ?>   
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
<?php
include("include/brand.php");
?>

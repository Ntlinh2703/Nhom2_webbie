
<?php
if(isset($_POST['btnsearch'])) 
    $tukhoa=$_POST['txtsearch'];
    
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item">Kết quả tìm kiếm cho từ khoá <i></i> </li>            
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
        
<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product-search">
                                       <h4><b>Sắp xếp theo</b></h3>
                                    </div>
                                </div>                                
                                <div class="col-md-8">
                                    <div class="product-price-range">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Mức giá</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="?quanly=timkiem&sapxep=tang&tukhoa=<?php echo $tukhoa?>" class="dropdown-item">Tãng dần</a>
                                                <a href="?quanly=timkiem&sapxep=giam&tukhoa=<?php echo $tukhoa?>" class="dropdown-item">Giảm dần</a>                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_GET['sapxep']))
                        $sapxep=$_GET['sapxep'];
                    else
                        $sapxep='';
                    switch ($sapxep) 
                    {
                        case 'tang':
                            $a=$_GET['tukhoa'];
                            $sql15="select * from product where productname like '%$a%' order by price desc";
                            break;
                        case 'giam':
                            $b=$_GET['tukhoa'];
                            $sql15="select * from product where productname like '%$b%' order by price asc";
                            break;        
                        default:
                            $sql15="select * from product where productname like '%$tukhoa%' order by productid desc";
                            break;
                    }
                    
                    $result15=$con->query($sql15);
                    
                        if($result15->num_rows>0)
                        while($row_15=$result15->fetch_assoc())
                        { 
                    ?> 
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">                                        
                                <a href="?quanly=chitietsp&id=<?php echo $row_15['productid'] ?>"><?php echo $row_15['productname'] ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="?quanly=chitietsp&id=<?php echo $row_15['productid']?>">
                                    <img src="img/<?php echo $row_15['image'] ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a class="btn" href="?quanly=chitietsp&id=<?php echo $row_15['productid']?>">Xem thêm</a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo $row_15['price']?><span>vnđ</span></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                
                <!-- Pagination Start -->
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Trước</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Tiếp theo</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination end -->
            </div>           
        <?php
        include('include/sidebar.php');
        ?>   

        </div>
    </div>
</div>
<!-- Product List End -->  

<?php
include("include/brand.php");
?>
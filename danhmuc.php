<?php
if(isset($_GET['id'])) 
    $id=$_GET['id'];
else $id='';

$sql10="select * from category a join minicategory b on a.categoryid=b.categoryid where miniid='$id'";
$result10=$con->query($sql10);
$row_10=$result10->fetch_assoc();
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item"><?php echo $row_10['categoryname']?></li>
            <li class="breadcrumb-item active"><?php echo $row_10['mininame']?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
 <?php
    if (!isset ($_GET["page"]) ) {
    $page = 1;
    } 
    else {
    $page = $_GET["page"];
    }
    $fields = 3;
    $x=($page-1)*$fields;    
    $sql9="select * from product a join minicategory b on a.miniid=b.miniid where a.miniid='$id' order by productid desc";
    $result9=$con->query($sql9);            
    $num=ceil($result9 ->num_rows/$fields);

    $sql11="select * from product a join minicategory b on a.miniid=b.miniid where a.miniid='$id' order by productid desc LIMIT $fields  OFFSET $x";
    $result11=$con ->query($sql11);     
 ?>
<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">                                   

                    <?php                           
                        
                        if($result11->num_rows>0)
                        while($row_11=$result11->fetch_assoc())
                        { 
                    ?> 
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">                                        
                                <a href="?quanly=chitietsp&id=<?php echo $row_11['productid'] ?>"><?php echo $row_11['productname'] ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="?quanly=chitietsp&id=<?php echo $row_11['productid']?>">
                                    <img src="img/<?php echo $row_11['image'] ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a class="btn" style=" width: 75pt;" href="?quanly=chitietsp&id=<?php echo $row_11['productid']?>">Xem thêm</a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo $row_11['price']?><span>vnđ</span></h3>
                                <form action="giohang.php" method="POST" >
                    <fieldset>
                        <input type="hidden" name="productid" value="<?php echo $row_11 ['productid'] ?>">
                        <input type="hidden" name="productname" value = "<?php echo $row_11 ['productname'] ?>">
                        <input type="hidden" name ="amount" value="1">
                        <input type="hidden" name="price" value="<?php echo $row_11 ['price'] ?>">
                        <input type="hidden" name="image" value="<?php echo $row_11 ['image'] ?>"/>                                            
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
                
                <!-- Pagination Start -->
                <div class="col-md-12" style="margin-bottom: 0pt;">
                    <nav aria-label="Page navigation example">                        
                        <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Trước</a>
                            </li>
                        <?php 
                            $i=1;
                            while($i<=$num) {
                        ?>
                        <li class="page-item "><a class="page-link" href="?quanly=danhmuc&id=<?php echo $id ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                            $i=$i+1;
                            }
                        ?>
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
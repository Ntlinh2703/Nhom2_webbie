<?php 
    include_once('db/connect.php');
?>
<!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        webbie@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->        
        <!-- Nav Bar Start -->
<?php
include("include/menu.php");
?>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.jpg" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <form action="index.php?quanly=timkiem" method='POST'>
                                <input type="text" name="txtsearch"placeholder="Tìm kiếm " required >
                                <button name="btnsearch" ><i class="fa fa-search" ></i></button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="giohang.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->
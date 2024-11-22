<!-- Main Slider Start -->
        <?php
                $sql_slider="select * from slider ";
                $result3=$con->query($sql_slider);
        ?>
        <div class="header">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-md-8">
                        <div class="header-slider normal-slider">
                            <?php
                                if($result3->num_rows>0)
                                while($row_slider=$result3->fetch_assoc())
                            { 
                            ?>
                            <div class="header-slider-item">
                                <img src="img/<?php echo $row_slider['sliderimage']?>" alt="Slider Image" style="width: 100%; height: 400px;" />
                                <div class="header-slider-caption">
                                    <p><?php echo $row_slider['slidercaption'] ?></p>
                                    
                                </div>
                            </div>                         
                            <?php                  
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/slide-1.jpg"  style="width: 100%; height: 400px;"/>
                                
                            </div>
                            <div class="img-item">
                                <img src="img/slide-2.jpg" style="width: 100%; height: 400px;"/>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End --> 
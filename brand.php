<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            <?php
                $sql17="select * from brand  order by brandid desc";
                $result17=$con->query($sql17);
                if($result17->num_rows>0)
                while($row_17=$result17->fetch_assoc())
                { 
            ?>
            <div class="brand-item"><img src="img\<?php echo $row_17['brandimage']?>" alt="Brand Image"></div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- Brand End -->  
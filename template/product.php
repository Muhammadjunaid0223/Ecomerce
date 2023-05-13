<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('header.php');
    ?>
<div class="hero_area">
        
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>

            <div class="container">
            <form action="" method="get">
               <div class="row">
                  
                     <div class="col-md-4">
                        <input type="text" class="form-control" name="search">
                        </div>

                        <div class="col-md-4">
                           <select name="filter" class="form-control">
                           <option value="n">Name</option>
                           <option value="c">Category</option>
                           <option value="l">Low to High</option>
                           <option value="h">High to low</option>
                        </select>
                        </div>
                        
                  
                  <div class="col-md-6">
                     <button type="submit" class="btn btn-danger" name="btn">Search
                     <i class="fa fa-search" aria-hidden="true"></i></button>
                     </button>

                  </div>
                  </form>
               </div>
               <?php
               if(isset($_GET["btn"])){
                  $serach = $_GET["search"];
                  $filter = $_GET["filter"];

                  if($filter = "n"){

                     $filterfetch ="SELECT * FROM `table_products` where product_name = '$serach'";
                  }

                  else if ($filter = "c"){
                     $filterfetch ="SELECT * FROM `tbl_catogary` where 'name' = '$serach'";
                     $runcat = mysqli_query($conn,$filterfetch);
                     $c = mysqli_fetch_array($runcat);

                     $cad_id = $c[0];
                     $fetch = "SELECT * FROM `product_catogary` where product_name = '$cad_id'";
                  }

                  else if ($filter = "l"){
                     $filterfetch ="SELECT * FROM `table_products` order by product_price asc";
                  }
                  else if ($filter = "h"){
                     $filterfetch ="SELECT * FROM `table_products` order by product_price desc";
                  }

               }
               else{
                  $fetch_product = "SELECT * FROM `table_products`";
                 
               }
               ?>
            </div>   
            <div class="row">

            <?php

            $fetch_product = "SELECT * FROM `table_products`";
            $excute = mysqli_query($conn,$fetch_product);
            $check_product = mysqli_num_rows($excute);

            if($check_product > 0) {
               while($convert = mysqli_fetch_array($excute)){?>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           <?php echo $convert[1]; ?>
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="<?php echo $convert[5]; ?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        <?php echo $convert[2]; ?>
                        </h5>
                        <h6>
                           Rs
                        </h6>
                     </div>
                  </div>
               </div>
             <?php  }
            } else {
               echo "Nothing To Show";
            }
            ?>
              
              
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->
      <?php
       include('footer.php');
      ?>
    
</body>
</html>
<?php session_start();
// session_destroy();
?>
<?php include "includes/head.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    if(isset($_POST["add_to_cart"]))  
    {  
         
      if(isset($_SESSION["cart"]))  
      {  
        $myitems=array_column($_SESSION['cart'],'p_name');
        if(in_array($_POST["p_name"],$myitems))
          {
            echo"<script>alert('Item ALready Added')</script>";
            // window.location.href='products.php';
          }
        else
          {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('p_id'=>$_POST["p_id"],'p_name'=>$_POST["p_name"],'p_price'=>$_POST["p_price"],'p_image'=>$_POST["p_image"]);    
            // print_r($_SESSION['cart']);
            echo"<script>alert('Item  Added')</script>";
          }    
             
      }  
      else  
      {  
          $_SESSION['cart'][0]=array('p_id'=>$_POST["p_id"],'p_name'=>$_POST["p_name"],'p_price'=>$_POST["p_price"],'p_image'=>$_POST["p_image"]);  
          //  print_r($_SESSION['cart']); 
      }  
    }     
}


?>



<?php include "includes/nav.php";?>  


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/slider/sl3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Products</em></h2>
                        <p>Our Special Dryfruit Cream Milk Just Ready For You!!!!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row" id="tabs">
                    <!-- <div class="col-lg-4">
                        <ul id="horizontal-list">
                        <li><a href='#tabs-1'><i class="fa fa-heart"></i> Cream MilkShakes</a></li>
                        <li><a href='#tabs-1'><i class="fa fa-heart"></i> Dryfruit Cream Milkshakes</a></li>
                        <li><a href='#tabs-1'><i class="fa fa-heart"></i> Hari Om Specials</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-8">
                        <section class='tabs-content'>
                        
                        <article>
                            <img src="assets/images/slider/sl2.jpg" alt="">
                        </article>
                        </section>  
                    </div> -->
                    <br>
                    <br>
                    <br>
                    <div >
                        
                        <section class='tabs-content'>

                            <br>
                            <article id='tabs-1'>
                                <div class="row">
                                        <?php
                                                $query_read_products = "SELECT * FROM products";
                                                $result_read_products= mysqli_query($connection, $query_read_products);

                                                if($result_read_products)

                                                {
                                                    while($row= mysqli_fetch_assoc($result_read_products))
                                                    {
                                                        $p_id= $row['p_id'];
                                                        $p_name= $row['p_name'];
                                                        $p_price= $row['p_price'];
                                                        $p_desc= $row['p_desc'];
                                                        $p_image= $row['p_image'];
                            
                                        ?>
                                                        

                                                            <div class="col-lg-4">
                                                                <form action="products.php" method="POST">
                                                                    <div class="trainer-item">
                                                                        <div class="image-thumb">
                                                                            <img class="img-responsive" src="assets/images/hariom/<?php echo $p_image;?>" alt="">
                                                                        
                                                                        </div>
                                                                        <div class="down-content">
                                                                            <span> <sup>Rs</sup> <?php echo "$p_price";?> </span><br>
                                                                    
                                                                            <br>
                                                                            <h4><?php echo "$p_name";?></h4>
                                                                            

                                                                            <input type="hidden" name="p_image" value="<?php echo "$p_image";?>">
                                                                            <input type="hidden" name="p_name" value="<?php echo "$p_name";?>">
                                                                            <input type="hidden" name="p_price" value="<?php echo "$p_price";?>">
                                                                            <input type="hidden" name="p_id" value="<?php echo "$p_id";?>">

                                                                            <ul class="social-icons">
                                                                                <li><input type="submit" name="add_to_cart" class="btn btn-primary btn-block waves-effect waves-light continue" value="+ Order">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </form>    
                                                            </div>
                                                        
                                                       
                                                                    
                                        <?php

                                                    }

                                                }
                                                else
                                                {
                                                    echo "Error in Query".mysqli_error($connection);
                                                }
                                        ?>    
                                    

                                        <!-- <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/chiku choco.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Chikoo Choco Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/choco c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Chocolate Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/dark choco c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Dark Chocolate Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/guava c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Guava Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/kaju c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Kaju Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/strawberry c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Strawberry Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/papaya c.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Papaya Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/papaya.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Papaya-Apple Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="trainer-item">
                                                <div class="image-thumb">
                                                    <img src="assets/images/hariom/mix fruit.jpg" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <span>
                                                        <sup>Rs.</sup>110.00
                                                    </span>

                                                    <h4>Mixed Fruit Cream Milk</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                                                    <ul class="social-icons">
                                                        <li><a href="product-details.php">+ Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                            </article>
                            <br>
                        </section>
                    </div>
            </div>

            
            <br>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
<h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 

    
    <?php include "includes/footer.php";?>   
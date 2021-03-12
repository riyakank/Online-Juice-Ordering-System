<?php session_start(); 
// session_destroy();
?>
<?php include "includes/head.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    if(isset($_POST["delete_item"]))  
    {  
      foreach($_SESSION['cart'] as $key => $value)
      {
        if($value['p_name']==$_POST['p_name'])
          {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo"<script>alert('Item Removed')</script>";
          }
      }     
      
    }   
    if(isset($_POST['order'])) 
  {
  echo"<script>alert('Order Placed!!')</script>";	
  header("Location: index.php");
  }   
}


 

?>
    
<?php include "includes/nav.php";?>  
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/slider/sl3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2> Fill Your <em>Cart</em> With Creamy <em>Juices</em> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

<br>
<br>
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="card wish-list mb-3">
        <div class="card-body">

          <!-- <h5 class="mb-4">Cart (<span></span> items)</h5> -->

          <div class="row mb-4">
            <?php
              $total=0;

              if(isset($_SESSION["cart"])) 
              {
                foreach($_SESSION["cart"] as $key => $value)
                {
                  $total=$total+($value['p_price']*$value['qty']); 
            ?>                 
                      <div class="col-md-5 col-lg-3 col-xl-3">
                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                            <div class="mask waves-effect waves-light">
                              <img class="img-fluid w-100" src="assets/images/hariom/<?php echo"$value[p_image]";?>" alt="">
                              <img >
                              <div class="mask rgba-black-slight waves-effect waves-light"></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-7 col-lg-9 col-xl-9">
                        <div>
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5><?php echo" $value[p_name]";?></h5>
                            </div>
                            <div>
                              <div class="def-number-input number-input safari_only mb-0 w-100">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                  class="minus"></button>
                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                  class="plus"></button>
                              </div>
                              <small id="passwordHelpBlock" class="form-text text-muted text-center">
                              </small>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><span><strong><?php echo "$value[p_price]";?></strong></span></p>
                           <form action="cart.php" method="POST">
                              <button name="delete_item" class="btn btn-sm btn-outline-primary card-link-secondary small text-uppercase mr-3">Remove item</button>
                              <input type="hidden" name="p_name" value="$value[p_name]">
                           </form>
                            
                          </div>
                        </div>
                      </div>
            <?php          
                }
              }
                
            ?>      
          </div>
          <hr class="mb-4">
          <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding items to your cart does not mean booking them.</p>
          
          
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing Info</h4>
            <form action="cart.php" method="POST" class="needs-validation" novalidate>
              
              <hr class="mb-4">

              <h4 class="mb-3">Payment</h4>

              <ul class="d-block my-3">
                <!-- <div class="custom-control custom-radio">
                  <input id="credit" name="credit" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div> -->
                <div href='#tabs-1' class="custom-control custom-radio">
                  <input id="upi" name="upi" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="upi">UPI</label>
                </div>
              </ul>
              <!-- <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div> -->
              <hr class="mb-4">
              <button name="order" id="order" class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
          </div>
       
        </div>
      </div>
      <!-- Card -->

      

    </div>
    <!--Grid column-->

    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"></span>
      </h4>
      <ul class="list-group mb-3">
          <?php
              
              if(isset($_SESSION["cart"])) 
              {
                foreach($_SESSION["cart"] as $key => $value)
                {
                   
          ?>          
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0"><?php echo" $value[p_name]";?></h6>
                      <!-- <small class="text-muted">Brief description</small> -->
                    </div>
                    <span class="text-muted"><?php echo" $value[p_price]";?></span>
                  </li>
          <?php          
                }
              }
                
          ?>          
      
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-Rs. 00</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total </span>
          <strong><?php echo"$total"?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>

    

  </div>
  <!--Grid row-->

</section>
<!--Section: Block Content-->

<?php include "includes/footer.php";?>   
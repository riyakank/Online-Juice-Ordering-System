<?php session_start();
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
            $_SESSION['cart'][$count]=array('p_id'=>$_POST["p_id"],'p_name'=>$_POST["p_name"],'p_price'=>$_POST["p_price"],'p_quantity'=>$_POST["qty"]);    
            print_r($_SESSION['cart']);
          }    
             
      }  
      else  
      {  
          $_SESSION['cart'][0]=array('p_id'=>$_POST["p_id"],'p_name'=>$_POST["p_name"],'p_price'=>$_POST["p_price"],'p_quantity'=>$_POST["qty"]);  
          //  print_r($_SESSION['cart']); 
      }  
    }     
}
?>
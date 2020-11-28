<!--

Cart/Checkout interface.
Goal for today: Get the products dynamically by ?id.

Jarryd Patel 26th June 2020
https://github.com/JarrydLeePatel


-->

<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT .DS. "header.php");?>




    <!-- Page Content -->
    <div class="container">
        
<p style="text-align:right;color:red;"><b>Note: Free Shipping on all orders Valid until December 26th!</b></p>
        
       
<!-- /.row -->

<div class="row">
    <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Checkout</h1>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="iungodevelopment@gmail.com">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
           <th>minus | add | remove</th>
              
          </tr>
        </thead>
        <tbody>
           <?php cart(); ?>
        </tbody>
    </table>
 <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHostedGuest">   
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals:</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Total Items:</th>
<td><span class="amount">
      
    <?php
    echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantitiy'] = "0";
    ?>
    
    </span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling:</th>
<td><p style="color:red;">Free Shipping!</p></td>
</tr>

<tr class="order-total">
<th>Order Total:</th>
<td><strong><span class="amount">R
    
    <?php
    echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
    
    </span></strong> </td>
</tr>

    

</tbody>

</table>

</div><!-- CART TOTALS-->


        

</div><!--Main Content-->

<div class="col-xs-4 pull-right ">
<a class="btn btn-info" target="_blank" href="index.php">Continue Shopping?</a>


<a class="btn btn-success" target="_blank" href="thank_you.php">Checkout</a>
</div>

<br>
 <?php include(TEMPLATE_FRONT .DS. "footer.php");?>
        
<?php
/*
FUNCTIONS THE E-COMMERCE PLATFORM
Jarryd Patel: 14 May 2020
https://github.com/JarrydLeePatel
*/
/******************************************************/
//TEST CODE TO CHECK IF DB IS CONNECTED//
/*

if($connection){
    echo "Database is connected";
    
}
echo "from functions";
*/


//*******HELPER FUNCTIONS FOR THE ECOMMERCE SYSTEM:*********************//

//MESSAGES BEGIN
function set_message($msg){//SET SUCCSESS OR ERROR MESSAGE//
    
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}


function display_message(){
    
 if(isset($_SESSION['message'])){
     
     echo $_SESSION['message'];
     unset ($_SESSION['message']);
     
 }
    
}
//MESSAGES END//



function redirect($location){
    
    header("Location: $location");
    
}

function query($sql){
    
    global $connection;
    return mysqli_query($connection, $sql);
}


function confirm($result){
 
    global $connection;
    
     if(!$result)
     {
         die("QUERY FAILED" . mysql_error($connection));
    }  
}

//prevention of sql injections
function escape_string($string){
    
    global $connection;
    
    return mysqli_real_escape_string($connection, $string);
    
}


function fetch_array($result){
    
    return mysqli_fetch_array($result);
    
}

/*********************FRONT-END-FUNCTIONS**************************/

/******NOTE:**********************
NOTE: Jarryd Patel 18th July:HEREDOC/NOWDOC?
    /*
    Heredoc and nowdoc provide useful alternatives to defining strings in PHP to the more widely used quoted string syntax
    Heredoc allows 
    */

/********************************/

//QUERY TO GET PRODUCTS IN THE PRODUCT DATABASE
function get_products(){
    
    $query=query("SELECT * FROM products");
    confirm($query);
    
    //fetching the data
    while($row = fetch_array($query)){
        
        //echo $row['product_price']; 
       //"add" = send to guest associative array //
$product = <<<DELIMETER

 <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                        
                        <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                            
                                <h4 class="pull-right">R{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                             
                                <p>{$row['short_desc']}</p>
                                
                                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a>
                                
                            </div>
                        </div>
</div>

DELIMETER;
        
 echo $product;
        
        
    }
    
 
    
    
}


function get_categories(){
    
$query = query("SELECT * FROM categories");
confirm($query); 
                    
while($row = fetch_array($query))
{        
$categories_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;
 
    echo $categories_links;
}
    
}




function get_products_in_cat_page() {
    
    $query=query("SELECT * FROM products WHERE product_category_id =" .escape_string($_GET['id'])." ");
    confirm($query);
    
    //fetching the data
    while($row = fetch_array($query)){
        
        //echo $row['product_price']; 
        
$product = <<<DELIMETER

    <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']} </h3>                         

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;
        
 echo $product;
        
        
    }
    
 
    
    
}


/************************************************************/
//SHOP FUNCTION//

function get_products_in_shop_page() {
    
    $query=query("SELECT * FROM products");
    confirm($query);
    
    //fetching the data
    while($row = fetch_array($query)){
        
        //echo $row['product_price']; 
        
$product = <<<DELIMETER

    <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']} </h3>                         

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;
        
 echo $product;
        
        
    }
    
 
    
    
}




//****************LOGIN FUNCTION**************//
function login_user(){
    
    if(isset($_POST['submit'])){
        
        
      $username = escape_string($_POST['username']);
      $password = escape_string($_POST['password']);
        
    $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
    confirm($query);
        
    
        
    if(mysqli_num_rows($query) == 0){
        
        set_message("Password or Username is incorrect");
        redirect("login.php");
    }
    else{
        
        $_SESSION['username'] = $username;
        //set_message("Welcome to Admin {$username}");
        redirect("admin");
    }

        
        
    }
    
}



function send_message(){
    
    if(isset($_POST['submit'])){

        $to         ="someEmailaddress@gmail.com";
        $from_name  = $_POST['name'];
        $subject    = $_POST['subject'];
        $email      = $_POST['email'];
        $message    = $_POST['message'];
 
        $headers = "From: {$from_name} {$email}";
        
        $result = mail($to, $subject,  $message,  $headers);
        
        if(!$result){
           echo "messaged failed";
        }
        else{
          echo "Messaged sent";
        }
    }
}







/*********************BACK-END-FUNCTIONS**************************/














?>
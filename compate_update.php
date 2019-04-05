<?php
session_start();
include_once("admin/connect.php");

//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["qty"]>0)
{
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
 	//we need to get product name and price from database.
    $statement = $con->prepare("SELECT name, image, price FROM food WHERE id=? LIMIT 1");
    $statement->bind_param('s', $new_product['id']);
    $statement->execute();
    $statement->bind_result($name, $image, $price);
	
	while($statement->fetch()){
		
		//fetch product name, price from db and add to new_product array
        $new_product["name"] = $name; 
		$new_product["image"] = $image;
        $new_product["price"] = $price;
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
    } 
}


//update or remove items 
if(isset($_POST["qty"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["qty"]) && is_array($_POST["qty"])){
		foreach($_POST["qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["qty"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
if($return_url == "" || $return_url == null)
{
	header('Location:index1.php');
}
else
{
	header('Location:'.$return_url);
}


?>
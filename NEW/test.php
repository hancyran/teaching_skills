<?php
include 'pay_new/showCart.php';
//test cookie
$cart_of_order= '2,3,4';
$cart_of_order_num= '1,1,2';
setCookie('cart_of_order', $cart_of_order, time() + 24*60*60);
setCookie('cart_of_order_num', $cart_of_order_num, time() + 24*60*60);

//
$cookie_arr= $_COOKIE;
$cart_order_arr= explode(',', $cookie_arr['cart_of_order']);
$order_num= count($cart_order_arr);
$cart_order_num_arr= explode(',', $cookie_arr['cart_of_order_num']);
print_r($cart_order_arr);
echo json_encode($cart_order_arr);
?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.cookie.js" charset="utf-8"></script>

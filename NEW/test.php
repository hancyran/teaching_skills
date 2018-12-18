<?php

//test cookie
$cookie_arr= $_COOKIE;

$cart_of_order= '1,2';
$cart_of_order_num= '1,3';
setCookie('cart_of_order', $cart_of_order, time() + 24*60*60, '/');
setCookie('cart_of_order_num', $cart_of_order_num, time() + 24*60*60, '/') ;

$cart_order_arr= explode(',', $cookie_arr['cart_of_order']);
$order_num= count($cart_order_arr);

$cart_order_num_arr= explode(',', $cookie_arr['cart_of_order_num']);
//if logged in, ignore cookie and get the cart_arr from DB;
//else, use the cookie as cart_arr

/*
$showCart= new showCart($cookie_arr);
$isLogin= $cookie_arr['isLogin'];
if ($isLogin == "1") {
	$cart_arr= $showCart->cart_arr;
}else {
	$cart_arr= $_COOKIE;
}
*/


$showTotalAmount= "";
$amount=0;
//convert php array of cookie to js array of cookie
$json_cart_of_order= json_encode($cart_order_arr);
$json_cart_of_order_num= json_encode($cart_order_num_arr);
echo $json_cart_of_order;
echo $json_cart_of_order_num;
?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.cookie.js" charset="utf-8"></script>
<script type="text/javascript">
	var cart= <?php echo $json_cart_of_order ?>;
	var cart_num_of_order= <?php echo $json_cart_of_order_num ?>;
	for (var i = 0; i < cart.length; i++) {
		cart[i]= parseInt(cart[i], 10);
		cart_num_of_order[i]= parseInt(cart_num_of_order[i], 10);
	};
</script>

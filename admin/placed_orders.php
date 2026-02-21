<?php

include '../components/connect.php';
session_start();

 $admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
};




if(isset($_POST['update_payment'])){
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
    $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
    $update_payment->execute([$payment_status, $order_id]);
    $message[] = 'payment status updated!';
 }
 
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order->execute([$delete_id]);
    header('location:placed_orders.php');
 }

 
 if(isset($_POST['place_order'])){
 
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $product_name = $_POST['product_name'];
    $product_name = filter_var($product_name, FILTER_SANITIZE_STRING);
    $total_products = $_POST['total_products'];
    $total_products = filter_var($total_products, FILTER_SANITIZE_STRING);
    $total_price = $_POST['total_price'];
    $total_price = filter_var($total_price, FILTER_SANITIZE_STRING);
    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRING);
    $payment_status = "pending";
    $placed_on = date('Y-m-d H:i:s');
    $insert_order = $conn->prepare("INSERT INTO `orders` (name, number,product_name, total_products, total_price, method, payment_status, placed_on) VALUES(?,?,?,?,?,?,?,?)");
    $insert_order->execute([$name, $number, $product_name, $total_products, $total_price, $method, $payment_status, $placed_on]);
 
    $message[] = 'Order placed successfully!';
 }
 ?>
 














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/dashbordstyle.css">
    <link rel="stylesheet" href="../css/update.css">

    <title>Placed Orders</title>
</head>
<body>


<?php include'../components/admin_sidebar.php' ?>

<section class="orders">

<h1 class="heading">placed orders</h1>
<a href="../components/generate_order_pdf.php?" class="pdf-btn">Download PDF</a>


<div class="order-form-container">
    <form action="" method="post">
        
        <input type="text" name="name" required placeholder="Enter customer name" maxlength="50" class="box">
        <input type="text" name="number" required placeholder="Enter contact number" maxlength="15" class="box" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        <input type="text" name="product_name" required placeholder="Enter Product name" maxlength="50" class="box">
        <input type="text" name="total_products" required placeholder="Enter total products" maxlength="50" class="box">
        <input type="text" name="total_price" required placeholder="Enter total price" maxlength="10" class="box" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
        <select name="method" required class="box">
            <option value="Cash on Delivery">Cash</option>
            <option value="Credit Card">Credit Card</option>
        </select>
        <input type="submit" value="Place Order" class="btn" name="place_order">
    </form>
</div>







<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span>Rs.<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>









<script src="../js/admin_script.js" ></script>

<script src="https://kit.fontawesome.com/841271d799.js" crossorigin="anonymous"></script>
</body>
</html>
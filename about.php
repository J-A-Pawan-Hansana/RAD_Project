<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/footer.css">


</head>
<body>

<?php include 'components/user_header.php'; ?>
<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Namarathna Group Mobile Store dedicated to providing customers with the latest smartphones and accessories. With a commitment to offering exceptional customer service, We have become a trusted name in the Sri Lankan mobile phone industry.</p>
<p>We pride ourselves on our extensive selection of mobile phones and accessories. We stock a variety of top brands such as Apple,Xiaomi. We also offer a range of accessories such as phone cases, screen protectors, headphones, and chargers.</p>
<p>We are committed to providing our customers with a seamless shopping experience, which is why we have an online store where customers can browse and purchase products from the comfort of their own homes. Our website is easy to navigate, and our online payment system is secure, ensuring that our customers’ personal and financial information is protected. .</p>
<p>We are passionate about technology and are dedicated to providing our customers with the latest and greatest mobile devices and accessories. We believe in building long-term relationships with our customers and are committed to ensuring that they are always satisfied with their purchases. .</p>

         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/pic-6.png" alt="">
         <p>Great experience at Namarathna Cellular and Electronics!  I highly recommend this shop to everyone for quality products and exceptional service!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Pawan Jayasingha</h3>
      
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-2.png" alt="">
         <p>I am a regular customer of Namarathna Cellular and Electronics.❤️Qulity of products 100% Customer service 100% Trust 100% Highly recommended💯❤️❤️❤️</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Chanu Wijetunga</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-3.png" alt="">
         <p>Excellent Quality Products for reasonable prices. I would definitely recommend Namarathna Cellular and Electronics.customer service 100% quick response 100%</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ruvini Wijerathna</h3>
      </div>

      

      

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>






<?php include 'components/footer.php'; ?>

<script src="js/script.js" ></script>

</body>
</html>
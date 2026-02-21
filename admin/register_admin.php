<?php

include '../components/connect.php';
session_start();

 $admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
};

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $cpass = $_POST['cpass'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING); 

    $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?  " );
    $select_admin->execute([$name]);

    if($select_admin->rowCount() > 0){
       $message[] = 'user name already exist!';
    }else{
        if($pass != $cpass){
            $message[] = 'confirm password not matched!';
        }else{
            $insert_admin = $conn->prepare("INSERT INTO `admin`(name, password) VALUES(?,?) ");
            $insert_admin->execute([$name, $cpass]);
            $message[] = 'new admin registered!';
        }
    }

   

}







?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/dashbordstyle.css">
    <link rel="stylesheet" href="../css/register.css">

    <title>Register</title>
</head>
<body>


<?php include'../components/admin_sidebar.php' ?>



<section class="formcontainer">

    <div class="formloginbox">
      <form action="" method="POST">
        <h1>register new</h1>
        <div class="inputbox">
        <input type="text" name="name" maxlength="20" required
        placeholder="enter user name" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
        <i class="fa fa-user" ></i>
        </div>
        
     <div class="inputbox">
     <input type="password" name="pass" maxlength="8" required
     placeholder="enter password" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
     <i class="fa fa-lock"></i>
     </div>

     <div class="inputbox">
     <input type="password" name="cpass" maxlength="8" required
     placeholder="conform password" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
     <i class="fa fa-lock"></i>
     </div>
       

     <input type="submit" value="register now" name="submit" class="btn" >

     </form>
    </div>
    


</section>








<script src="../js/admin_script.js" ></script>

<script src="https://kit.fontawesome.com/841271d799.js" crossorigin="anonymous"></script>
</body>
</html>
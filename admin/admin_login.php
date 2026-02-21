<?php

include '../components/connect.php';
session_start();

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ? " );
    $select_admin->execute([$name, $pass]);

    if($select_admin->rowCount() > 0){
        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        header('location:dashbord.php');
    }else{
        $message[] = 'incorrect username or pass word! ';
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/loginstyle.css">

    <title>Login</title>
</head>
<body>




<?php

if(isset($message)){
    foreach($message as $message){
        echo '
        
        <div class="message">
         <span>
            '.$message.'
         </span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
       </div>
         ';
    }
}



?>


    


<section class="form-container">

    <div class="formloginbox">
    <form action="" method="POST">
        <h1>Login Now</h1>
        <div class="inputbox">
        <input type="text" name="name" maxlength="20" required
        placeholder="enter user name" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
        <i class="fa fa-user" ></i>
        </div>
        
    <div class="inputbox">
    <input type="password" name="pass" maxlength="8" required
    placeholder="enter password " class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
    <i class="fa fa-lock"></i>
    </div>
       

    <input type="submit" value="log-in" name="submit" class="btn" >

    </form>
    </div>

    <div class="welcome">
        <div class="welcomeleft">
            <h1 > Hello, Welcome</h1>
            <p>to</p>
            <h2>NG Mobile Shop</h2>
        </div>
    </div>
    


</section>
    






<script src="https://kit.fontawesome.com/841271d799.js" crossorigin="anonymous"></script>
</body>
</html>
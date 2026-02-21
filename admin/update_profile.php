<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $update_profile_name = $conn->prepare("UPDATE `admin` SET name = ? WHERE id = ?");
   $update_profile_name->execute([$name, $admin_id]);

   $empty_pass = '';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = $_POST['old_pass'];
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = $_POST['new_pass'];
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = $_POST['confirm_pass'];
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if($old_pass == $empty_pass){
      $message[] = 'please enter old password!';
   }elseif($old_pass != $prev_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $confirm_pass){
      $message[] = 'confirm password not matched!';
   }else{
      if($new_pass != $empty_pass){
         $update_admin_pass = $conn->prepare("UPDATE `admin` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$confirm_pass, $admin_id]);
         $message[] = 'password updated successfully!';
      }else{
         $message[] = 'please enter a new password!';
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

    <title>Profile Update</title>
</head>
<body>


<?php include'../components/admin_sidebar.php' ?>

<section class="formcontainer">

    <div class="formloginbox">
      <form action="" method="POST">
        <h1>update profile</h1>


       <input type="hidden" name="prev_pass" value="<?= $fetch_profile['password']; ?>">

        <div class="inputbox">
        <input type="text" name="name" maxlength="20" value="<?= $fetch_profile['name']; ?>" required
        placeholder="enter user name" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
        <i class="fa fa-user" ></i>
        </div>
        
     <div class="inputbox">
     <input type="password" name="old_pass" maxlength="8" 
     placeholder="enter old password" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
     <i class="fa fa-lock"></i>
     </div>

     <div class="inputbox">
     <input type="password" name="new_pass" maxlength="8" 
     placeholder="enter new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
     <i class="fa fa-lock"></i>
     </div>

     <div class="inputbox">
     <input type="password" name="confirm_pass" maxlength="8" 
     placeholder="confirm new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')"  >
     <i class="fa fa-lock"></i>
     </div>
       

     <input type="submit" value="update now" name="submit" class="btn" >

     </form>
    </div>
    


</section>








<script src="../js/admin_script.js" ></script>

<script src="https://kit.fontawesome.com/841271d799.js" crossorigin="anonymous"></script>
</body>
</html>
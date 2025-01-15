<?php

@include '<web>config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('<location:web>home.html');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="styless.css">
  <link rel="stylesheet" href="web/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="post">
      <h1>Sign Up</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="input-box">
        <input type="text" name = "name" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="email" name = "email" placeholder="Email" required>
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name = "password" id="password" placeholder="Password" required>
    
        <span class="toggle-password" onclick="togglePasswordVisibility()"><i class='bx bx-show'></i></span> <!-- Icon to toggle password visibility -->
      </div>
      <div class="input-box">
        <input type="password" name = "cpassword" placeholder="Confirm Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <button type="submit" class="btn">Sign Up</button>
      <div class="register-link">
        <p>Already have an account? <a href="http://localhost/web/Login-Form/login_form.php">Login</a></p>
      </div>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>

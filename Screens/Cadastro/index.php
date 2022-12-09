<?php

@include '../../phpDocs/conexao.php';
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
 ini_set('display_errors', 1);



if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'Usuário já existe';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'Cadastrado com sucesso';
         header('location:../Login/index.php');
      }
   }

}

?>







<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <div class="pic">
            <img src="../../assets/store.gif" class="image" sizes="contain">

        </div>
        <div class="logindata">


            <h1>Cadastro</h1>
            <form action='' method="POST">
                <div class="txt_field">
                    <input type="text" required name='name' id='name'>
                    <span></span>
                    <label>Nome</label>
                </div>
                <div class="txt_field">
                    <input type="email" required name='email' id='email'>
                    <span></span>
                    <label>Email</label>
                </div>
                <!-- <div class="txt_field">
                    <input type="number" required name='cpf' id='cpf'>
                    <span></span>
                    <label>Cpf</label>
                </div> -->
                <div class="txt_field">
                    <input type="password" required name='pass' id='senha'>
                    <span></span>
                    <label>Senha</label>
                </div>
                <div class="txt_field">
                    <input type="password" required name='cpass' id='senha'>
                    <span></span>
                    <label>Confirmação de senha</label>
                </div>
                <!-- <div class="pass">Forgot Password?</div> -->
                <div class="buttonCad">
                    <input type="submit" value="Cadastre-se" name="submit">
                </div>
                <div class="signup_link">
                    <a href="../Login/index.html">Voltar para Login</a>
                </div>
                <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
                <!-- <div class="signup_link">
                Not a member? <a href="#">Signup</a>
            </div> -->
            </form>
        </div>
    </div>

</body>

</html>
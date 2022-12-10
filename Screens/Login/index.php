<?php

@include '../../phpDocs/conexao.php';
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
 ini_set('display_errors', 1);

session_start();

if(isset($_POST['submit'])){

   

   $filter_email = filter_var($_POST['email'] );
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass']);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');


   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
        //  alert('deubom')

         header('location:../../Admin/admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
        //  alert('deubom')
         header('location:../Inicio/index.php');

      }else{
         $message[] = 'Usuário não encontrado!';
      }

   }else{
      $message[] = 'Senha ou email incorretos!';
    //   echo('deubom')

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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>





    <div class="center">
        <div class="pic">
            <img src="../../assets/store_2.gif" class="image" sizes="contain">

        </div>
        <div class="logindata">


            <h1>Login</h1>
            <form action='' method="post">

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
                <!-- <div class="pass">Forgot Password?</div> -->
                <div class="buttonCad">
                    <input type="submit" value="Entrar" name="submit">

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
                <div class="signup_link">
                    Não tem uma conta? <a href="../Cadastro/index.php" class="back">Cadastar-se</a>
                </div>
        </div>

        </form>
    </div>
    </div>

</body>

</html>
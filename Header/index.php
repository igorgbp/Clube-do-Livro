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

<header class="header">

    <div class="flex">

        <a href="../Inicio/index.php" class="logo">Clube do Livro</a>

        <nav class="navbar">
            <ul>
                <li><a href="../Inicio/index.php">Inicio</a></li>
                
                <!-- <li><a href="../Shop/index.php">shop</a></li> -->
                <li><a href="../Pedidos/index.php">Pedidos</a></li>
                <!-- <li><a href="#">Conta +</a>
                    <ul>
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">Cadastrar</a></li>
                    </ul>
                </li> -->
                <li><a href="#">Mais +</a>
                    <ul>
                        <li><a href="../Sobre/index.php">sobre</a></li>
                        <li><a href="../Contato/index.php">contato</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="../Pesquisa/index.php" class="fas fa-search"></a>
            <a href="../../phpDocs/logout.php"> <div id="user-btn" class="fas fa-user"> </div></a>
            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="../Wishlist/index.php"><i class="fas fa-heart"></i>
            <!-- <span><?php echo $wishlist_num_rows; ?></span> -->
        </a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="../Carrinho/index.php"><i class="fas fa-shopping-cart"></i><span><?php echo $cart_num_rows; ?></span></a>
        </div>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="../../phpDocs/logout.php" class="delete-btn">logout</a>
        </div>

    </div>

</header>
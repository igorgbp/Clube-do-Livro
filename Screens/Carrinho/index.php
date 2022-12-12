<?php

@include '../../phpDocs/conexao.php';

session_start();

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];

if(!isset($user_id)){
   header('location:../Login/index.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'número '. $_POST['numero'].', '. $_POST['rua'].', '. $_POST['cidade'].','. $_POST['estado'].'  - '. $_POST['cep']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'Seu carrinho está vazio';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'O pedido já foi realizado';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'Pedido realizado com sucesso';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrinho</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
   
<?php @include '../../Header/index.php'; ?>

<section class="heading">
    <h3>carrinho de compras</h3>
    <!-- <p> <a href="home.php">home</a> / checkout </p> -->
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">seu carrinho está vazio</p>';
        }
    ?>
    <div class="grand-total">Valor total: <span>R$<?php echo $grand_total; ?></span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>Digite seus dados</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Seu nome</span>
                <input type="text" name="name" placeholder="Digite seu nome" value=<?php echo $user_name?>>
            </div>
            <div class="inputBox">
                <span>Seu número</span>
                <input type="number" name="number" min="0" placeholder="Digite seu número">
            </div>
            <div class="inputBox">
                <span>Seu email</span>
                <input type="email" name="email" placeholder="Digite seu email" value=<?php echo $user_email?>>
            </div>
            <div class="inputBox">
                <span>Meio de pagamento</span>
                <select name="method">
                    <option value="credit card">Cartão de crédito</option>
                    <option value="paypal">Paypal</option>
                    <option value="pix">Pix</option>
                </select>
            </div>
            <div class='flex'>
            <div class="inputBox">
                <span>Número</span>
                <input type="text" name="numero" placeholder="Digite o número do endereço">
            </div>
            <div class="inputBox">
                <span>Rua</span>
                <input type="text" name="rua" placeholder="Digite a Rua">
            </div>
            <div class="inputBox">
                <span>Cidade</span>
                <input type="text" name="cidade" placeholder="e.g. mumbai">
            </div>
            <div class="inputBox">
                <span>Estado</span>
                <input type="text" name="estado" placeholder="e.g. maharashtra">
            </div>
            <div class="inputBox">
                <span>CEP</span>
                <input type="number" min="0" name="cep" placeholder="Digite seu CEP">
            </div>
        </div>
            
        </div>

        

        <input type="submit" name="order" value="order now" class="btn">

    </form>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
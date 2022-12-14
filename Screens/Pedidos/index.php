<?php

@include '../../phpDocs/conexao.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../Login/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pedidos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
   
<?php @include '../../Header/index.php'; ?>

<section class="heading">
    <h3>meus pedidos</h3>
</section>

<section class="placed-orders">

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> <span class='dataTitle'>Data: </span><span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> <span class='dataTitle'>Nome: </span><span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> <span class='dataTitle'>Numero: </span><span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> <span class='dataTitle'>Email: </span><span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> <span class='dataTitle'>Endereço: </span><span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> <span class='dataTitle'>Meio de pagamento: </span><span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> <span class='dataTitle'>meus pedidos: </span><span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> <span class='dataTitle'>Valor total: </span><span>R$ <?php echo $fetch_orders['total_price']; ?></span> </p>
        <p> <span class='dataTitle'>Status do pagamento: </span><span style="color:<?php if($fetch_orders['payment_status'] == 'Pendente'){echo 'tomato'; }else{echo 'lightgreen';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">nenhum pedido</p>';
    }
    ?>
    </div>

</section>






<script src="../../js/script.js"></script>

</body>
</html>
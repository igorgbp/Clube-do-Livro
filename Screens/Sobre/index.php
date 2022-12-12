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
   <title>Sobre</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
   
<?php @include '../../Header/index.php'; ?>

<section class="heading">
    <h3>sobre</h3>
    <!-- <p> <a href="../Inicio/index.php">Inicio</a> / Sobre </p> -->
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img-1.png" alt="">
        </div>

        <div class="content">
            <h3>porque nos escolher?</h3>
            <p>Em um mundo caótico e estressante, uma boa dose de leitura melhora o seu dia. O Clube do Livro é a sua estante virtual rápida e acessível para todas as horas.</p>
            <a href="../Shop/index.php" class="btn">comprar agora</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>O que nós oferecemos?</h3>
            <p>Com a praticidade do nosso dia a dia, o Clube do Livro leva a leitura com mais facilidade para mais perto de você.</p>
            <a href="../Contato/index.php" class="btn">contate-nos</a>
        </div>

        <div class="image">
            <img src="images/about-img-2.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/about-img-3.jpg" alt="">
        </div>

        <div class="content">
            <h3>Quem nós somos?</h3>
            <p>Fundada em dezembro de 2022 em São João Evangelista, o clube do livro é uma loja virtual voltada a compra e vendas de livro on-line.</p>
            <a href="https://www.instagram.com/igor.gbp" class="btn">instagram</a>
            
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Reviews de clientes</h1>

    <div class="box-container">

        <div class="box">
            <img src="../../images/rick.jpg" alt="">
            <p>“Ótimo site, rápido e seguro. Cumpre o que promete”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Rick Dalton</h3>
        </div>

        <div class="box">
            <img src="../../images/bond.jpg" alt="">
            <p>“Muito bom o site, rápido e fácil de mexer. É acessível”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>James Bond</h3>
        </div>

        <div class="box">
            <img src="../../images/jhonny.jpeg" alt="">
            <p>"Como um amante pela leitura e pela sensação de entrar em livrarias, esse site é de longe a melhor livraria virtual de todos os tempos. Rápido e prático e confortável para leitura”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Jhonny Depp</h3>
        </div>

        <div class="box">
            <img src="../../images/nemo.png" alt="">
            <p>“Bom o site, o Clube do livro superou minhas expectativas. Difícil encontrar um site bom assim voltado a leitura”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Nemo Nobody</h3>
        </div>

        <div class="box">
            <img src="../../images/scott.jpg" alt="">
            <p>“Muito bem desenvolvido e completo o site. Recomendo muito pra quem gosta de ler muito”</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Scott Pilgrim</h3>
        </div>

        <div class="box">
            <img src="../../images/ramona.png" alt="">
            <p>“Quem diria que neste sistema teria um site tão bom assim grátis.”|</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ramona Flowers</h3>
        </div>

    </div>

</section>












<script src="../../js/script.js"></script>

</body>
</html>
<?php 

    require_once __DIR__.'/Connection.php';
    // require_once("Connection.php");

    $conn = Connection::getConnection();
    // print_r($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Lucro Certo</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
              <div class="container">
                <a class="navbar-brand" href="menu.html"><img src="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" class="img-fluid" id="logo-nav"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="menu.html" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Sobre nós</a>
                                <a><hr class="dropdown-divider bg-dark"></a>
                                <a class="dropdown-item" href="jogadores.php">Nossos Jogadores</a>
                            </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="cadastar.php">Cadastrar</a>
                        </li>
                    </ul>
                    <div><p class="">Olá, bem vindo <b>Admin</b>!</p></div>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Pesquisar">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </div>
          </div>
        </nav>
    </header>
    <main>
        <?php 
            $sql = "SELECT * FROM jogadores";
            $stmt = $conn->prepare($sql);
            $stmt->execute(); 
            $result = $stmt->fetchAll(); 
        ?>
        <h1>Nossos Jogadores</h1>
        <div class="container">
            <div class="row">
                <?php $count = 0; ?>
                <?php foreach ($result as $reg): ?>
                    <?php if ($count % 4 === 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="img/<?= $reg['link_img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $reg['nome'] ?></h5>
                                <p class="card-text">Jogador <?= $reg['nome'] ?>, <?= $reg['idade'] ?> anos, do time <?= $reg['nomeTime'] ?> na posição <?= $reg['funcao'] ?></p>
                                <a href="#" class="btn btn-primary">Contatar Jogador</a>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
            <div class="pergutas g-5">
                <div class="row">
                    <div class="col">
                        <h2>Perguntas frquentes</h2>
                        <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Como Funciona?
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="g-5 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-6 g-5">
            <h2>Entre em Contato</h2>
            <p><br> +55 (45) 3555-5555<br>contato@lucrocerto.br</p>
            <p><br> Av. Brasil, 100<br>Centro<br> Foz do Iguaçu/PR - CEP: 85.555-555</p>
          </div>
          <div class="col-6 g-5">
            <img src="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" alt="" srcset="" id="logo-ft" class="img-fluid">
            <a href=""><i class="fa-brands fa-linkedin icone "></i></a>
            <a href=""><i class="fa-brands fa-instagram icone "></i></a>
            <a href=""><i class="fa-brands fa-whatsapp icone "></i></a>
            <a href=""><i class="fa-brands fa-facebook icone "></i></a>
          </div>
        </div>
      </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
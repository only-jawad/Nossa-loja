<?php 
    require_once __DIR__.'/Connection.php';
    // require_once("Connection.php");

    $conn = Connection::getConnection();
    // print_r($conn);

    $msgErro = "";

    if (isset($_POST["submetido"])) {
        $nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : null;
        $nomeTime = isset($_POST["nomeTime"]) ? $_POST["nomeTime"] : null;
        $funcao = isset($_POST["funcao"]) ? $_POST["funcao"] : null;
        $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : null;
        $idade = isset($_POST["idade"]) ? trim($_POST["idade"]) : null;
        $link_img = isset($_POST["link_img"]) ? trim($_POST["link_img"]) : null;
        
        $sql = 'INSERT INTO jogadores(nome, nomeTime, sexo, idade, funcao, link_img)'.
                'VALUES (?, ?, ?, ?, ?, ?)';
        
        // validação

        if (!$nome) {
            $msgErro = "Informe o nome!";
        }
        if (!$nomeTime) {
            $msgErro = $msgErro."<br> Informe o time!";
        }
        if (!$funcao) {
            $msgErro = $msgErro."<br> Informe a funcao!";
        }
        if (!$sexo) {
            $msgErro = $msgErro."<br> Informe o sexo!";
        }
        if (!$idade) {
            $msgErro = $msgErro."<br> Informe a idade!";
        }
        if (!$link_img) {
            $msgErro = $msgErro."<br> Informe o link!";
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nome, $nomeTime, $sexo, $idade, $funcao, $link_img]);
    
            header("location: cadastrar.php");
        }  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" type="image/x-icon">
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
                            <a class="nav-link" href="menu.html" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
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
                          <a class="nav-link" href="#">Cadastrar</a>
                        </li>
                    </ul>
                    <div><p class="">Olá, bem vindo <b>Admin</b>!</p></div>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="barradepesquisa" type="text" placeholder="Pesquisar">
                        <button class="btn-navbar" type="submit">Pesquisar</button>
                    </form>
                </div>
          </div>
        </nav>
    </header>
    <main>
        <form action="" method="post">
            Nome: <input type="text" name="nome" placeholder="Informe o nome"> <br><br>
            Time: <input type="text" name="nomeTime" placeholder="Informe o time"> <br><br>
            Função: <input type="text" name="funcao" placeholder="Informe a função"> <br><br>
            Sexo: <select name="sexo">
                <option value="">--Selecione o sexo do jogador--</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
            <br><br>
            Idade: <input type="number" name="idade" placeholder="Informe a idade"><br><br>
            Link imagem: <input type="text" name="link_img" placeholder="Informe o link"><br><br>
            <div id="msg" style="color : red;"><?= $msgErro ?></div>
            <br><br>
            <button type="submit">Cadastrar</button>
            <input type="hidden" value="1" name="submetido">
        </form>
        <h3>Listagem de Jogadores</h3>
        <?php 
            $sql = "SELECT * FROM jogadores";
            $stmt = $conn->prepare($sql);
            $stmt->execute(); 
            $result = $stmt->fetchAll(); 
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Nome</td>
                    <td scope="col">Time</td>
                    <td scope="col">Função</td>
                    <td scope="col">Sexo</td>
                    <td scope="col">Idade</td>
                    <td scope="col">Link IMG</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <?php foreach ($result as $reg): ?>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo $reg['id']?></td>
                        <td><?php echo $reg['nome']?></td>
                        <td><?php echo $reg['nomeTime']?></td>
                        <td><?php echo $reg['funcao']?></td>
                        <td><?php
                                switch ($reg['sexo'] ) {
                                    case 'M':
                                        echo "Masculino";
                                        break;
                                    case 'F':
                                        echo "Feminino";
                                        break;
                                }
                        
                            ?>
                        </td>
                        <td><?= $reg['idade'] ?></td>
                        <td><?= $reg['link_img'] ?></td>
                        <td><a href="jogadores_del.php?id=<?= $reg['id'] ?>" onclick=" return confirm('Confirma a exclusão?')">
                        Exluir</a></td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </main>
    <footer></footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
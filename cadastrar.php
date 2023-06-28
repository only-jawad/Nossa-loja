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

    $sql = 'INSERT INTO jogadores (nome, nomeTime, sexo, idade, funcao, link_img) '.
            'VALUES (?, ?, ?, ?, ?, ?)';

    // Validação
    if (!$nome) {
        $msgErro = "Informe o nome!";
    }
    if (!$nomeTime) {
        $msgErro .= "<br>Informe o time!";
    }
    if (!$funcao) {
        $msgErro .= "<br>Informe a função!";
    }
    if (!$sexo) {
        $msgErro .= "<br>Informe o sexo!";
    }
    if (!$idade) {
        $msgErro .= "<br>Informe a idade!";
    }
    if (!$link_img) {
        $msgErro .= "<br>Informe o link!";
    } else {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $nomeTime, $sexo, $idade, $funcao, $link_img]);

        header("location: cadastrar.php");
        exit;
    }
}

$sql = "SELECT * FROM jogadores";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Cadastro de Jogadores</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomeTime" class="form-label">Time:</label>
                        <input type="text" name="nomeTime" id="nomeTime" class="form-control" placeholder="Informe o time" required>
                    </div>
                    <div class="mb-3">
                        <label for="funcao" class="form-label">Função:</label>
                        <input type="text" name="funcao" id="funcao" class="form-control" placeholder="Informe a função" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select name="sexo" id="sexo" class="form-select" required>
                            <option value="">-- Selecione o sexo do jogador --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade:</label>
                        <input type="number" name="idade" id="idade" class="form-control" placeholder="Informe a idade" required>
                    </div>
                    <div class="mb-3">
                        <label for="link_img" class="form-label">Link imagem:</label>
                        <input type="text" name="link_img" id="link_img" class="form-control" placeholder="Informe o link" required>
                    </div>
                    <div id="msg" style="color: red;"><?= $msgErro ?></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <input type="hidden" value="1" name="submetido">
                </form>
            </div>
        </div>

        <hr>

        <h3 class="text-center mt-4">Listagem de Jogadores</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Time</th>
                        <th>Função</th>
                        <th>Sexo</th>
                        <th>Idade</th>
                        <th>Link IMG</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $reg): ?>
                        <tr>
                            <td scope="row"><?= $reg['id'] ?></td>
                            <td><?= $reg['nome'] ?></td>
                            <td><?= $reg['nomeTime'] ?></td>
                            <td><?= $reg['funcao'] ?></td>
                            <td>
                                <?php
                                switch ($reg['sexo']) {
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
                            <td>
                                <a href="jogadores_del.php?id=<?= $reg['id'] ?>" onclick="return confirm('Confirma a exclusão?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

    <footer></footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>

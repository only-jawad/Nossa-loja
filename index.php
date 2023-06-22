<?php 
    $msgErro = "";
    $msgSucesso = "";

    $email = "";
    $senha = "";

    $sub = isset($_POST["submetido"]) ? $_POST["submetido"] : null;
    if ($sub) {
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;     
        $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : null;
        if (!$email) {
            $msgErro = "Informe o E-mail!";
        }
        if (!$senha) {
            $msgErro = $msgErro."<br> Informe a senha!";
        }
        else {
            if ($senha=="adm") {
                header("Location: menu.html");
                exit;
            } else {
               $msgErro = "E-mail ou senha incorretos";
            }
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
    <link rel="shortcut icon" href="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="style_login.css">
    <title>Lucro Certo!</title>
</head>
<form action="" method="post">
<body class="gradient-custom">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login Lucro Certo</h2>
              <img src="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" class="img-fluid" id="logo" alt="">
              <p class="text-white-50 mb-5">Por favor digite seu e-mail e senha!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" name="senha" value="<?= $email ?>" />
                <label class="form-label" for="typeEmailX" name="email">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="senha" value="<?= $senha ?>"/>
                <label class="form-label" for="typePasswordX">Senha</label>
              </div>
            <div class="g-5" id="msg" style="color : red;">
                <?= $msgErro ?>
            </div>
              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Esqueceu a senha?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              <input type="hidden" value="1" name="submetido">

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Ainda não tem uma conta? <a href="#!" class="text-white-50 fw-bold">Cadastre-se</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>
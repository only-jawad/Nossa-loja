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
          $msgErro = '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <div>
                  Informe o E-mail!
              </div>
          </div>';
      }
    
      if (!$senha) {
          $msgErro .= '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <div>
                  Informe a senha!
              </div>
          </div>';
      }
      else {
          if ($senha == "adm") {
              header("Location: menu.html");
              exit;
          } else {
              $msgErro = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                  <div>
                      E-mail ou senha incorretos
                  </div>
              </div>';
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
    <title>Lucro Certo!</title>
</head>
<form action="" method="post">
<body  style="background-color : #FF770D ;">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div style="color :#FF770D ;
                  background-color:#fff;
                  margin-bottom: 100px; 
                  border-radius: 25px; 
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase" 
              style="color :#FF770D ;">Login</h2>
              <img src="img/Logo_investimentos_chamativa_laranja_-removebg-preview.png" class="img-fluid" id="logo" alt="">
              <p style="color :#FF770D ;">Por favor digite seu e-mail e senha!</p>

              <div class="form-outline form-white mb-4">
                  <input type="email" 
                  id="typeEmailX" 
                  class="form-control form-control-lg" 
                  style="border-radius: 30px;
                  text-align: center;
                  border-color: #FF770D;
                  border-width: 5px;" 
                  name="senha" 
                  value="<?= $email ?>" />
                  <label class="form-label" 
                  for="typeEmailX" 
                  name="email">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                  <input type="password" 
                  id="typePasswordX" 
                  class="form-control form-control-lg" 
                  style="border-radius: 30px;
                  text-align: center;
                  border-color: #FF770D;
                  border-width: 5px;" 
                  name="senha"
                  value="<?= $senha ?>"/>
                  <label class="form-label" 
                  for="typePasswordX">Senha</label>
              </div>
            <div class="g-5" id="msg" style="color : red;">
              <?= $msgErro ?>
            </div>
            <p class="small mb-5 pb-lg-2">
              <a style="color: black;" href="#!" onmouseover="this.style.fontSize='16px'; this.style.color='#FF770D';" onmouseout="this.style.fontSize='inherit'; this.style.color='black';">
                Esqueceu a senha?
              </a>
            </p>
            
              <button class="btn btn-outline-light btn-lg px-5"
                  style="color: #fff;    
                  background-color: #FF770D ;
                  transition: all 0.3s ease;
                  border-radius: 30px;
                  text-align: center;
                  text-decoration: none;
                  font-weight: 600;
                  text-transform: uppercase;
                  box-shadow: -3px 6px 6px rgba(0, 0, 0, 0.1);" 
                  onmouseover="this.style.backgroundColor = '#ff4800'; this.style.transform = 'scale(1.1)';"
                  onmouseout="this.style.backgroundColor = '#FF770D'; this.style.transform = 'scale(1)';"
              >LOGIN</button>
                    <input type="hidden" value="1" name="submetido">

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-black"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-black"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>
            <div>
              <p style="color: #FF770D;">Ainda não tem uma conta? 
                <a href="#!" style="color: black;" onmouseover="this.style.fontSize='20px'; this.style.color='#ff4800';" onmouseout="this.style.fontSize='inherit'; this.style.color='black';">Cadastre-se</a>
              </p>
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

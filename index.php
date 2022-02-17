<?php include_once "templates/header.php"; ?>

<!--------------------------- Login -->
<?php

$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
  die("Greska". $mysqli->error);
}

if(isset($_POST['buttonLogin']))
{
  $userEmail = $_POST['email'];
  $userPassword = $_POST['password'];
  
  $sqlCheck = $mysqli->query("SELECT * FROM korisnik WHERE email = '$userEmail' AND sifra = '$userPassword'");
  if(mysqli_num_rows($sqlCheck)>0)
  {
    $sqlErrorUpdate = $mysqli->query("UPDATE korisnik SET error_count = 0 WHERE email = '$userEmail'");
    $userData = mysqli_fetch_assoc($sqlCheck);
    
    if($userData['role']=='user')
    {
      session_start();
      $_SESSION['user'] = $userData['ime'];
      setcookie("loginMsg", $_SESSION['user'], time() + (10));
      header('location:user/index.php');
    }
    else if($userData['role']=='admin')
    {
      session_start();
      $_SESSION['user'] = $userData['ime'];
      header('location:admin/index.php');
    }
  }
  else
  {
    $dataEmail = $mysqli->query("SELECT * FROM korisnik WHERE email = '$userEmail'");
    if(mysqli_num_rows($dataEmail)>0)
    {
      $sqlErrorUpdate = $mysqli->query("UPDATE korisnik SET error_count = error_count + 1 WHERE email = '$userEmail'");
      $dataUpdateEmail = $mysqli->query("SELECT * FROM korisnik WHERE email = '$userEmail'");
      $finalResult = mysqli_fetch_assoc($dataUpdateEmail);
      
      if($finalResult['error_count']==1)
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert ">
        <strong>Greska! </strong> Ostalo vam je jos 2 pokusaja!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      else if($finalResult['error_count']==2)
      {
        $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert ">
        <strong>Greska! </strong> Ostalo vam je jos 1 pokusaj! Na sledecu gresku Vam se brise profil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      else if($finalResult['error_count']==3)
      {
        $sqlDelete = $mysqli->query("DELETE FROM korisnik WHERE email = '$userEmail'");
        $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert ">
        <strong>Greska! </strong> Vas profil je obrisan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    }
    else
    {
      $msg = '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert ">
      <strong>Greska! </strong> Uneli ste pogresne podatke!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
  }
}


?>

<div class="container text-center">
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-3 ch_position">
      <img src="images/logo.png"style="width: 260px; height: 200px;"><hr>Dobro dosli u <h1 class="ch_bold">Golden Hour</h1>
      <form method="post">
        <div class="form-group">
          <input type="email" class="form-control" id="emailLogin" name="email" aria-describedby="emailHelp" placeholder="Email">
          <small id="emailHelp" class="form-text text-muted"></small>
          <span id="emailLoginError"></span>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="passLogin" name="password" placeholder="Sifru">
          <span id="passLoginError"></span>
        </div>
        <button type="submit" id="btnLogin" name="buttonLogin" class="btn fire btn-block">Prijavi se</button>
      </form>
      <span class="float-left mt-1"><a href="#" data-toggle="modal" data-target="#register">Novi ste korisnik?</a></span><span class="float-right mt-1"><a href="#0" data-toggle="modal" data-target="#forget">Zaboravili ste lozinku?</a></span>
      <?php echo @$msg; ?>
    </div>
    <div class="col-sm-5">
    </div>
  </div>
</div>

<!--------------------------- Registration -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="far fa-clock"></i> &nbsp;Registrujte se</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseReg">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="RegForm">
            <div class="form-group">
              <input type="text" class="form-control" id="regIme" name="regIme" aria-describedby="emailHelp" placeholder="Ime">
              <span id="imeError"></span>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="regEmail" name="regEmail" aria-describedby="emailHelp" placeholder="Email">
              <span id="emailError"></span>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="regPass" name="regPass" placeholder="Sifru">
              <span id="passError"></span>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <div class="ch_left" id="msg"></div>
        <button type="button" class="btn fire" id="btnRegForm">Registruj se</button>
        <button class="btn fire" type="button" disabled id="snipper">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Molimo sacekajte...
        </button>
      </div>
    </div>
  </div>
</div>


<!------------------------ Forget -->
<div class="modal fade" id="forget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="far fa-clock"></i> &nbsp;Zaboravljena Lozinka?</h5>
        <button type="button" class="close" id="btnCloseForget" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="ForgotPassForm">
            <div class="form-group">
              <input type="email" class="form-control" id="forgotEmail" name="forgotEmail" aria-describedby="emailHelp" placeholder="Unesite email">
              <span id="emailError1"></span>
            </div>
            <div class="form-group" id="divPassword">
              <input type="password" class="form-control" id="forgotPassword" name="forgotPassword" placeholder="Unesite novu lozinku">
              <span id="passError1"></span>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <div class="ch_left" id="msg1"></div>
        <button type="button" class="btn fire" id="btnVerifyEmail">Potvrdi Email</button>
        <button type="button" class="btn fire" id="btnPassForgot">Promenite lozinku</button>
      </div>
    </div>
  </div>
</div>

<?php include_once "templates/footer.php"; ?>
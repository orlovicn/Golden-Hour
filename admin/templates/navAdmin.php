<!----------------- Pocetak Navbara -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fire sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png"alt="Golden Hour" height="40" width="55"> <?php echo $_SESSION['user'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dodaj:
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php">Dodaj Proizvodjaca</a>
                        <a class="dropdown-item" href="proizvod.php">Dodaj Proizvod</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../index.php"><i class="fas fa-sign-out-alt"></i> Odjavi se</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
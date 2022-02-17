<?php  $userName = $_SESSION['user'];  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fire sticky-top">
    <div class="container">
        <ul class="navbar-nav me-auto ml-auto">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png"alt="Golden Hour" height="40" width="55"></i> Golden Hour</a>   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Proizvodi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="muskarci.php">Muskarci</a></li>
                        <li><a class="dropdown-item" href="zene.php">Zene</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="allwatch.php">Svi proizvodi</a></li>
                    </ul>
                </li>
        </ul>
            <!--------Center container---->
            <ul class="navbar-nav me-auto ml-auto">
                <form class="d-flex">
                    <input class="form-control me-2 ch_length" id="search_bar" data-bs-toggle="popover" title="ShearchPopover" data-bs-trigger="focus" data-bs-html="true" data-bs-content="" type="search" placeholder="Pretrazite" aria-label="Search">
                    <!-- <button class="btn btn " data-bs-toggle="modal" data-bs-target="#filterModal" id="filterBtn" type="button"><i class="fas fa-filter"></i></button> -->
                </form>
            </ul>
            <!------Right containerr------>
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="onama.php">O nama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown"  id="cart-popover" role="button"  aria-expanded="false" data-bs-toggle="modal" data-bs-target="#modalKorpa">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="numOrd"></span>
                            </a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php 
                        $sqlData = $mysqli->query("SELECT * FROM korisnik WHERE ime ='$userName'");
                        while($finalResult = $sqlData->fetch_assoc()){
                            echo $finalResult['ime'];
                        }
                        ?>                    
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../index.php"><i class="fas fa-sign-out-alt"></i> Odjavi se</a>
                    </div>
            </ul>
        </div> 
    </div>
</nav>
<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8" id="shearchVisible" visibility="hidden">
        <div class="row" id="shearchResult">

        </div>
    </div>
    <div class="col-sm-2">

    </div>
</div>
<!-- <div class="col-sm-12" id="filterVisible" visibility="hidden">
    <div class="row" id="filterResults">

    </div>
</div> -->
<!-- MODAL FOR FILTERS STARTS HERE -->
<div class="modal fade " id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="ModalBody">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-group">
                            <h6>Proizvodjac</h6>
                            <select class="form-select" name="sbProizvodjac" id="sbProizvodjac"aria-label="Default select example">
                                <option selected value="0">---Izaberi Proizvodjaca-----</option>
                                <?php 
                                $getProiz = $mysqli->query("SELECT * FROM proizvodjaci");
                                while($total = $getProiz->fetch_assoc()) :
                                    ?>
                                    <option value="<?php echo $total['id']; ?>" ><?php echo $total['naziv']; ?></option>
                                <?php endwhile ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-group">
                            <h6>Pol</h6>
                            <select class="form-select" name="sbKategorija" id="sbKategorija"aria-label="Default select example">
                                <option selected value="0">---Izaberi pol-----</option>
                                <?php 
                                $getPol = $mysqli->query("SELECT DISTINCT pol FROM proizvodi");
                                while($total = $getPol->fetch_assoc()) :
                                    ?>
                                    <option value="<?php echo $total['pol']; ?>" ><?php echo $total['pol']; ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="resetFilter" name="resetFilter">Reset</button>
                <button type="button" class="btn btn-primary fire" id="primeniBtn" name="primeniBtn">Apply filter</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR SHOPPING CART STARTS HERE -->
<div class="modal fade" tabindex="-1" id="modalKorpa" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Korpa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalContent">
        <span id="modalProizvod" name="modalProizvod">
            
        </span>      
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-primary checkout fire">Kupi</button>
      </div>
    </div>
  </div>
</div>
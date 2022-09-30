<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvoluateWatch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="../assets/img/ew.ico" type="image/x-icon">
</head>

<body style="text-align: center;">
    <?php
    require_once "../controller/controller.php";
    $cinema = new Cinemas;
    $filme = $cinema->listarFilme();
    $serie = $cinema->listarSerie();
    ?>
    <div class="container-fluid">
        <nav class="novbar novbar-default">
            <h2 class="logo">Evaluate <span>Watch</span></h2>
            <ul class="nov novbar-nov">
                <li><a href="#" id="len1" class="hoverable text-white">Home</a></li>
                <li><a href="#mainFilme" id="len2" class="hoverable text-white">Filmes</a></li>
                <li><a href="#mainSerie" id="len3" class="hoverable text-white">Series</a></li>
            </ul>
            <button type="button"><a href="cadastro.php">Cadastrar</a></button>
        </nav>
    </div>
    <div class="mt-2">
        <h1 class=aa>MELHORES AVALIAÇÕES</h1>
    </div>
    <br>
    <section class="col-6 mx-auto">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../assets/img/crown.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/pll.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/ST.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>

    <br></br>

    <div id="mainFilme">
        <h2 class=filme>FILMES</h2>
    </div>

    <main class="cord">
        <?php
        foreach ($filme as $key => $filme) {
        ?>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="../assets/img/<?=$filme['img']?>" alt="lou.png" style="width:200px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1 class="fs-5"><?=$filme['nome']?></h1>
                    <p><?=$filme['descricao']?></p>
                  <div class="d-flex justify-content-center">
                    <?php
                    $cinema->nota($filme['nota']);
                    ?>
                    <p class="ms-2"><?=$filme['nota']?></p>
                  </div>
                </div>
            </div>
          <form method="get" class="mt-3">
            <a href="editar.php?id=<?=$filme['id']?>" class="btn btn-success">Editar</a>
            <input type="hidden" name="id" value="<?=$filme['id']?>">
            <button name="excluir" type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
        <?php
        }
        ?>
    </main>
    <br></br>

    <div id="mainSerie">
        <h2 class="serie">SÉRIES</h2>
    </div>

    <main class="cord">
        <?php
        foreach ($serie as $key => $serie) {
        ?>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="../assets/img/<?=$serie['img']?>" alt="lou.png" style="width:200px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1 class="fs-5"><?=$serie['nome']?></h1>
                    <p><?=$serie['descricao']?></p>
                  <div class="d-flex justify-content-center">
                    <img src="../assets/img/estrela.png" width="20px" height="20px">
                    <img src="../assets/img/estrela.png" width="20px" height="20px">
                    <img src="../assets/img/estrelaHalf.png" width="20px" height="20px">
                    <img src="../assets/img/estrelaVazia.png" width="20px" height="20px">
                    <img src="../assets/img/estrelaVazia.png" width="20px" height="20px">
                    <p class="ms-2"><?=$serie['nota']?></p>
                  </div>
                </div>
            </div>
          <form method="post" class="mt-3">
            <a href="editar.php?id=<?=$serie['id']?>" class="btn btn-success">Editar</a>
            <input type="hidden" name="id" value="<?=$serie['id']?>">
            <button name="excluir" type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
        <?php
        }
        ?>
    </main>

    <?php
    if(isset($_GET['excluir'])){
        $cinema->excluir($_GET['id']);
    }

    ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

      
</body>

</html>
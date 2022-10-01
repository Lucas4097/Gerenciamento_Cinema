<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvoluateWatch - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/ew.ico" type="image/x-icon">
</head>
<body>
    <?php
    require_once "../controller/controller.php";
    $filme = new Cinemas;
    $cinema = $filme->listarID($_GET['id']);
    $filme = new Cinemas;
    $filme->listarID($_GET['id']);
    ?>
    <header class="container-fluid">
        <nav class="novbar novbar-default">
            <h2 class="logo">Evaluate <span>Watch</span></h2>
            <ul class="nov novbar-nov">
                <li><a href="painel.php" id="len1" class="hoverable text-white">Home</a></li>
                <li><a href="painel.php#mainFilme" id="len2" class="hoverable text-white">Filmes</a></li>
                <li><a href="painel.php" id="len3" class="hoverable text-white">Series</a></li>
            </ul>
            <button type="button"><a href="painel.php">Painel</a></button>
        </nav>
    </header>

    <section class="h-75 container mt-5 d-flex justify-content-center align-items-center">
        <div class="row p-2 " style="width: 600px;">
            <form class="col-10" action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <input class="form-control" name="nome" type="text" value="<?= $cinema['nome'] ?>">
                    <label>Nome</label>
                </div>
                <div class="mb-2">
                    <textarea class="form-control" name="descricao"><?= $cinema['descricao'] ?></textarea>
                    <label>Descrição</label>
                </div>
                <div class="form-check form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="filme"
                    <?php
                    if($cinema['tipo'] == 'filme'){
                        echo ("checked");
                    }
                    ?>
                    >
                    <label class="form-check-label" for="inlineRadio1">Filme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="serie"
                    <?php
                    if($cinema['tipo'] == 'serie'){
                        echo ("checked");
                    }
                    ?>
                    >
                    <label class="form-check-label" for="inlineRadio2">Série</label>
                  </div>
                <div class="mb-2">
                    <input class="form-control" name="nota" type="number" step="0.1" max="5" value="<?= $cinema['nota'] ?>">
                    <label>Nota</label>
                </div>
                <div class="mb-2">
                    <input class="form-control" type="file" id="formFile" name="img">
                    <label for="formFile" class="form-label">Imagem</label>
                </div>
                <button class="btn btn-danger" type="submit" name="editar">Editar</button>
            </form>
            <div class="col-2">
                <img src="../assets/img/<?=$cinema['img']?>" width="230px" height="300px" alt="">
            </div>
    <?php
    if(isset($_POST['editar'])){
        if(!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['nota']) && !empty($_FILES['img']['name']) && !empty($_POST['tipo'])){
            $arquivo = $_FILES['img'];
            $cinema = new Cinemas;
            $cinema->editar($_POST['nome'], $_POST['descricao'], $_POST['tipo'], $_POST['nota'], $arquivo['name'], $_GET['id']);
        }else{
            echo "<div><p class='alert alert-danger mt-2'>Campos vázios!</p></div>";
        }
    }
    ?>
        </div>
    </section>
</body>
</html>
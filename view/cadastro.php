<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvoluateWatch - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/ew.ico" type="image/x-icon">
</head>
<body>
    <head class="container-fluid">
        <nav class="novbar novbar-default">
            <h2 class="logo">Evaluate <span>Watch</span></h2>
            <ul class="nov novbar-nov">
                <li><a href="painel.php" id="len1" class="hoverable text-white">Home</a></li>
                <li><a href="painel.php#mainFilme" id="len2" class="hoverable text-white">Filmes</a></li>
                <li><a href="painel.php#mainSerie" id="len3" class="hoverable text-white">Series</a></li>
            </ul>
            <button type="button"><a href="painel.php">Painel</a></button>
        </nav>
    </head>

    <section class="h-75 container mt-5 d-flex justify-content-center align-items-center">
        <div class=" p-2 " style="width: 500px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <input class="form-control" name="nome" type="text">
                    <label>Nome</label>
                </div>
                <div class="mb-2">
                    <textarea class="form-control" name="descricao"></textarea>
                    <label>Descrição</label>
                </div>
                <div class="form-check form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="filme">
                    <label class="form-check-label" for="inlineRadio1">Filme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="serie">
                    <label class="form-check-label" for="inlineRadio2">Série</label>
                  </div>
                <div class="mb-2">
                    <input class="form-control" name="nota" type="number" step="0.1" max="5">
                    <label>Nota</label>
                </div>
                <div class="mb-2">
                    <input class="form-control" type="file" id="formFile" name="img">
                    <label for="formFile" class="form-label">Imagem</label>
                </div>
                <button class="btn btn-danger" type="submit" name="cadastro">Cadastrar</button>
            </form>
        
    <?php
    if(isset($_POST['cadastro'])){
        if(!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['nota']) && !empty($_POST['tipo']) && !empty($_FILES['img']['name'])){
            $arquivo = $_FILES['img'];
            move_uploaded_file($arquivo['tmp_name'], "../assets/img/". $arquivo['name']);
            require_once "../controller/controller.php";
            $cinema = new Cinemas;
            $cinema->criar($_POST['nome'], $_POST['descricao'], $_POST['nota'], $_POST['tipo'] ,$arquivo['name']);
        }else{
            echo "<div>
                    <p class='alert alert-danger mt-2'>Campos vázios!</p>
                </div>";
        }
    }
    ?>
        </div>
    </section>
</body>
</html>
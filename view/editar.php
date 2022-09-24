<?php
require_once "../controller/controller.php";
$filme = new Cinemas;
$cinema = $filme->listarID($_GET['id']);
$filme = new Cinemas;
$filme->listarID($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input class="form-control" name="nome" type="text" value="<?= $cinema['nome'] ?> ">
        <label>Nome</label>
        <textarea class="form-control" name="descricao"><?= $cinema['descricao'] ?></textarea>
        <label>Descrição</label>
        <input class="form-control" name="nota" type="number" value="<?=$cinema['nota'] ?>">
        <label>Nota</label>
        <input class="form-control" type="file" id="formFile" name="img">
        <label for="formFile" class="form-label">Imagem  <img src="../img/<?=$cinema['img']?>" width="20px" alt=""></label>
        <br>
        <button class="btn btn-success" type="submit" name="editar">Editar</button>
    </form>

    <a href="painel.php">painel</a>


    <?php
    if(isset($_POST['editar'])){
        if(!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['nota']) && !empty($_FILES['img']['name'])){
            require_once "../controller/controller.php";
            $arquivo = $_FILES['img'];
            $cinema = new Cinemas;
            $cinema->editar($_POST['nome'], $_POST['descricao'], $_POST['nota'], $arquivo['name'], $_GET['id']);
        }
    }

    ?>

</body>
</html>
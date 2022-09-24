<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input class="form-control" name="nome" type="text">
        <label>Nome</label>
        <textarea class="form-control" name="descricao"></textarea>
        <label>Descrição</label>
        <!-- <input class="form-control" name="nota" type="number"> -->
        <select name="nota" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label>Nota</label>
        <input class="form-control" type="file" id="formFile" name="img">
        <label for="formFile" class="form-label">Imagem</label>
        <br>
        <button class="btn btn-success" type="submit" name="cadastro">Cadastrar</button>
    </form>
    <a href="painel.php">Painel</a>


    <?php
    
    if(isset($_POST['cadastro'])){
        if(isset($_FILES['img']) && !empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['nota'])){
            $arquivo = $_FILES['img'];
            move_uploaded_file($arquivo['tmp_name'], "../img/". $arquivo['name']);
            require_once "../controller/controller.php";
            $cinema = new Cinemas;
            $cinema->criar($_POST['nome'], $_POST['descricao'], $_POST['nota'], $arquivo['name']);
        }else{
            echo "Campos vazios!";
        }
    }


    ?>
</body>
</html>
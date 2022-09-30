<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Nota</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../controller/controller.php";
            $cinema = new Cinemas;
            $filme = $cinema->listar();

            foreach ($filme as $key => $filme) {
                echo("
                <tr>
                    <td>" .($key+1). "</td>
                    <td> {$filme['nome']} </td>
                    <td> {$filme['descricao']} </td>
                    <td>");
                    $nota = $filme['nota'];
                    for ($i=0; $i < 5; $i++) { 
                        if($nota > 0){
                            echo ("<img src='../img/estrela.png' width='20px'>");
                            $nota--;
                        }else{
                            echo ("<img src='../img/estrelaApagada.png' width='20px'>");
                        }
                    }
                echo("</td>
                    <td><img src='../img/{$filme['img']}' width='20px' alt=''> </td>
                    <form method='get'>
                        <input type='hidden' name='id' value='{$filme['id']}'>
                        <td><a href='editar.php?id={$filme['id']}' class='btn btn-success'>Editar</a> <button type='submit' name='excluir' class='btn btn-danger'>Excluir</button></td>
                    </form>
                </tr>
                ");
            }
            ?>
        </tbody>
    </table>
    <a href="cadastro.php">Cadastro</a>

    <?php
    if(isset($_GET['excluir'])){
        $cinema->excluir($_GET['id']);
    }
    ?>
</body>

</html>
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
                    for ($i=0; $i < 5; $i++) { 
                        if($filme['nota'] > 0){
                            echo ("<img src='../img/estrela.png' width='20px'>");
                            $filme['nota'] = $filme['nota'] - 1;
                        }else{
                            echo ("<img src='../img/estrelaApagada.png' width='20px'>");
                        }
                    }
                echo("</td>
                    <td><img src='../img/{$filme['img']}' width='20px' alt=''> </td>
                    <td><button class='btn btn-success'>Editar</button> <button class='btn btn-danger'>Excluir</button></td>
                </tr>
                ");
            }
            ?>
        </tbody>
    </table>
    <a href="cadastro.php">Cadastro</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
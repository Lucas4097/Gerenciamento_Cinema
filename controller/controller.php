<?php

class Cinemas {

    private $conexao;

    public function __construct(){
        try{
        $this->conexao = new PDO("mysql:dbname=crud_cinema;host=localhost", "root", "");
        }catch(PDOException $e){
            echo("Erro com o banco:" .$e);
        }
    }

    public function listar(){
        return $this->conexao->query("SELECT * FROM filmes_series")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $descricao, $nota, $img){
        $cadastro = $this->conexao->prepare("INSERT INTO filmes_series(nome, descricao, nota, img) VALUES (:nome, :descricao, :nota, :img)");
        $cadastro->bindParam(":nome", $nome);
        $cadastro->bindParam(":descricao", $descricao);
        $cadastro->bindParam(":nota", $nota);
        $cadastro->bindParam(":img", $img);
        $cadastro->execute();
        echo "sucesso";
    }

    public function listarID($id){
        return $this->conexao->query("SELECT * FROM filmes_series WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($nome, $descricao, $nota, $img, $id){
        return $this->conexao->query("UPDATE filmes_series SET nome = '$nome', descricao = '$descricao', nota = '$nota', img = '$img' WHERE id = '$id'");
    }

    public function excluir($id){
        return $this->conexao->query("DELETE FROM filmes_series WHERE id = $id");
    }
    
}

?>
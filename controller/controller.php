﻿<?php

class Cinemas {

    private $conexao;

    public function __construct(){
        try{
        $this->conexao = new PDO("mysql:dbname=cinema;host=localhost", "root", "");
        }catch(PDOException $e){
            echo("Erro com o banco:" .$e);
        }
    }

    public function listarFilme(){
        return $this->conexao->query("SELECT * FROM filmes_series WHERE tipo = 'filme' LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarSerie(){
        return $this->conexao->query("SELECT * FROM filmes_series WHERE tipo = 'serie' LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $descricao, $nota, $tipo ,$img){
        $cadastro = $this->conexao->prepare("INSERT INTO filmes_series(nome, descricao, nota, tipo ,img) VALUES (:nome, :descricao, :nota, :tipo, :img)");
        $cadastro->bindParam(":nome", $nome);
        $cadastro->bindParam(":descricao", $descricao);
        $cadastro->bindParam(":nota", $nota);
        $cadastro->bindParam(":tipo", $tipo);
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

    public function nota($nota){
        for ($i=0; $i < 5; $i++) { 
            if($nota >= 1){
                echo ("<img src='../assets/img/estrela.png' width='20px' height='20px'>");
                $nota--;
            }elseif($nota > 0){
                echo ("<img src='../assets/img/estrelaHalf.png' width='20px' height='20px'>");
                $nota--;
            }else{
                echo ("<img src='../assets/img/estrelaVazia.png' width='20px' height='20px'>");
            }
        }
    }
    
}

?>
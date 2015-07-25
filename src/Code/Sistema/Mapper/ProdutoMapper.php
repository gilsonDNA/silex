<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 13:55
 */

namespace Code\Sistema\Mapper;

include  __DIR__ ."/../db/conexaoDB.php";

use Code\Sistema\Entity\Produto;


class ProdutoMapper
{

    public function insert(Produto $produto)
    {
        $conn = conexaoDB();

        $stmt = $conn->prepare("INSERT INTO tblproduto (nome, descricao, valor) VALUES (:nome, :descricao, :valor);");
        $stmt->bindParam(":nome", $produto->getNome());
        $stmt->bindParam(":descricao", $produto->getDescricao());
        $stmt->bindParam(":valor", $produto->getValor());
        if ($stmt->execute())
        {
            return [
                'status' => 'success',
                'message' => ' inserido com sucesso',
            ];
        }else
        {
            return [
                'status' => 'failure',
                'message' => ' msg:'. $stmt->error,
            ];
        }


    }

    public function update(Produto $produto)
    {
        $conn = conexaoDB();

        $stmt = $conn->prepare("update tblproduto set nome = :nome , descricao = :descricao, valor = :valor where id = :id");
        $stmt->bindParam(":nome", $produto->getNome());
        $stmt->bindParam(":descricao", $produto->getDescricao());
        $stmt->bindParam(":valor", $produto->getValor());
        $stmt->bindParam(":id", $produto->getId());

        if ($stmt->execute())
        {
            return [
                'status' => 'success',
                'message' => ' msg:'. $stmt->error,
            ];
        }else
        {
            return [
                'status' => 'failure',
                'message' => ' msg:'. $stmt->error,
            ];
        }


    }
} 
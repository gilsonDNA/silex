<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 15:01
 */

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Entity\Produto;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Mapper\ProdutoMapper;

class ProdutoService
{

    private $produto;
    private $produtoMapper;

    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert(array $data)
    {

        $produtoEntity = new Produto();
        $produtoEntity->setNome($data['nome']);
        $produtoEntity->setDescricao($data['descricao']);
        $produtoEntity->setValor($data['valor']);

        $mapper = new ProdutoMapper();
        $result = $mapper->insert($produtoEntity);

        return $result;
    }

    public function update(array $data)
    {

        $produtoEntity = new Produto();
        $produtoEntity->setNome($data['nome']);
        $produtoEntity->setDescricao($data['descricao']);
        $produtoEntity->setValor($data['valor']);
        $produtoEntity->setId($data['id']);

        $mapper = new ProdutoMapper();
        $result = $mapper->update($produtoEntity);

        return $result;
    }
} 
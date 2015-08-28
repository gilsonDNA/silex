<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 13:55
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;
use Doctrine\ORM\EntityManager;

class ClienteMapper
{
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    private $dados = [
        0 => [
            'id' => 0,
            'nome' => 'Cliente XPTO',
            'email' => 'gil@gmail.com'
        ],
        1 => [
            'id' => 1,
            'nome' => 'Cliente YYPT',
            'email' => 'gil2@gmail.com'
        ],
    ];

    public function insert(Cliente $cliente)
    {

        $this->em->persist($cliente);
        $this->em->flush();

        return [
            'success' => true,
            'id' => $cliente->getId(),
            'nome' => $cliente->getNome(),
            'email' => $cliente->getEmail()

        ];

    }

    public function update(Cliente $cliente)
    {

        $this->em->merge($cliente);
        $this->em->flush();

        return [
            'success' => true
        ];

    }

    public function delete(Cliente $cliente)
    {

        $this->em->remove($cliente);
        $this->em->flush();
        return [
            'success' => true
        ];

    }


} 
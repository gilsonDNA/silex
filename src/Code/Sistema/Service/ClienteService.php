<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 15:01
 */

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente as ClienteEntity;
use Doctrine\ORM\EntityManager;

class ClienteService
{


    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function insert(array $data)
    {

        $clienteEntity = new ClienteEntity();
        $clienteEntity->setNome($data['nome']);
        $clienteEntity->setEmail($data['email']);

        $this->em->persist($clienteEntity);
        $this->em->flush();


        return $clienteEntity;
    }

    public function update($id, array $array)
    {
        $clienteEntity = $this->em->getReference('Code\Sistema\Entity\Cliente', $id);

        $clienteEntity->setNome($array['nome']);
        $clienteEntity->setEmail($array['email']);

        $this->em->persist($clienteEntity);
        $this->em->flush();


       return $clienteEntity;
    }

    public function delete($id)
    {
        $cliente = $this->em->getPartialReference('Code\Sistema\Entity\Cliente', array('id' => $id));

        var_dump($id);
        $this->em->remove($cliente);
        $this->em->flush();

    }

    public function fetchAll(){

    }

    public function find($id){
        return $this->em->find($id);
    }
} 
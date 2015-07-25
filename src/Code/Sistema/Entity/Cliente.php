<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 13:53
 */

namespace Code\Sistema\Entity;


class Cliente
{

    private $nome;
    private $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



} 
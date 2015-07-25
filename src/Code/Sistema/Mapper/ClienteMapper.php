<?php
/**
 * Created by PhpStorm.
 * User: gilson
 * Date: 19/07/15
 * Time: 13:55
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{

    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'email@clientex.com'
        ];
    }

} 
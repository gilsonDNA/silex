<?php

require_once __DIR__.'/../bootstrap.php';


$app->get('/', function() {

    return "Olá Mundo";
});

$app->get('/clientes', function(){

    $a1 = array('nome' => 'Gison', 'email' => 'gilson@idnadevendas.com.br', 'cpf/cnpj' => '010.232.122.22' );
    $a2 = array('nome' => 'Maria', 'email' => 'maria@vendas.com.br', 'cpf/cnpj' => '011.212.333.22' );
    $a3 = array('nome' => 'Joel', 'email' => 'joel@idna.com.br', 'cpf/cnpj' => '010.000.122.22' );;

    $arrayClientes[] = $a1;
    $arrayClientes[] = $a2;
    $arrayClientes[] = $a3;



    $strJson = json_encode($arrayClientes);

    return $strJson;
});

$app->get('/ola/{nome}', function($nome){
    return "Olá {$nome}";
});

$app->run();
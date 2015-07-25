<?php

require_once __DIR__.'/../bootstrap.php';
use \Code\Sistema\Service\ClienteService;
use \Code\Sistema\Entity\Cliente;
use \Code\Sistema\Mapper\ClienteMapper;
use \Code\Sistema\Service\ProdutoService;
use \Code\Sistema\Entity\Produto;
use \Code\Sistema\Mapper\ProdutoMapper;

$app->get('/', function() {

    return "Olá Mundo";
});


//Registrando Serviço
$app['clienteService'] = function(){
    $clienteEntity = new Cliente();
    $clientMapper = new ClienteMapper();

    $clienteService = new ClienteService($clienteEntity, $clientMapper);
    return $clienteService;
};

//Registrando Serviço Produto
$app['produtoService'] = function(){
    $produtoEntity = new Produto();
    $produtoMapper = new ProdutoMapper();

    $produtoService = new ProdutoService($produtoEntity, $produtoMapper);
    return $produtoService;
};

//Exemplo com Json_encode
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

//Passando parâmetro
$app->get('/ola/{nome}', function($nome){
    return "Olá {$nome}";
});

//Rota Cliente, que utiliza o Serviço
$app->get("/cliente" , function() use ($app){

    $dados['nome'] = "Cliente";
    $dados['email'] = "email@cliente.com";


    $result = $app['clienteService']->insert($dados);

    return $app->json($result);
});

//Rota Produto, que utiliza o Serviço
$app->get("/produto" , function() use ($app){

    $dados['nome'] = "Produto X";
    $dados['descricao'] = "produto x descricao";
    $dados['valor'] = 930.50;


    $result = $app['produtoService']->insert($dados);

    return $app->json($result);

});

$app->run();
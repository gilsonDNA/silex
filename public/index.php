<?php

require_once __DIR__.'/../bootstrap.php';
use \Code\Sistema\Service\ClienteService;



use Symfony\Component\HttpFoundation\Request;



//Registrando Serviço
$app['clienteService'] = function() use ($em){
    $clienteService = new ClienteService($em);
    return $clienteService;
};



##Trabalhando com API REST

$app->get('/api/clientes', function() use ($app) {

    $dados = $app['clienteService']->fetchAll();
    return $app->json($dados);
} );

$app->get('/api/clientes/{id}', function($id) use ($app) {

    $dados = $app['clienteService']->find($id);
    return $app->json($dados);
} );

/**
 * Método PUT
 */
$app->put('/api/clientes/{id}', function($id, Request $request) use ($app) {

    $data['nome'] = $request->request->get('nome');
    $data['email'] = $request->request->get('email');

    var_dump($data['nome']);
    var_dump($data['email']);

    $dados = $app['clienteService']->update($id, $data);
    return $app->json($dados);
} );

/**
 * Método POST
 */
$app->post('/api/clientes', function(Request $request) use ($app) {

    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $result = $app['clienteService']->insert($dados);
    return $app->json($result);
} );

/**
 * Método DELETE
 */
$app->delete('/api/clientes/{id}', function($id) use ($app) {

    $dados = $app['clienteService']->delete($id);
    return $app->json($dados);
} );





##Exemplos com twig

//trabalhando com twig
$app->get("/", function() use ($app){
 return $app['twig']->render('index.twig', []);
})->bind("index");

//Passando parâmetro
$app->get('/ola/{nome}', function($nome) use ($app) {
    return $app['twig']->render('ola.twig', ['nome'=>$nome]);
});

$app->get('/clientes', function() use ($app){
    $dados = $app['clienteService']->fetchAll();

    return $app['twig']->render('clientes.twig', ['clientes'=>$dados ] );
})->bind("clientes");



/*
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

    */

/*
//Passando parâmetro
$app->get('/ola/{nome}', function($nome){
    return "Olá {$nome}";
});
*/

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
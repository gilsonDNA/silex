<?php

require_once "conexaoDB.php";


echo "### Executando Fixture ###\n";

$conn = conexaoDB();

echo "Removendo tabela Produto\n";
$conn->query("DROP TABLE IF EXISTS tblproduto;");
echo " ok\n";

echo "Criando tabela tblproduto";
$conn->query("CREATE TABLE tblproduto (
            id INT NOT NULL AUTO_INCREMENT,
            nome TEXT CHARACTER SET 'utf8' NULL,
            descricao VARCHAR(255) CHARACTER SET 'utf8' NULL,
            valor float,
            PRIMARY KEY (id))");

echo " ok\n";

echo "### Concluido ###\n";





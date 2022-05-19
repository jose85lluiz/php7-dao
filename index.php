<?php

require_once("config.php");
$root = new Usuario(); 
$root -> loadById(1); // informar o id 
echo "MOSTRA APENAS UM CADASTRO :</br>";
echo $root; // Mostrar apenas um usuario do banco de dados.

echo "</br>";
echo "</br>";
echo "LISTA POR ORDEM DO ID:</br>";
echo "-------------------------------------------------------------------------------------------------------------------------------</br>";
$lista = Usuario::getList();//chamando metodo estatico 'getList()' na classe usuario. Para listar dados do banco de dados.
echo json_encode($lista);
echo "</br>";
echo "-------------------------------------------------------------------------------------------------------------------------------</br>";
echo "POR BUSCA:</br>";
$busca = Usuario::search("jo");
echo json_encode($busca);
echo "</br>";

echo "SE LOGIN E SENHA FOREM VALIDAS:</br>";
$user = new Usuario();
$user -> login ("josluiz","774433");
echo $user;
echo "</br>";
echo "-------------------------------------------------------------------------------------------------------------------------------</br>";
echo "INSERINDO DADOS NO BANCO DE DADOS :</br>";
echo "inserindo Login e senha, e recebendo informçao de id e data atraves de procedure no bando de dados :</br>";
$aluno = new Usuario("aluno44", "@332211"); // criado metodo construtor para usar set's login e senha, 
//$aluno -> setDeslogin("aluno"); // sem o metodo construtor
//$aluno -> setDessenha("@12345");// sem o metodo cosntrutor
$aluno -> insert();

echo $aluno;
?>
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
?>
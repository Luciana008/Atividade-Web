<?php

require_once '../model/BancoDeDados.php';
require_once '../model/Carro.php';
require_once '../controller/Controller.php';

$bancoDeDados = new BancoDeDados('localhost', 'root', '', 'dados');
$bancoDeDados->conectar();

$carroController = new CarroController($bancoDeDados);

$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];


$carro = new Carro($modelo, $fabricante, $ano, $preco);
$carroController->cadastrarCarro($carro);

header('Location: carros.php');
?>
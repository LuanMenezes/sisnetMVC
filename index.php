<?php
session_start();
//Frontcontroller

spl_autoload_register(function($classe) {return spl_autoload("./app/controlador/".$classe);});
spl_autoload_register(function($classe) {return spl_autoload("./app/dominio/".$classe);});
spl_autoload_register(function($classe) {return spl_autoload("./app/visao/".$classe);});
spl_autoload_register(function($classe) {return spl_autoload("./nucleo/".$classe);});

require_once('./terceiros/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./app/visao/');
RespostaTwig::$motorTwig = new Twig_Environment($loader);


$configuracao = new Configuracao();
$rotas = new Rota();
$rotas->adicionarRota(Rota::GET, "/teste", "Padrao", "index");
$rotas->adicionarRota(Rota::GET, "/restrito/clientes", "Cliente", "listarClientes");

$requisicao = new Requisicao($_REQUEST);

$actual_link = $_SERVER["REQUEST_URI"];
$temp = explode("index.php", $actual_link);
$temp = explode("?",$temp[1]);
$rota = $temp[0];
$metodo = $_SERVER["REQUEST_METHOD"];

try{
    $acao = $rotas->buscarRota($rota,$metodo);
    $controlador = $acao['controlador'];
    $metodo = $acao['acao'];
    $controlador = new $controlador($configuracao,$requisicao);
    
    if ($controlador instanceof Controlador){
        $retorno = call_user_func_array(array($controlador, $metodo), array());
        if ($retorno instanceof Resposta){
            $retorno->executar();
        } else {
            throw new Exception("Resposta é inválida");
        }
    } else {
        throw new Exception("Caminho inválido");
    }
}catch(Exception $e){
    echo $e->getMessage();
}






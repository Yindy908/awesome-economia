<?php
require __DIR__.'/vendor/autoload.php';

//dependencias
use \App\Awesome\economia;

//instancia da classe da api
$obEconomia = new Economia;

// if(!isset($argv[2])){
//     die('necessario duas moedas');
// }

//moedas
$moedaA = "USD";
$moedaB = "BRL";

//executa a requisição da api
$dadosCotacao = $obEconomia->consultarCotacao("USD","BRL");

//ajusta o response
$dadosCotacao = $dadosCotacao["USDBRL"] ?? [];

//retorna a cotação 
echo 'moedas '.$moedaA.' -> '.$moedaB."\n";
echo 'Compra '.($dadosCotacao['bid'] ?? 'desconhecido')."\n";
echo 'venda '.($dadosCotacao['ask'] ?? 'desconhecido')."\n";
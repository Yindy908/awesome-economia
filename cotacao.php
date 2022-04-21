<?php
require __DIR__.'/vendor/autoload.php';

//dependencias
use \App\Awesome\economia;

//instancia da classe da api
$obEconomia = new Economia;

//moedas recebidas via post
    if(!empty($_POST['moedaA']) && !empty($_POST['moedaB'])){
        $moedaA = $_POST['moedaA'];
        $moedaB = $_POST['moedaB'];

        //executa a requisição da api
        $dadosCotacao = $obEconomia->consultarCotacao($moedaA,$moedaB);

        //ajusta o response 
        $dadosCotacao = $dadosCotacao[$moedaA.$moedaB] ?? [];

        //retorna a cotação  
        echo 'moedas '.$moedaA.' -> '.$moedaB."<br>";
        echo 'Compra '.($dadosCotacao['bid'] ?? 'desconhecido')."<br>";
        echo 'venda '.($dadosCotacao['ask'] ?? 'desconhecido')."<br>";
}







//     //executa a requisição da api descomentar <<<<<
// $dadosCotacao = $obEconomia->consultarCotacao("USD","BRL");

// //ajusta o response descomentar <<<<<
// $dadosCotacao = $dadosCotacao["USDBRL"] ?? [];

// //retorna a cotação  descomentar <<<<<
// echo 'moedas '.$moedaA.' -> '.$moedaB."\n";
// echo 'Compra '.($dadosCotacao['bid'] ?? 'desconhecido')."\n";
// echo 'venda '.($dadosCotacao['ask'] ?? 'desconhecido')."\n";

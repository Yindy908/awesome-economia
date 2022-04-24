<?php
require __DIR__.'/vendor/autoload.php';

//dependencias
use \App\Awesome\economia;

//instancia da classe da api
$obEconomia = new Economia;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div>
            <label for="moedaA">Select a currency:</label>
            <select name="moedaA" id="moedaA">
                <option value="">--- Choose a color ---</option>
                <option value="BRL">BRL</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="BTC">BTC</option>
                <option value="UYU">UYU</option>
                <option value="PYG">PYG</option>
                <option value="CLP">CLP</option>
                <option value="ARS">ARS</option>
                <option value="PEN">PEN</option>
            </select>
        </div>
        <div>
            <label for="moedaB">Select a currency:</label>
            <select name="moedaB" id="moedaB">
                <option value="">--- Choose a color ---</option>
                <option value="BRL">BRL</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="EUR">EUR</option>
                <option value="BTC">BTC</option>
                <option value="UYU">UYU</option>
                <option value="PYG">PYG</option>
                <option value="CLP">CLP</option>
                <option value="ARS">ARS</option>
                <option value="PEN">PEN</option>
            </select>
        </div>
        <div>
            <button type="submit">Select</button>
        </div> 
    </form>
        
    


    
</body>
</html>


<?php

//moedas recebidas via post
    if(!empty($_POST['moedaA']) && !empty($_POST['moedaB'])){
        $moedaA = $_POST['moedaA'];
        $moedaB = $_POST['moedaB'];
        //executa a requisição da api
        $dadosCotacao = $obEconomia->consultarCotacao($moedaA,$moedaB);

        // //ajusta o response 
        $dadosCotacao = $dadosCotacao[$moedaA.$moedaB] ?? [];

        // //retorna a cotação  
        echo 'moedas '.$moedaA.' -> '.$moedaB."<br>";
        echo 'Compra '.($dadosCotacao['bid'] ?? 'desconhecido')."<br>";
        echo 'venda '.($dadosCotacao['ask'] ?? 'desconhecido')."<br>";
}

